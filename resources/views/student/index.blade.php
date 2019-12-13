@extends('layouts.app')

@include('student.assets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-right">
                        <a href="{{ url('student/excel') }}" class="btn btn-success">Export Excel</a>
                        <button class="btn btn-info" id="refresh-button"><i class="fas fa-sync"></i></button>
                        <a href="{{ url('student/form/create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Status of Santri</th>
                                    <th>Level</th>
                                    <th>Grade</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>Full Name</th>
                                    <th>RFID Number</th>
                                    <th>Class</th>
                                    <th>Room</th>
                                    <th>Halaqoh Group</th>
                                    <th>Gender</th>
                                    <th>Place of birth</th>
                                    <th>Date of birth</th>
                                    <th>Last changed</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection