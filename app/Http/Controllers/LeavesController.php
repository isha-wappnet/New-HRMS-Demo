<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LeavesController extends Controller
{
    
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
            $leaveRequest->total_days = $request->input('total_days');
            $leaveRequest->save();

            return redirect()->route('leaves.index')->with('success', 'Leave request submitted.');
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
            $leaveRequest->total_days = $request->input('total_days');
            $leaveRequest->save();
            return redirect()->route('leaves.index')->with('success', 'Leave request submitted.');
        }
    }
    public function index()
    {
        return view('auth.showleave');
    }
    public function showLeaves(Request $request)
    {

        if ($request->ajax()) {
            $data = Leave::all();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn("action", function ($row) {
                    return '<form method="POST" action="' . route("leaves.update", $row->id) . '">
                    ' . csrf_field() . '
                    ' . method_field("PUT") . '
                    <input type="hidden" name="status" value="approved">
                    <button type="submit" class="fa fa-check" style="font-size:18px;color:green;">Approve</button>
                </form>
                <form method="POST" action="' . route("leaves.update", $row->id) . '">
                    ' . csrf_field() . '
                    ' . method_field("PUT") . '
                    <input type="hidden" name="status" value="rejected">
                    <button type="submit" class="fa fa-close" style="font-size:18px;color:red;">Reject</button>
                </form>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('auth.showleave');
    }
        //update remaining leave
        public function updateLeaveStatus(Request $request, $id)
        {
            $status = $request->input('status');
            $leave = Leave::findOrFail($id);
            $name = $leave->name;
            $start_date = Carbon::createFromFormat('Y-m-d', $leave->start_date);
            $end_date = Carbon::createFromFormat('Y-m-d', $leave->end_date);
            $total_days = $start_date->diffInDays($end_date);
            //check wether user has approved leabe or
            if ($status == 'approved') 
            {
                $leave->status = 'approved';
                // Fetch the latest remaining leaves from the leaves table
                $leaveRecord = DB::table('leaves')
                    ->where('user_id', $leave->user_id)
                    ->orderBy('id', 'desc')
                    ->first();
                $remaining_leaves = ($leaveRecord) ? $leaveRecord->remaining_leaves : 0;
                $remaining_leaves -= $total_days;
                $remaining_leaves = max(0, $remaining_leaves);

                $leave->remaining_leaves = $remaining_leaves;
                $leave->save();
            }
            else if ($status == 'rejected') 
            {
                $leave->status = 'rejected';
                $leave->save();
            }
        return redirect()->back()->with('success', 'Leave request status has been updated.');
    }
}
