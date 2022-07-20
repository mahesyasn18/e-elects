<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Cities;
use App\Models\Product;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function index()
    {
        if (request()->pilih == "press") {
            $ongkir = request()->cost;
            $kurir = request()->kurir;
        }
        $provinces = Province::get();
        $city = Cities::get();
        $product = Product::get();
        $user_id = auth()->id();
        $address = Addresses::where("user_id", $user_id)->first();
        $carts = \Cart::session($user_id)->getContent();
        $subtotal = \Cart::session($user_id)->getSubTotal();
        $data = [
            "product" => $product,
            "carts" => $carts,
            "address" => $address,
            "provinces" => $provinces,
            "subtotal" => $subtotal,
            "city" => $city
        ];
        if (request()->pilih == "press") {
            return view("user.produk.keranjang", $data)->with([
                "ongkir" => $ongkir,
                "kurir" => $kurir
            ]);
        } else {
            return view("user.produk.keranjang", $data);
        }
    }
    public function addtocart($id)
    {
        $product = Product::find($id);
        $user_id = auth()->id();
        $data = [
            "id" => $product->id,
            'name' => $product->name,
            'price' => $product->harga,
            'quantity' => 1,
            'attributes' => array(
                "weight" => $product->berat,
                'stock' => $product->stok
            ),
            'associatedModel' => $product->file
        ];
        \Cart::session($user_id)->add($data);
        session()->flash("carts", "Success add to cart");
        return redirect()->to("/keranjang");
    }
    public function getCitiesAjax($id)
    {
        $cities = Cities::where('province_id', '=', $id)->get();

        return json_encode($cities);
    }

    public function createaddress(Request $request)
    {
        $request->validate([
            "alamat" => "required",
            "kecamatan" => "required",
            "phone" => "required|numeric"
        ]);
        $new_phone = ltrim($request->phone, '0');
        $status = "utama";
        Addresses::create([
            "user_id" => auth()->id(),
            "no_hp" => $new_phone,
            "status" => $status,
            "alamat" => $request->alamat,
            "kecamatan" => $request->kecamatan,
            "id_provinces" => $request->province,
            "id_cities" => $request->city
        ]);

        session()->flash("address", "Berhasil tambah alamat");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            "alamat" => "required",
            "kecamatan" => "required",
            "phone" => "required|numeric"
        ]);
        $new_phone = ltrim($request->phone, '0');
        $status = "utama";
        $address = Addresses::find($id);
        $address->update([
            "user_id" => auth()->id(),
            "no_hp" => $new_phone,
            "status" => $status,
            "alamat" => $request->alamat,
            "kecamatan" => $request->kecamatan,
            "id_provinces" => $request->province,
            "id_cities" => $request->city
        ]);

        session()->flash("updateaddress", "Berhasil Update alamat");
        return redirect()->back();
    }


    public function ongkir()
    {
        $origin = "152";
        $carts = \Cart::session(auth()->id())->getContent();
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart["attributes"]["weight"];
        }
        $ongkir = Http::withHeaders([
            "key" => "d687494e8b7d9bd2ed9fbc1244f64b79"
        ])->post("https://api.rajaongkir.com/starter/cost", [
            "origin" => $origin,
            "destination" => request()->id,
            "weight" => $total,
            "courier" => request()->kurir
        ]);
        $data = $ongkir["rajaongkir"]["results"];
        return response()->json(["data" => $data, "kurir" => request()->kurir], 200);
    }
    public function update(Request $request, $id)
    {
        $user_id = auth()->id();
        \Cart::session($user_id)->update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quant[2]
            ]
        ]);
        session()->flash('updated', "Berhasil update cart");
        return redirect()->back();
    }
    public function delete($id)
    {
        $user_id = auth()->id();
        \Cart::session($user_id)->remove($id);
        session()->flash('deleted', "Berhasil deleted cart");
        return redirect()->back();
    }
}
