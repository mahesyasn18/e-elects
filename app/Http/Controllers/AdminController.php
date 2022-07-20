<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $products = Product::with("admin")->get();
        $data = [
            "products" => $products
        ];
        return view("admin.dashboard", $data);
    }
}
