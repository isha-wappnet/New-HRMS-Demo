<?php

namespace App\Repository;

use Illuminate\Support\Str;
use App\Interface\AuthInterface;
use App\Models\User;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthRepository implements AuthInterface
{
    public function register($data)
    {
        $user = User::create($data);

        auth()->login($user);
    }
    public function forgetpassword($request, $token)
    {       
        
        DB::table('password_resets')->insert([
            'email' =>  $request->email,
            'token' => $token,
            'created_at' => Carbon::now()

        ]);
        // dd($request);
    }
    public function updatepassword($request)
    {
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
    }
    public function updateprofile($request)
    {
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
      
    }
    public function resetpassword($request)
    {
        //  dd($updatepassword);



        $data = DB::table('password_resets')->where([

            'email' => $request->email,
            'token' => $request->token,


        ])


            ->first();

        if (!$data) {

            return back()->withInput()->with('error', 'Reset link is expired!');
        }
        $user  = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
    }

    public function destroy($id)
    {
        User::find($id)->delete();
    }
    public function editshow($id)
    {
        $user = User::find($id);
        return $user;
    }
    public function editaction($request)
    {
        $user = User::find($request->id);
        $user->update($request->only('name', 'email'));
        return $user;
    }
    public function adduser($request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return $user;
    }

    public function datatable($request)
    {
        $data = User::all();
        return $data;
    }

    public function store( $request){

        $leaveRequest = new Leave();
        $leaveRequest->user_id = auth()->user()->id;
        $name = $leaveRequest->name = auth()->user()->name;
        $check = Leave::where('name', $name)
            ->where('status', 'approved')
            ->first();

        if ($check == true) {
            $leaveBalance = Leave::where('name', $name)->value('remaining_leaves');
            $leaveRequest->remaining_leaves = $leaveBalance;
            $leaveRequest->start_date = $request->input('start_date');
            $leaveRequest->end_date = $request->input('end_date');
            $leaveRequest->leave_type = $request->input('leave_type');
            $leaveRequest->reason = $request->reason;
            $leaveRequest->description = $request->description;
            $leaveRequest->subject = $request->leave_subject;
            $leaveRequest->work_reliever_details = $request->work_reliever;
            $leaveRequest->duration = $request->input('duration');
            $leaveRequest->total_days = $request->input('total_days');
            $leaveRequest->save();

            return true;
        }    
        else 
        {
            $leaveRequest = new Leave();
            $leaveRequest->user_id = auth()->user()->id;
            $name = $leaveRequest->name = auth()->user()->name;
            $leaveRequest->start_date = $request->input('start_date');
            $leaveRequest->end_date = $request->input('end_date');
            $leaveRequest->leave_type = $request->input('leave_type');
            $leaveRequest->reason = $request->reason;
            $leaveRequest->description = $request->description;
            $leaveRequest->subject = $request->leave_subject; 
            $leaveRequest->work_reliever_details = $request->work_reliever;
            $leaveRequest->duration = $request->input('duration');
            $leaveRequest->total_days = $request->input('total_days');
            $leaveRequest->save();
            return true;
        }
    }

    
}
