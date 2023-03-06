<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use DataTables;

class UserController extends Controller
{

    public function loadForgotPassword()
    {
        return view('auth.forgotpassword');
    }

    public function forgotPasswordValidate(Request $req)
    {
        $valid = $req->validate([
            'email' => 'required|email|exists:users',
        ]);
        // dd($valid);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' =>  $req->email,
            'token' => $token,
            'created_at' => Carbon::now()


        ]);


        Mail::send('email\sendemail', ['token' => $token], function ($message) use ($req) {


            $message->to($req->email);
            $message->subject('Reset password');
        });
        return back()->with('success', 'Rest link send to your registered mail address!');
    }

    public function resetpassword($token)
    {
        return view('auth.resetpassword', ['token' => $token]);
    }

    //reset password ----------------------------------------------------------------------------------//

    public function submitresetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' =>   [
                'required',
                'string',
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'cpassword' => 'required|same:password'
        ]);

        $updatepassword = DB::table('password_resets')->where([

            'email' => $request->email,
            'token' => $request->token
        ])
            ->first();

        if (!$updatepassword) {

            return back()->withInput()->with('error', 'Reset link is expired!');
        }
        $user  = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect('login')->with('success', 'your password has been successfully changed');
    }

    public function changepassword()
    {

        return view('auth.change-password');
    }
    //change password function------------------------------------------------------------

    public function submitchangepassword(Request $request)
    {


        $request->validate([
            'currentpassword' => 'required',
            'new_password' => [
                'required',
                'string',
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ]);


        #Match The Old Password
        if (!Hash::check($request->currentpassword, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('login')->with('success', 'Password Updated Successfully');
    }



    public function userprofile()
    {

        return view('auth.update-userprofile');
    }

    public function profileUpdate(Request $request)
    {
        //validation rules

        $request->validate([
            'name' => 'required|min:4|string|max:255',
            'email' => 'required|email|string|max:255'
        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return back()->with('message', 'Profile Updated');
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id','name','email')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('auth\user-table');
    }

}
