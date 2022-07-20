<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\DetailUsers;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = Addresses::with("user")->get();
        $data = [
            "users" => $users
        ];
        return view("admin.Users.userlist", $data);
    }
}
