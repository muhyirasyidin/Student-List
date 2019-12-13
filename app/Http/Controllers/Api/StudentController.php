<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Student;

class StudentController extends Controller
{
    public function list(Request $request)
    {
        if ($request->full_name) {
            $student = Student::where('status', 'aktif')->where('full_name', 'like', '%'.$request->full_name.'%')->orWhere('nis', 'like', '%'.$request->full_name.'%')->orWhere('rfid', 'like', '%'.$request->full_name.'%')->orWhere('nisn', 'like', '%'.$request->full_name.'%')->get();
        } else {
            $student = Student::all();
        }
        return response()->json(['data' => $student]);
    }

    public function listByRecitationGroup(Request $request)
    {
        $student = Student::where('status', 'aktif')->where('recitation_group_id', $request->recitation_group_id)->get();
        return response()->json(['data' => $student]);
    }

    public function listByClass(Request $request)
    {
        $student = Student::where('status', 'aktif')->where('student_class_id', $request->student_class_id)->get();
        return response()->json(['data' => $student]);
    }

    public function show(Request $request)
    {
        $student = Student::findOrFail($request->student_id);
        return response()->json(['data' => $student]);
    }

    public function showByRFID(Request $request)
    {
        $student = Student::where('rfid', $request->rfid)->firstOrFail();
        return response()->json(['data' => $student]);
    }

    public function searchByNameNotInClass(Request $request)
    {
        $student = Student::where('status', 'aktif')->where('full_name', 'like', '%'.$request->full_name.'%')->whereNull('student_class_id')->get();
        return response()->json(['data' => $student]);
    }

    public function searchByNameNotInRecitationGroup(Request $request)
    {
        $student = Student::where('status', 'aktif')->where([
            ['full_name', 'like', '%'.$request->full_name.'%'],
            ['gender', '=', $request->gender],
            ['recitation_group_id', '=', null]
        ])->get();
        return response()->json(['data' => $student]);
    }
}
