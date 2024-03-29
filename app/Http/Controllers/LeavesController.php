<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Leave;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Repository\AuthRepository as AuthInterface;

class LeavesController extends Controller
{
    private $AuthRepository;

    public function __construct(AuthInterface $AuthRepository)
    {
        $this->AuthRepository = $AuthRepository;
    }

    public function create(): View
    {
        $remaining_leaves = DB::table('leaves')
        ->where('user_id', auth()->user()->id)
        ->value('remaining_leaves');
        return view('auth.leave')->with('remaining_leaves', $remaining_leaves);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'leave_type' => 'required',
            'reason' => 'required|string',
            'leave_subject' => 'required|string|max:255',
        ]);

        $this->AuthRepository->store($request);
        return redirect()->route('leaves.index')->with('success', 'Leave request submitted.');
    }
    //return leave request from 
    public function index(): view
    {
        return view('auth.showleave');
    }
    //show leaves data table
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
        if ($status == 'approved') {
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
        } else if ($status == 'rejected') {
            $leave->status = 'rejected';
            $leave->save();
        }
        return redirect()->back()->with('success', 'Leave request status has been updated.');
    }
}
