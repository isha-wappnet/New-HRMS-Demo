<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id','start_date', 'end_date', 'reason', 'status','subject','description','work_reliever_details','duration','total_days'
	];

  // public static function boot()
  //   {
  //     static::saved(function ($leave) {
  //       if ($leave->status === 'approved') {
  //           $user_id = $leave->user_id;
  //           $start_date = $leave->start_date;
  //           $end_date = $leave->end_date;
            
  //           // Calculate the number of days between the start and end dates
  //           $duration = $start_date->diffInDays($end_date);
            
  //           // Update the remaining_leaves column in the leaves table for the user
  //           DB::table('leaves')
  //               ->where('user_id', $user_id)
  //               ->decrement('remaining_leaves', $duration);
  //       }
  //   });
  //   }
  public function user()
  {
      return $this->belongsTo(User::class);
  }

}
