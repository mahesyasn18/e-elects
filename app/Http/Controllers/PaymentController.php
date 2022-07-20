<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transactions;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function confirm(Request $request)
    {
        $time = date("H:i:s");
        $code = rand(10000000, 20000000);
        Transactions::where("id", $request->id_transaction)->update([
            "ispaid" => "paid",
            "tag_id" => 2,
            "invoice" => "inv/electronics/" . $code
        ]);
        Payment::where("id", $request->id)->update([
            "rekening" => $request->rekening,
            "account_name" => $request->nama,
            "bank" => $request->bank,
            "total" => $request->totals,
            "payment_date" => date("Y-m-d H:i:s", strtotime($request->transfer . "" . $time))
        ]);

        session()->flash("success", "Successfully make payment");
        return redirect()->to(route("confirmed"));
    }
}
