<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Student;
use App\Exports\StudentExport;
use App\StudentDetail;
use App\StudentParent;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index');
    }

    public function exportExcel(){
        return Excel::download(new StudentExport, 'student.xlsx');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($action, $id = null)
    {
        switch ($action) {
            case 'create':
                $student = null;
                $parents = StudentParent::all();
                return view('student.form', compact(
                    'student', 'action', 'id', 'parents'
                ));
                break;

            case 'edit':
                $student = Student::find($id);
                $studentDetail = StudentDetail::where('student_id', $id)->get();
                $parents = StudentParent::all();
                return view('student.form', compact('student', 'studentDetail', 'parents'));
            default:
                # code...
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = $request['student'];
        $student_detail = $request['student_detail'];
        try {
            $data = Student::create($student);
            $student_detail['student_id'] = $data->id;
            StudentDetail::create($student_detail);
            
            $data->parents()->sync($request->parent);
            
            return response()->json(['success' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $student = $request['student'];
        $student_detail = $request['student_detail'];

        try {
            $data = Student::where('id', $id)->first();
            StudentDetail::where('student_id', $id)->update($student_detail);

            $data->parents()->sync($request->parent);
            $data->update($student);
            return response()->json(['success' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::find($id);
        $data->delete();
    }
}
