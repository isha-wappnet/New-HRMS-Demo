<?php

namespace App\Interface;
use Illuminate\Http\Request;
use App\Models\Leave;
interface AuthInterface 
{
   public function register($data);
   public function forgetpassword($request,$token);
   public function updatepassword($request);
   public function updateprofile($request);
   public function resetpassword($updatepassword);
   public function destroy($id);
   public function editshow( $id);
   public function editaction($request);
   public function adduser($request);
   public function datatable($request);
   // public function viewleavepage();
   public function store( $request);
}