<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsDetail;
use App\Models\Question;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $items = \Cart::session(auth()->id())->getContent();
        $count = $items->count();
        if (isset(request()->category)) {
            $category_id = request()->category;
            $products = Product::whereHas("category", function ($q) use ($category_id) {
                $q->where("category_id", $category_id);
            })->get();
        } else {
            $products = Product::get();
        }
        $categories = Category::get();
        $data = [
            "title" => "Welcome - TechStore",
            "products" => $products,
            "categories" => $categories,
            "counts" => $count
        ];
        return view("user.produk.allproduct", $data);
    }

    public function detail($id)
    {
        $product = Product::find($id);
        $products = Product::inRandomOrder()->limit(4)->get();
        $question = Question::where("product_id", $id)->get();
        $user_id = auth()->guard("web")->id();
        $cart = \Cart::session($user_id)->getContent();
        $count = $cart->count();
        $answer = Answer::where("product_id", $id)->get();
        $data = [
            "title" => "Detail Product",
            "product" => $product,
            "products" => $products,
            "questions" => $question,
            "answers" => $answer,
            "id" => $id,
            "count" => $count
        ];
        return view("user.produk.show", $data);
    }

    public function create_request(Request $request)
    {
        $id = $request->id;
        $productdetail = ProductsDetail::find($id);
        if (!$productdetail) {
            abort(404);
        } else {
            $user_id = auth()->guard("web")->id();
            \Cart::session($user_id)->add([
                'id' => $id,
                'name' => $productdetail->name_product,
                'detail' => $productdetail->product_code,
                'price' => $productdetail->price,
                'quantity' => 1,
                'associatedModel' => $productdetail
            ]);

            $productdetail->update([
                "status_id" => "4"
            ]);

            session()->flash('added', "Berhasil menambah barang ke keranjang");
            return redirect()->back();
        }
    }

    public function keranjang()
    {
        $user_id = auth()->guard("web")->id();
        $cart = \Cart::session($user_id)->getContent();
        $data = [
            "title" => "Request Barang",
            "cart" => $cart
        ];
        return view("user.produk.keranjang", $data);
    }
}
