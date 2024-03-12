<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        return view("customer.addNew");
    }

    public function remove()
    {
        return view("customer.delete");
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/|unique:customers,email",
            "username" => "required|regex:/^[a-zA-Z0-9_-]+$/|unique:customers,username",
            "first_name" => "required|regex:/^[a-zA-Z\s]+$/",
            "last_name" => "required|regex:/^[a-zA-Z\s]+$/",
            "password" => "required",
            "confirm_password" => "required",

            "image" => "required|image",
        ]);
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("customerImage"), $imagename);

        if ($request->password != $request->confirm_password) {
            return redirect()->back()->withErrors(["confirm_password" => "Both password is not same"]);
        }

        $customer = new Customers;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->username = $request->username;
        $customer->profile_image = $imagename;
        $customer->password = md5($request->password);
        $customer->save();
        return redirect("/customer")->withSuccess("Customer added SuccessFully");
    }

    public function display(Request $request)
    {
        $customer = Customers::all();
        return view("customer.customer", ["customers" => $customer]);
    }

    public function edit($id)
    {
        $customer = Customers::where(DB::raw('MD5(id)'), $id)->first();
        if ($customer == null) {
            abort(404);
        }
        return View("customer.edit", ["customer" => $customer]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customers::where(DB::raw('MD5(id)'), $id)->first();
        $request->validate([
            "email" => "required|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/",
            "username" => "required|regex:/^[a-zA-Z0-9_-]+$/|unique:customers,username," . $customer->id,
            "first_name" => "required|regex:/^[a-zA-Z\s]+$/",
            "last_name" => "required|regex:/^[a-zA-Z\s]+$/",
        ]);
        $customerimage = $customer->profile_image;

        if (isset($request->image)) {
            $image_path = public_path("customerImage") . "/" . $customerimage;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $imagename = time() . "." . $request->image->extension();
            $request->image->move(public_path("customerImage"), $imagename);
            $customer->profile_image = $imagename;
        }
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->username = $request->username;
        $customer->update();
        return redirect("/customer")->withSuccess("Customer Updated SuccessFully");
    }

    public function delete($id)
    {
        $customer = Customers::where(DB::raw('MD5(id)'), $id)->first();
        if ($customer == null) {
            abort(404);
        }
        $customerimage = $customer->profile_image;
        $image_path = public_path("customerImage") . "/" . $customerimage;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        if ($customer == null) {
            abort(404);
        }
        $customer->delete();
        return redirect("/customer")->withSuccess("Customer deleted SuccessFully");
    }

    public function uniqueemail(Request $request)
    {
        $user = Customers::where('email', $request->email)->first();
        
        if ($user) {
            // return redirect()->back()->withErrors(["email" => "Email Address already exists"]);
            return response()->json(['status' => 'error', 'message' => 'The Email has been already taken']);
        }
        
    }
    
    public function checkusername(Request $request)
    {
        $user = Customers::where('username', $request->username)->first();
        if ($user) {
            return response()->json(['status' => 'error', 'message' => 'The Username has been already taken']);
            // return redirect()->back()->withErrors(["username" => "The username already taken"]);
        }
    }
}
