<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Student;
use App\Classes;
use App\Dorm;
use App\Employee;

class DatatableController extends Controller
{
    public function student(DataTables $datatable)
    {
        $data = Student::all();

        return $datatable->of($data)
        ->addColumn('action', function($data){
            return '<a id="edit-button" href="'.url("student/form/edit", $data->id).'" class="btn btn-warning edit-button"><i class="fa fa-edit"></i></a>
            <button id="delete-button" value="'.$data->id.'" class="btn btn-danger delete-button"><i class="fa fa-trash"></i></button>';
        })
        ->make(true);
    }

    public function class(Datatables $datatable)
    {
        $data = Classes::with('employee')->get();
        
        return $datatable->of($data)
        ->editColumn('employee', function ($data) {
            if ($data->employee) {
                return $data->employee[0]->full_name;
            } else {
                return null;
            }
            
        })

        ->editColumn('gender', function($query) {
            switch ($query->gender) {
                case 'L':
                    return 'Laki-Laki';
                    break;
                case 'P':
                    return 'Perempuan';
                    break;
            }
        })
        ->addColumn('action', function($data){
            return '<a id="edit-button" href="'.url("student-class/form/edit", $data->id).'" class="btn btn-warning edit-button"><i class="fa fa-edit"></i></a>
            <button id="delete-button" value="'.$data->id.'" class="btn btn-danger delete-button"><i class="fa fa-trash"></i></button>';
        })
        ->make(true);
    }
    
    public function dorm(Datatables $datatable)
    {
        // $data = Dorm::with('student.classes.employee')->get();
        $data = Dorm::with('employee')->get();

        return $datatable->of($data)
        ->addColumn('action', function($data){
            return '<a id="edit-button" href="'.url("dormitory/form/edit", $data->id).'" class="btn btn-warning edit-button"><i class="fa fa-edit"></i></a>
                    <button id="delete-button" value="'.$data->id.'" class="btn btn-danger delete-button"><i class="fa fa-trash"></i></button>';
        })
        ->make(true);
    }
}
