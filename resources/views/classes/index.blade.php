@extends('layouts.app')

@include('classes.assets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-right">
                        <button class="btn btn-info" id="refresh-button"><i class="fas fa-sync"></i></button>
                        <a href="{{ url('student-class/form/create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-sm display compact nowrap">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Major</th>
                                    <th>Grade</th>
                                    <th>Local</th>
                                    <th>Gender</th>
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