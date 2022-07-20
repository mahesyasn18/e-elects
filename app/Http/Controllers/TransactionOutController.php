<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tag;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionOutController extends Controller
{
    public function ordered()
    {
        $transactions = Transactions::with("user")->where("tag_id", 1)->get();
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags,

        ];
        return view("admin.transactionOut.ordered", $data);
    }
    public function confirmed()
    {
        $transactions = Transactions::with("user", "payment")->where("tag_id", 2)->get();
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags,
        ];
        return view("admin.transactionOut.confirmed", $data);
    }
    public function processpayment($id)
    {
        Transactions::where("id", $id)->update([
            "tag_id" => 3
        ]);
        session()->flash("success", "Success to approve payment");
        return redirect()->to(route("outpacking"));
    }
    public function packing()
    {
        $transactions = Transactions::with("user", "payment")->where("tag_id", 3)->get();
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags,
        ];
        return view("admin.transactionOut.packing", $data);
    }
    public function processsent($id)
    {
        Transactions::where("id", $id)->update([
            "tag_id" => 4
        ]);
        session()->flash("success", "Success to Sent A Package");
        return redirect()->to(route("outsent"));
    }
    public function sent()
    {
        $transactions = Transactions::with("user", "payment")->where("tag_id", 4)->get();
        $tags = Tag::get();
        $data = [
            "transactions" => $transactions,
            "tags" => $tags,
        ];
        return view("admin.transactionOut.sent", $data);
    }
}
