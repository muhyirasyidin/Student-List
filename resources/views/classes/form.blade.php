@extends('layouts.app')

@push('meta')
<meta name="content" content="student-class">
@endpush

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/datatable-main.js') }}"></script>
<script src="{{ asset('js/main.js')}}"></script>
@endpush

@if($studentclass)
<script>
    lastClick = 'edit-button';
    id = '{{ $studentclass->id }}';
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
            <h5>Form Classes</h5>
        </div>

        <div class="card-body">
            <form id="form">
                @if($studentclass)
                <input type="hidden" value="{{ $studentclass->id }}" id="idClass">
                @endif
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Major</label>
                                    <input type="text" class="form-control" name="major" value="{{ old('major', $studentclass['major'] ?? null) }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Grade</label>
                                    <input type="text" class="form-control"  name="grade" value="{{ old('grade', $studentclass['grade'] ?? null) }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Local <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control"  name="local" value="{{ old('local', $studentclass['local'] ?? null) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Gender <small class="text-danger">*</small></label>
                                <select class="form-control" name="gender" class="form-control">
                                    @if(old('gender', $studentclass->gender ?? null))
                                    <option value="{{ old('gender', $studentclass->gender ?? null) }}" selected>
                                        {{ old('gender', $studentclass->gender ?? null) }}</option>
                                        @switch($studentclass->gender)
                                        @case('L')
                                        <option value="P">Perempuan</option>
                                        @break
                                        @case('P')
                                        <option value="L">Laki-laki</option>
                                        @break
                                        @endswitch
                                        @else
                                        <option value="choose" selected>(Pilih)</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> 
                </form>

                <div class="float-right mt-3">
                    <button type="button" class="btn btn-default mr-3"><a href="{{ url('student-class')}}" style="color:black;">Kembali</a></button>
                    <button type="submit" id="submit" class="btn create-button btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @endsection