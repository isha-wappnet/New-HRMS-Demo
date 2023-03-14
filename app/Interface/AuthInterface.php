<?php

namespace App\Interface;

interface AuthInterface 
{
   public function register($data);
   public function forgetpassword($request,$token);
   public function updatepassword($request);
    
}