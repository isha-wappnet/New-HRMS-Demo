<?php

namespace App\Http\Controllers;

// use App\Interface\AuthInterface;
use App\Repository\AuthRepository as AuthInterface;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use DataTables;



class AuthController extends Controller
{
    

    private $AuthRepository;

    public function __construct(AuthInterface $AuthRepository) 
    {
        $this->AuthRepository = $AuthRepository;
    }



//

    public function loadRegister()
    {
        return view('auth\register');
    }
    public function registerAction(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => [
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

        $user = $request->all();
        $this->AuthRepository->register($user);

        // $user = User::create($request->all());

        // auth()->login($user);
        return redirect('login')->with('success', 'Success! User created');
    }


    public function loadLogin()
    {
        return view('auth\login');
    }


    public function loginAction(Request $request)
    {

        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials))

            return redirect()->to('login')
                ->with('error', 'invalid data');
        else {
            return redirect()->to('dashboard')->with('success', 'Login Successfull');
        }
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function performLogout()
    {

        Auth::logout();

        return view('auth.login');
    }


}
