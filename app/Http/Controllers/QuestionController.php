<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Request $request)
    {

        Question::create([
            "product_id" => $request->id,
            "user_id" => auth()->id(),
            "body" => $request->question
        ]);
        return redirect()->back();
    }
}
