<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();
        $data = [
            "admin" => $admin
        ];
        return view("admin.admins.adminslist", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:admins",
            "username" => "required|unique:admins",
            "password" => "required"
        ]);

        Admin::create([
            "name" => $request->name,
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "status" => $request->status
        ]);

        session()->flash("adminsuccess", "success to create new admin");
        return redirect()->route("admins");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "username" => "required"
        ]);

        $admin = Admin::find($id);
        $admin->update([
            "name" => $request->name,
            "username" => $request->username
        ]);

        session()->flash("updated", "success to update admin");
        return redirect()->route("admins");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_block($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            abort(404);
        } else {
            $admin->update([
                "status" => "block"
            ]);
        }
        return redirect()->back()->with("blocked", "Success To Blocked Admin");
    }

    public function admin_unblock($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            abort(404);
        } else {
            $admin->update([
                "status" => "admin"
            ]);
        }
        return redirect()->back()->with("admin-unblock", "Success To UnBlocked Admin");
    }
}
