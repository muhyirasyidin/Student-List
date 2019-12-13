@extends('layouts.app')

@push('meta')
<meta name="content" content="dormitory">
@endpush

@push('css')
<link href="http://asset.wibs.sch.id/migration/admin/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
<link href="http://asset.wibs.sch.id/migration/admin/plugins/select2/select2-bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="http://asset.wibs.sch.id/migration/admin/js/sweetalert2.min.js" type="text/javascript"></script>
<script src="http://asset.wibs.sch.id/migration/admin/plugins/select2/select2.min.js" type="text/javascript" defer></script>
<script src="{{ asset('js/main.js')}}"></script>
<script src="{{ asset('js/datatable-main.js')}}"></script>
<script>
$(document).ready(function(){
    $('#employee_id').select2({
        dropdownParent: $("#form"),
        theme: 'bootstrap4',
        width: '100%',
        placeholder: 'Cari Nama Musyrif',
        minimumInputLength: 3,
        ajax: {
            url: employee_url + '/api/search-employee-by-name',
            type: 'post',
            dataType: 'json',
            data: function(params) {
                return {
                    user_token: '{{ auth()->user()->token }}',
                    application_token: "{{ env('APPLICATION_TOKEN') }}",
                    full_name: $.trim(params.term)
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            text: item.full_name,
                            id: item.id
                        }
                    })
                };
            }
        }
    })
});
</script>
<script>
$(document).ready(function(){
    $('#student').select2({
        dropdownParent: $("#form"),
        theme: 'bootstrap4',
        width: '100%',
        placeholder: 'Cari Nama Santri',
        minimumInputLength: 3,
        ajax: {
            url: student_url + '/api/list-student',
            type: 'post',
            dataType: 'json',
            data: function(params) {
                return {
                    user_token: '{{ auth()->user()->token }}',
                    application_token: "{{ env('APPLICATION_TOKEN') }}",
                    full_name: $.trim(params.term)
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            text: item.full_name,
                            id: item.id
                        }
                    })
                };
            }
        }
    })
});
</script>
@endpush

@if($dormitory)
<script>
    lastClick = 'edit-button';
    id = '{{ $dormitory->id }}';
</script>
@else
<script>
    lastClick = 'create-button';
</script>
@endif

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header font-weight-bold">
            <h5>Form Dormitory</h5>
        </div>

        <div class="card-body">
            <form id="form">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="name">Nama Kamar</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $dormitory->name ?? null) }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="name">Nama Musyrif</label>
                            <select type="text" class="form-control select" name="employee_id" id="employee_id"></select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="name">Nama Anak</label>
                            <select name="student[]" id="student" class="form-control" multiple></select>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="float-right mt-3">
                        <a href="{{ url('dormitory')}}" style="color:black;" class="btn btn-default mr-3">Kembali</a>
                        <button type="button" id="submit" class="btn create-button btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection