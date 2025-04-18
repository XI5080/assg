<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    function viewProfilePage()
    {
       return view("profile", [
            'user' => Auth::user(),        
        ]);
    }

    function viewUpdatePasswordPage()
    {
        return view("updatePassword");
    }

    function updatePassword(Request $req)
    {
        $req->validate([
            "currentPassword" => "required",
            "newPassword" => ["required", "regex:/[A-Z]/", "regex:/[a-z]/", "regex:/[0-9]/", "regex:/\W/"],
            "confirmPassword" => "same:newPassword"
        ]);

        if (Hash::check($req["currentPassword"], DB::select("SELECT password FROM users WHERE email=?", [Auth::user()["email"]])[0]->password))
        {
            DB::update("UPDATE users SET password=? WHERE email=?", [Hash::make($req["newPassword"]), Auth::user()["email"]]);
            return redirect("/profile");
        }
        else
        {
            return redirect("/profile/update/password")->withErrors(["currentPassword" => "Entered current password is incorrect"]);
        }
    }

    function deactivateAccount()
    {
        Ticket::where('email', Auth::user()["email"])->delete();
        User::where('email', Auth::user()["email"])->delete();
        Auth::logout();
        return redirect("/")->with("success", "Account deactivated successfully");
    }
}
