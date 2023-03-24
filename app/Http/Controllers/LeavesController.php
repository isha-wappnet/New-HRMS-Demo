<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
                ->addColumn("action", function ($row) {
                    return '<form method="POST" action="' . route("leaves.update", $row->id) . '">
                    ' . csrf_field() . '
                    ' . method_field("PUT") . '
                    <input type="hidden" name="status" value="approved">
                    <button type="submit" class="fa fa-check" style="font-size:18px;color:green;background-color:white;">Approve</button>
                </form>
                <form method="POST" action="' . route("leaves.update", $row->id) . '">
                    ' . csrf_field() . '
                    ' . method_field("PUT") . '
                    <input type="hidden" name="status" value="rejected">
                    <button type="submit" class="fa fa-close" style="font-size:18px;color:red;background-color:white;">Reject</button>
                </form>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('auth.showleave');
    }
    public function updateLeaveStatus(Request $request, $id)
    {
        $status = $request->input('status');
        $leave = Leave::findOrFail($id);

        $start_date = Carbon::createFromFormat('Y-m-d', $leave->start_date);
        $end_date = Carbon::createFromFormat('Y-m-d', $leave->end_date);

        $total_days = $start_date->diffInDays($end_date);
        if ($status == 'approved') {
            $leave->status = 'approved';
            $remaining_leaves = (int)$leave->remaining_leaves - (int)$total_days;

            // Fetch the latest remaining leaves from the leaves table
            $leaveRecord = DB::table('leaves')->where('user_id', $leave->user_id)
                ->orderBy('id', 'desc')
                ->first();
            if ($leaveRecord) {
                $latest_remaining_leaves = $leaveRecord->remaining_leaves;
            } else {
                $latest_remaining_leaves = 0;
            }

            $remaining_leaves = max(0, $latest_remaining_leaves - (int)$total_days);

            $leave->remaining_leaves = $remaining_leaves;
            $leave->save();
        } else if ($status == 'rejected') {
            $leave->status = 'rejected';
            $leave->save();
        }
        return redirect()->back()->with('success', 'Leave request status has been updated.');
    }
}
