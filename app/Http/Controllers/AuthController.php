<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request){
        $data = $request->validate([
            "email" => "required",
            "password" => "required|regex:/^[a-zA-Z0-9!@#$%^&*]+$/",
        ],[   
            'email.required'    => 'The username field is required',
        ]);

        if(auth()->attempt(request()->only(['email', 'password']))){
            return redirect("/");
        }
        
        return redirect()->back()->withErrors(["credentials" => "Invalid Credentials"]);
    }

    public function logout($id){
        $user = User::where(DB::raw('MD5(email)'), $id)->first();
        if ($user == null) {
            abort(404);
        }
        auth()->logout();
        return redirect("/login");
    }
    
    

    public function change(Request $request){
        $data = $request->validate([
            "username" => "required|regex:/^[a-zA-Z0-9_-]+$/",
            "password" => "required|regex:/^[a-zA-Z0-9!@#$%^&*]+$/",
            "cpassword" => "required|regex:/^[a-zA-Z0-9!@#$%^&*]+$/",
        ]);

        $user = User::where("email", $request->username)->first();

        if(!$user){
            return redirect()->back()->withErrors(["username" => "User Not Found"]);
        }

        if($request->password == $request->cpassword){
            $user->password = Hash::make($request->password);
            $user->update();
            return redirect("/login")->withSuccess("Password Changed SuccessFully");
        }
        else{
            return redirect()->back()->withErrors(["cpassword" => "Both password is not same"]);
        }
    }
    public function changePass($id){
        $user = User::where(DB::raw('MD5(email)'), $id)->first();
        if ($user == null) {
            abort(404);
        }
        return view("change", ["user" => auth()->user()]);
    }

    public function changePassword(Request $request, $id){
        $data = $request->validate([
            "currpass" => "required|regex:/^[a-zA-Z0-9_-]+$/",
            "password" => "required|regex:/^[a-zA-Z0-9!@#$%^&*]+$/",
            "cpassword" => "required|regex:/^[a-zA-Z0-9!@#$%^&*]+$/",
        ]);

        $user = User::where(DB::raw('MD5(email)'), $id)->first();
        if ($user == null) {
            abort(404);
        }

        if (! Hash::check($request->currpass, $user->password)) {
            return back()->withErrors([
                'currpass' => ['The provided password does not match our records.']
            ]);
        }

        if($request->password == $request->cpassword){
            $user->password = Hash::make($request->password);
            $user->update();
            return redirect("/")->withSuccess("Password Changed SuccessFully");
        }
        else{
            return redirect()->back()->withErrors(["cpassword" => "Both password is not same"]);
        }
    }
}
