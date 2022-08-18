<?php

namespace App\Http\Controllers;
use App\Models\Assignment;
use App\Models\UserAssignment;
use App\Models\User;
use Illuminate\Support\Facades\View;
use App\Models\AksesKelas;

use Illuminate\Http\Request;

class UserAssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }

    public function showAssignment($id)
    {
        $assignment = Assignment::find($id);
        $userAssignment = UserAssignment::all();
        // dd($assignment);
        return view('admin.assignment.lihat', compact('assignment', 'userAssignment'));
    }

    public function showUserAssignment($id)
    {
        $userAssignment = UserAssignment::find($id);
        // dd($userAssignment);
        return view('admin.assignment.show-userAssignment', compact('userAssignment'));
    }

    public function grading(Request $request, $id)
    {
        // $assignment = Assignment::find($id);
        $userAssignment = UserAssignment::findOrFail($id);
        $userAssignment->grade = $request->grade;
        $userAssignment->feedback_1 = $request->feedback_1;
        $userAssignment->feedback_2 = $request->feedback_2;
        $userAssignment->feedback_3 = $request->feedback_3;
        $userAssignment->grade_1 = $request->grade_1;
        $userAssignment->grade_2 = $request->grade_2;
        $userAssignment->grade_3 = $request->grade_3;
        $userAssignment->isComplete = true;
        $userAssignment->save();
        // dd($assignment);
        return redirect()->back()
        ->with('success', 'Berhasil memberi Nilai');
    }
}
