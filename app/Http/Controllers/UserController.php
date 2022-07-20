<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Category;
use App\Models\Cities;
use App\Models\DetailUsers;
use App\Models\Product;
use App\Models\ProductsDetail;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $items = \Cart::session(auth()->id())->getContent();
        $count = $items->count();
        $product = Product::get();
        $categories = Category::get();
        $data = [
            "products" => $product,
            "categories" => $categories,
            "counts" => $count
        ];
        return view("user.main", $data);
    }


    public function profiledetail()
    {
        $id = auth()->id();
        $province = Province::all();
        $users = User::where("id", $id)->first();
        $detail = Addresses::with("user")->where("user_id", $id)->first();
        $data = [
            "province" => $province,
            "detail" => $detail,
            "users" => $users
        ];
        return view("user.profile.profiledetail", $data);
    }



    public function adddetail(Request $request)
    {
        $request->validate([
            "phone" => "required",
            "address" => "required",
            "province" => "required",
            "city" => "required",
            "districts" => "required",
            "postal_code" => "required"
        ]);

        DetailUsers::create([
            "user_id" => $request->iduser,
            "province_id" => $request->province,
            "city_id" => $request->city,
            "alamat" => $request->address,
            "kecamatan" => $request->districts,
            "kodepos" => $request->postal_code,
            "notelp" => $request->phone
        ]);
        return redirect()->back();
    }
}
