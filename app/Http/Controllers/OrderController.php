<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Payment;
use App\Models\Tag;
use App\Models\Transaction_detail;
use App\Models\Transactions;
use App\Models\User;
use Codedge\Fpdf\Facades\Fpdf;
use Codedge\Fpdf\Fpdf\Fpdf as FpdfFpdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $transactions = Transactions::where("user_id", $user_id)->where("tag_id", 1)->latest()->paginate(10);
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags,

        ];
        return view("user.history.ordered", $data);
    }

    public function show($id)
    {
        $transactions = Transactions::find($id);
        if ($transactions->ispaid == "unpaid") {
            if (date("Y-m-d H:i:s") == $transactions->expiry_date) {
                Transactions::where("id", $transactions->id)->update([
                    "ispaid" => "expired"
                ]);
            }
        }
        $payment = Payment::where("transaction_id", $id)->first();
        $data = [
            "transactions" => $transactions,
            "payment" => $payment
        ];
        return view("user.history.detail", $data);
    }

    public function confirmed()
    {
        $user_id = auth()->id();
        $transactions = Transactions::where("user_id", $user_id)->where("tag_id", 2)->latest()->paginate(10);
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags
        ];
        return view("user.history.confirmed", $data);
    }
    public function packing()
    {
        $user_id = auth()->id();
        $transactions = Transactions::where("user_id", $user_id)->where("tag_id", 3)->latest()->paginate(10);
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags
        ];
        return view("user.history.packing", $data);
    }
    public function sent()
    {
        $user_id = auth()->id();
        $transactions = Transactions::where("user_id", $user_id)->where("tag_id", 4)->latest()->paginate(10);
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags
        ];
        return view("user.history.sent", $data);
    }

    public function completedprocess($id)
    {
        Transactions::where("id", $id)->update([
            "tag_id" => 5
        ]);
        session()->flash("success", "Your Package Has Arrived. Thank you For Shopping!");
        return redirect()->to(route("completed"));
    }

    public function completed()
    {
        $user_id = auth()->id();
        $transactions = Transactions::where("user_id", $user_id)->where("tag_id", 5)->latest()->paginate(10);
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags
        ];
        return view("user.history.completed", $data);
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
