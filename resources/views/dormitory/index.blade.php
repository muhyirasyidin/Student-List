@extends('layouts.app')

@include('dormitory.assets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-right mt-2">
                        <button class="btn btn-primary" id="refresh-button"><i class="fas fa-sync"></i></button>
                        <a href="{{ url('dormitory/form/create') }}" id="create-button" class="btn btn-primary"><i class="fas fa-plus-square"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dormitory-table" class="table table-sm display compact nowrap">
                            <thead>
                            <tr>
                                <th>Nama Kamar</th>
                                <th>Musyrif</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection