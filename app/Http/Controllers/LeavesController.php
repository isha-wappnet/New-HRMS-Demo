<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use DataTables;

class LeavesController extends Controller
{
    //
    public function create()
    {
        return view('auth.leave');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason' => 'required|string',
        ]);

        $leaveRequest = new Leave();
        $leaveRequest->user_id = auth()->user()->id;
        $leaveRequest->start_date = $request->start_date;
        $leaveRequest->end_date = $request->end_date;
        $leaveRequest->reason = $request->reason;
        $leaveRequest->save();



        return redirect()->route('leaves.index')->with('success', 'Leave request submitted.');
    }



    public function index()
    {
        return view('auth.showleave');
    }
    public function showLeaves(Request $request)
    {
        // $leaves = Leave::select('id','user_id', 'start_date', 'end_date', 'reason','status');

        // return Datatables::of($leaves)->make(true);
        if ($request->ajax()) {
            $data = Leave::all();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn("action", '
                @method("DELETE")
                
                    <a  href="#" title="Approved"  >
                    <i  class="fa fa-check"" style="font: size 13px;px;color:green ">Approved</i>
                
                </a>
                <button type ="submit" id="btn" title="Reject" style="font-size:24px;color:red;background-color:white;border:0px;">
                    <i class="fa fa-close"style="font-size:13px;color:red;background-color:white;">Rejected</i>
                </button>')       
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('auth.showleave');
    }
    public function reject($id){

        Leave::find($id)->delete();
        return back()->with('success', "Data deleted successfully");
    }
}
