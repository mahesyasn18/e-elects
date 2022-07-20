<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Transaction_detail;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $name = $user->name;
        $user_id = $user->id;
        $carts = \Cart::session($user_id)->getContent();
        $address = Addresses::where("user_id", $user_id)->first();
        $tag = 1;
        $transactions = Transactions::create([
            "user_id" => $user_id,
            "nama" => $name,
            "no_hp" => $address->no_hp,
            "alamat" => $address->alamat,
            "total" => request()->total,
            "ongkir" => request()->ongkir,
            "kecamatan" => $address->kecamatan,
            "cities_id" => $address->id_cities,
            "tag_id" => $tag,
            "ispaid" => "unpaid",
            "expiry_date" => date("Y-m-d H:i:s", strtotime("+24 hours"))
        ]);
        $last_id = $transactions->id;
        foreach ($carts as $cart) {
            $transactions->products()->attach($transactions, [
                "product_id" =>  $cart->id,
                "qty" => $cart->quantity,
                "price" => $cart->price
            ]);
            $product = Product::find($cart->id);
            $new_quantity = $product->stok - $cart->quantity;
            Product::where("id", $product->id)->update([
                "stok" => $new_quantity
            ]);
            \Cart::session($user_id)->remove($cart->id);
        }
        Payment::create([
            "transaction_id" => $last_id,
            "rekening" => "",
            "account_name" => "",
            "total" => "",
        ]);

        session()->flash('orders', "Order product successfully");
        return redirect()->to("/ordered");
    }
}
