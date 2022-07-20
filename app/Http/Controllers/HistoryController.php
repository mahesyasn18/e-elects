<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Payment;
use App\Models\Tag;
use App\Models\Transactions;
use Codedge\Fpdf\Facades\Fpdf;
use Codedge\Fpdf\Fpdf\Fpdf as FpdfFpdf;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class HistoryController extends Controller
{
    public function index()
    {
        $transactions = Transactions::with("user", "payment")->where("tag_id", 5)->get();
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags,

        ];
        return view("admin.report.history", $data);
    }

    public function eksport()
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

        $spredsheet->getActiveSheet()->getStyle('A3:I3')->applyFromArray($styleArray2);
        $spredsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($styleArray2);
        $spredsheet->getActiveSheet()->getStyle('A2:I2')->applyFromArray($styleArray2);
        $sheet->mergeCells("A1:I1");
        $spredsheet->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'Report Transaction Per ' . date("d-m-Y"));
        $sheet->mergeCells("A2:I2");
        $spredsheet->getActiveSheet()->setCellValueByColumnAndRow(1, 2, 'E-electronics');

        $transactions = Transactions::with("user", "payment")->where("tag_id", 5)->get();
        $sheet->setCellValue("A3", "No");
        $sheet->setCellValue("B3", "Name User");
        $sheet->setCellValue("C3", "Name Product");
        $sheet->setCellValue("D3", "Qty");
        $sheet->setCellValue("E3", "Total");
        $sheet->setCellValue("F3", "Account Name");
        $sheet->setCellValue("G3", "Account Number");
        $sheet->setCellValue("H3", "Name Bank");
        $sheet->setCellValue("I3", "Payment At");
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);

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
        foreach ($transactions as $item) {
            foreach ($item->products as $a) {
                foreach ($item->payment as $pay) {
                    $spredsheet->getActiveSheet()->getStyle('A' . $i . ':' . 'I' . $i)->applyFromArray($styleArray3);
                    $sheet->setCellValue("A" . $i, $no++);
                    $sheet->setCellValue("B" . $i, $item->user->name);
                    $sheet->setCellValue("C" . $i, $a->name . " " . $a->color);
                    $sheet->setCellValue("D" . $i, $a->pivot->qty);
                    $sheet->setCellValue("E" . $i, "Rp. " . number_format($item->total));
                    $sheet->setCellValue("F" . $i, $pay->account_name);
                    $sheet->setCellValue("G" . $i, "$pay->rekening");
                    $sheet->setCellValue("H" . $i, $pay->bank);
                    $sheet->setCellValue("I" . $i, $pay->payment_date);
                    $i++;
                }
            }
        }
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Report Transaction.xlsx");
        $writer = IOFactory::createWriter($spredsheet, 'Xlsx');
        $writer->save('php://output');
    }

    public function invoice($id)
    {
        $payment = Payment::find($id);
        $transaction = Transactions::with("user")->find($id);
        $products = $transaction->products()->get();
        $address = Addresses::with("cities", "province")->where("user_id", $transaction->user->id)->first();
        $fpdf = new FpdfFpdf();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(1, 20, 'E-electronics');
        $fpdf->Cell(80);
        $fpdf->Cell(20, 20, 'Invoice For Order : #' . $transaction->invoice);
        $fpdf->Ln();
        $fpdf->SetFont('helvetica', 'I', 10);
        $fpdf->Cell(190, 7, 'Order details', 1, 2);
        $fpdf->SetFont('helvetica', '', 10);
        $y = $fpdf->GetY();
        $fpdf->MultiCell(95, 8, "Order id : " . $transaction->invoice . "\nOrder Status : " . "$transaction->ispaid", 1, 2);
        $x = $fpdf->GetX();
        $fpdf->SetXY($x + 95, $y);
        $fpdf->MultiCell(95, 8, "Method Payment : " . "$payment->bank" . "\nPayment Date : " . $payment->payment_date, 1, 2);
        $fpdf->Ln();
        $fpdf->Ln();
        $y = $fpdf->GetY();
        $fpdf->Cell(90, 8, 'Ship From', 1, 2);

        $fpdf->MultiCell(90, 8, "Name : E-electronics Warehouse" . "\nAddress : Jl. Tanah Abang I No 1 Petojo Selatan, Kota Jakarta Pusat" . "\nPhone : 021987365", 1, 2);

        $x = $fpdf->GetX();

        $fpdf->SetXY($x + 100, $y);
        $fpdf->Cell(90, 8, 'Ship To', 1, 2);
        $fpdf->MultiCell(90, 8, "Name : " . $transaction->user->name . "\nAddress : " . $address->alamat . ", " . $address->kecamatan . ", " . $address->cities->city_name . ", " . $address->province->province . "\nPhone : " . $address->no_hp, 1, 2);
        $fpdf->Ln();
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->Cell(190, 10, "Item Of Purchase");
        $fpdf->Ln();
        $fpdf->setFont("Arial", "B", "12");
        $fpdf->Cell(30, 6, 'No', 1, 0, "C");
        $fpdf->Cell(80, 6, 'Product', 1, 0, "C");
        $fpdf->Cell(10, 6, 'qty', 1, 0, "C");
        $fpdf->Cell(30, 6, 'price', 1, 0, "C");
        $fpdf->Cell(40, 6, 'total', 1, 1, "C");
        $no = 1;
        $fpdf->SetFont('Arial', '', 10);
        foreach ($products as $b) {
            $fpdf->Cell(30, 10, "$no", 1, 0, "C");
            $fpdf->Cell(80, 10, $b->name . " " . $b->color, 1, 0, "C");
            $fpdf->Cell(10, 10, $b->pivot->qty, 1, 0, "C");
            $fpdf->Cell(30, 10, "Rp ." . number_format($b->harga), 1, 0, "C");
            $fpdf->Cell(40, 10,  "Rp ." . number_format($b->harga * $b->pivot->qty), 1, 1, "C");
            $no++;
        }
        $fpdf->Cell(120, 10, '', 0, 0);
        $fpdf->Cell(30, 10, 'Total', 1, 0, "C");
        $fpdf->Cell(40, 10, "Rp ." . number_format($b->harga * $b->pivot->qty), 1, 1, "C");
        $fpdf->Cell(120, 10, '', 0, 0);
        $fpdf->Cell(30, 10, 'Shipping', 1, 0, "C");
        $fpdf->Cell(40, 10, "Rp ." . number_format($transaction->ongkir), 1, 1, "C");
        $fpdf->Cell(120, 10, '', 0, 0);
        $fpdf->Cell(30, 10, 'Subtotal', 1, 0, "C");
        $fpdf->Cell(40, 10, "Rp ." . number_format($transaction->total), 1, 1, "C");
        return $fpdf->Output("Invoice_user" . $transaction->invoice . ".pdf", 'D');
    }
}
