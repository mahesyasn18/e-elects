<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsDetail;
use App\Models\Question;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with("category")->get();
        $data = [
            "products" => $products
        ];


        return view("admin.product.Product", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $admin = Admin::all();
        $data = [
            "categories" => $categories,
            "admin" => $admin
        ];
        return view("admin.Product.addproduct", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:products",
            "stok" => "required",
            "harga" => "required",
            "cat" => "required",
            "file" => "required|file|image|mimes:jpg,png",
            "color" => "required",
            "Announced" => "required",
            "OS" => "required",
            "display" => "required",
            "chipset" => "required",
            "Weight" => "required",
            "camera" => "required",
            "sensors" => "required",
            "battery" => "required"
        ]);
        $gambar = $request->file("file");
        $gambar->move(public_path("img/phone"), $gambar->getClientOriginalName());
        $categoryid = $request->cat;
        $unique = rand(10000000, 90000000);
        $product = Product::create([
            "admin_id" => $request->id_admin,
            "name" => $request->name,
            "harga" => $request->harga,
            "stok" => $request->stok,
            "file" => $request->file("file")->getClientOriginalName(),
            "unique_code" => $unique,
            "color" => $request->color,
            "berat" => $request->Weight

        ]);
        $product->category()->attach($categoryid);
        $id = $product->id;
        ProductsDetail::create([
            "product_id" => $id,
            "announced" => $request->Announced,
            "OS" => $request->OS,
            "display" => $request->display,
            "chipset" => $request->chipset,
            "camera" => $request->camera,
            "sensors" => $request->sensors,
            "battery" => $request->battery
        ]);
        session()->flash("success", "Success to add a product");
        return redirect()->to("/product");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = ProductsDetail::with("product")->where("product_id", $id)->get();
        $product = Product::find($id);
        $productdetail = ProductsDetail::with("product")->where("product_id", $id)->first();
        if (count($datas) == 0) {
            abort(404);
        }
        $data = [
            "productdetail" => $productdetail,
            "datas" => $datas,
            "product" => $product,

            "id" => $id
        ];
        return view("admin.Product.showproduct", $data);
    }

    public function preview($id)
    {
        $product = Product::find($id);
        $question = Question::where("product_id", $id)->get();
        $answer = Answer::where("product_id", $id)->orderBy("question_id", "ASC")->get();
        $data = [
            "product" => $product,
            "id" => $id,
            "product" => $product,
            "questions" => $question,
            "answers" => $answer
        ];
        return view("admin.Product.preview", $data);
    }

    public function answer(Request $request)
    {
        $id = $request->id;
        $answer = Answer::where("question_id", $id)->get();
        if (count($answer) == 1) {
            session()->flash("gagal", "Tidak bisa membuat jawaban");
            return redirect()->back();
        }
        Answer::create([
            "question_id" => $id,
            "product_id" => $request->id_product,
            "body" => $request->answer
        ]);
        session()->flash("answer", "Berhasil memberikan jawaban !");
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = [];
        $Products = Product::find($id);
        $productdetail = ProductsDetail::where("product_id", $id)->first();
        $categories = Category::all();
        foreach ($Products->category as $cat) {
            $kategori[] = $cat->id;
        }
        if (!$Products) {
            abort(404);
        }

        $data = [
            "Products" => $Products,
            "categories" => $categories,
            "productdetail" => $productdetail,
            "kategori" => $kategori
        ];
        return view("admin.Product.editproduct", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "stok" => "required",
            "harga" => "required",
            "cat" => "required",
            "color" => "required",
            "Announced" => "required",
            "OS" => "required",
            "display" => "required",
            "chipset" => "required",
            "camera" => "required",
            "sensors" => "required",
            "battery" => "required"
        ]);


        if ($request->hasFile('file')) {
            $gambar = $request->file("file");
            $gambar->move(public_path("img/phone"), $gambar->getClientOriginalName());
            $files = $request->file("file")->getClientOriginalName();
        } else {
            $files = $request->piclast;
        }

        $product = Product::findOrFail($id);
        if ($product == null) {
            abort(404);
        } else {
            if ($request->stok >= $product->stok) {
                $product->update([
                    "admin_id" => $request->id_admin,
                    "name" => $request->name,
                    "harga" => $request->harga,
                    "stok" => $request->stok,
                    "file" => $files,
                    "unique_code" => $product->unique_code,
                    "color" => $request->color,
                ]);
                $categorycode = $request->cat;
                $delete = [];
                foreach ($product->category as $cat) {
                    $available_category[] = $cat->id;
                    if (!in_array($cat->id, $categorycode)) {
                        $delete[] = $cat->id;
                    }
                }

                if ($product) {
                    $newcategory = [];
                    $product->category()->detach($delete);
                    foreach ($categorycode as $value) {
                        if (!in_array($value, $available_category)) {
                            $newcategory[] = $value;
                        }
                    }
                }
                $product->category()->attach($newcategory);

                ProductsDetail::where("product_id", $id)->update([
                    "product_id" => $id,
                    "announced" => $request->Announced,
                    "OS" => $request->OS,
                    "display" => $request->display,
                    "chipset" => $request->chipset,
                    "camera" => $request->camera,
                    "sensors" => $request->sensors,
                    "battery" => $request->battery
                ]);
                return redirect()->route("product")->with("updated", "Success to Update the Product");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product == null) {
            abort(404);
        } else {
            $product->delete();
        }

        session()->flash("deleted", "Berhasil menghapus barang");
        return redirect()->back();
    }

    public function excel_eksport()
    {
        $spredsheet = new Spreadsheet();
        $sheet = $spredsheet->getActiveSheet();
        $protection = $spredsheet->getActiveSheet()->getProtection();
        $protection->setPassword('e-electronics');
        $protection->setSheet(true);
        $protection->setSort(true);
        $protection->setInsertRows(true);
        $protection->setFormatCells(true);

        $styleArray2 = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $spredsheet->getActiveSheet()->getStyle('A3:G3')->applyFromArray($styleArray2);
        $spredsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray2);
        $spredsheet->getActiveSheet()->getStyle('A2:G2')->applyFromArray($styleArray2);
        $sheet->mergeCells("A1:G1");
        $spredsheet->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'Report Stock All Products Per ' . date("d-m-Y"));
        $sheet->mergeCells("A2:G2");
        $spredsheet->getActiveSheet()->setCellValueByColumnAndRow(1, 2, 'E-electronics');

        $product = Product::with("admin")->get();
        $sheet->setCellValue("A3", "No");
        $sheet->setCellValue("B3", "Nama Product");
        $sheet->setCellValue("C3", "Stock");
        $sheet->setCellValue("D3", "Price Per Product");
        $sheet->setCellValue("E3", "Unique Code");
        $sheet->setCellValue("F3", "Input By");
        $sheet->setCellValue("G3", "Input Time");
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        // style3 
        $styleArray3 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                ],
            ],
        ];
        $i = 4;
        $no = 1;
        foreach ($product as $item) {

            $spredsheet->getActiveSheet()->getStyle('A' . $i . ':' . 'G' . $i)->applyFromArray($styleArray3);
            $sheet->setCellValue("A" . $i, $no++);
            $sheet->setCellValue("B" . $i, $item->name . " " . $item->color);
            $sheet->setCellValue("C" . $i, $item->stok);
            $spredsheet->getActiveSheet()->getStyle("D" . $i)->getNumberFormat()->setFormatCode('Rp' . '#,##0');
            $sheet->setCellValue("D" . $i, $item->harga);
            $sheet->setCellValue("E" . $i, $item->unique_code);
            $sheet->setCellValue("F" . $i, $item->admin->name);
            $sheet->setCellValue("G" . $i, $item->created_at);
            $i++;
        }
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=laporan_stok_barang.xlsx");
        $writer = IOFactory::createWriter($spredsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
