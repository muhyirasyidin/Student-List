@extends('layouts.app')

@push('meta')
    <meta name="content" content="student">
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
@endpush

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
    <script src="{{ asset('js/datatable-main.js') }}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#parent').select2({
                minimumInputLength: 3,
                width: 350,
                placeHolder: 'Cari Nama Orang tua'
            })
        });
    </script>
@endpush

@if($student && $studentDetail)
    <script>
        lastClick = 'edit-button';
        id = '{{ $student->id }}';
    </script>
@else
    <script>
        lastClick = 'create-button';
    </script>
@endif

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <form id="form">
            @if($student && $studentDetail)
            <input type="hidden" value="{{ $student->id }}" id="idStudent">
            @endif
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" href="#info-form" aria-expanded="true"
                                aria-controls="addres-form">
                                <h3 class="card-title mt-2">
                                    Informasi Pribadi
                                </h3>
                            </div>
                            <div class="card-body collapse" id="info-form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">NIK</label>
                                            <input type="number" class="form-control" name="student_detail[nik]"
                                                value="{{ old('nik', $studentDetail['nik'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">NISN</label>
                                            <input type="number" class="form-control" name="student[nisn]"
                                                value="{{ old('nisn', $student->nisn ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">NIS <small class="text-danger">*</small></label>
                                            <input type="number" class="form-control" name="student[nis]"
                                                value="{{ old('nis', $student->nis ?? null) }}" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="name">No RFID</label>
                                            <input type="number" class="form-control" name="student[rfid]"
                                                value="{{ old('rfid') ?? $student->rfid ?? null }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nama lengkap <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control" name="student[full_name]"
                                                value="{{ old('full_name', $student->full_name ?? null) }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nama panggilan</label>
                                            <input type="text" class="form-control" name="student[nick_name]"
                                                value="{{ old('nick_name', $student->nick_name ?? null) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Kelas</label>
                                            <select class="form-control select2" name="student[student_class_id]"
                                                id="student_class" style="width:100%"></select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Kamar</label>
                                            <select class="form-control select2" name="student[dormitory_id]"
                                                id="dormitory" style="width:100%"></select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Kelompok Halaqoh</label>
                                            <select class="form-control select2" name="student[recitation_group_id]"
                                                id="recitation_group" style="width:100%"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Kelamin <small class="text-danger">*</small></label>
                                            <select class="form-control" name="student[gender]" require>
                                                @if(old('gender', $student->gender ?? null))
                                                <option value="{{ old('gender', $student->gender ?? null) }}" selected>
                                                    {{ old('gender', $student->gender ?? null) }}</option>
                                                @switch($student->gender)
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
                                        <div class="form-group">
                                            <label for="name">Tempat lahir</label>
                                            <input type="text" class="form-control" name="student[birthplace]"
                                                value="{{ old('birthplace', $student->birthplace ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tanggal lahir</label>
                                            <input type="date" class="form-control" name="student[birthdate]"
                                                value="{{ old('birthdate', $student->birthdate ?? null) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Status anak</label>
                                            <select class="form-control" name="student_detail[child_status]">
                                                @if( old('child_status', $studentDetail['child_status'] ?? null) )
                                                <option
                                                    value="{{ old('child_status', $studentDetail['child_status'] ?? null) }}"
                                                    selected>
                                                    {{ old('child_status', $studentDetail['child_status'] ?? null) }}
                                                </option>
                                                @switch($studentDetail['child_status'])
                                                @case('kandung')
                                                <option value="angkat">Angkat</option>
                                                @break

                                                @case('angkat')
                                                <option value="kandung">Kandung</option>
                                                @break

                                                @endswitch
                                                @else
                                                <option value="-">-</option>
                                                <option value="kandung">Kandung</option>
                                                <option value="angkat">Angkat</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Kewarganegaraan</label>
                                            <select class="form-control" name="student_detail[nationality]">
                                                @if( old('nationality', $studentDetail['nationality'] ?? null) )
                                                <option
                                                    value="{{ old('nationality', $studentDetail['nationality'] ?? null) }}"
                                                    selected>
                                                    {{ old('nationality', $studentDetail['nationality'] ?? null) }}
                                                </option>
                                                @switch($studentDetail['nationality'])
                                                @case('wni')
                                                <option value="wna">Asing</option>
                                                @break

                                                @case('wna')
                                                <option value="wni">Indonesia</option>
                                                @break
                                                @endswitch
                                                @else
                                                <option disabled>(Pilih)</option>
                                                <option value="wni">Indonesia</option>
                                                <option value="wna">Asing</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Agama</label>
                                            <select class="form-control" name="student_detail[religion]">
                                                @if( old('religion', $studentDetail['religion'] ?? null) )
                                                <option
                                                    value="{{ old('religion', $studentDetail['religion'] ?? null) }}"
                                                    selected>{{ old('religion', $studentDetail['religion'] ?? null) }}
                                                </option>
                                                @switch($studentDetail['religion'])
                                                @case('islam')
                                                <option value="kristen-protestan">Kristen Protestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Budha</option>
                                                <option value="kong-hu-cu">Kong hu cu</option>
                                                @break

                                                @case('kristen-protestan')
                                                <option value="islam">Islam</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Budha</option>
                                                <option value="kong-hu-cu">Kong hu cu</option>
                                                @break

                                                @case('katolik')
                                                <option value="islam">Islam</option>
                                                <option value="kristen-protestan">Kristen Protestan</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Budha</option>
                                                <option value="kong-hu-cu">Kong hu cu</option>
                                                @break

                                                @case('hindu')
                                                <option value="islam">Islam</option>
                                                <option value="kristen-protestan">Kristen Protestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="buddha">Budha</option>
                                                <option value="kong-hu-cu">Kong hu cu</option>
                                                @break

                                                @case('buddha')
                                                <option value="islam">Islam</option>
                                                <option value="kristen-protestan">Kristen Protestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="kong-hu-cu">Kong hu cu</option>
                                                @break

                                                @case('kong-hu-cu')
                                                <option value="islam">Islam</option>
                                                <option value="kristen-protestan">Kristen Protestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Budha</option>
                                                @break

                                                @endswitch
                                                @else
                                                <option value="chose" selected>(Pilih)</option>
                                                <option value="islam">Islam</option>
                                                <option value="kristen-protestan">Kristen Protestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Budha</option>
                                                <option value="kong-hu-cu">Kong hu cu</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="parent[]" id="parent" multiple>
                                                @foreach($parents as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="name">Berat badan (KG)</label>
                                            <input type="text" class="form-control" name="student_detail[weight]"
                                                value="{{ old('wight', $studentDetail['weight'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tinggi (CM)</label>
                                            <input type="number" class="form-control" name="student_detail[height]"
                                                value="{{ old('height', $studentDetail['height'] ?? null) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Hasil tes IQ</label>
                                            <input type="number" class="form-control" name="student_detail[test_iq]"
                                                value="{{ old('test_iq', $studentDetail['test_iq'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tanggal tes IQ</label>
                                            <input type="date" class="form-control" name="student_detail[test_iq_date]"
                                                value="{{ old('test_iq_date', $studentDetail['test_iq_date'] ?? null) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" href="#status_form" aria-expanded="true"
                                aria-controls="status_form">
                                <h3 class="card-title mt-2">
                                    Status
                                </h3>
                            </div>
                            <div class="card-body collapse" id="status_form">
                                <div class="form-group">
                                    <label for="name">Status santri <small class="text-danger">*</small></label>
                                    <select class="form-control" name="student[status]" require>
                                        @if( old('status', $student->status ?? null) )
                                        <option value="{{ old('status', $student->status ?? null) }}" selected>
                                            {{ old('status', $student->status ?? null) }}</option>
                                        @switch($student->status)
                                        @case('waiting-list')
                                        <option value="belum-aktif">Belum Aktif</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak-aktif">Tidak aktif</option>
                                        <option value="lulus">Lulus</option>
                                        @break

                                        @case('belum-aktif')
                                        <option value="waiting-list">Waiting list</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak-aktif">Tidak aktif</option>
                                        <option value="lulus">Lulus</option>
                                        @break

                                        @case('aktif')
                                        <option value="waiting-list">Waiting list</option>
                                        <option value="belum-aktif">Belum Aktif</option>
                                        <option value="tidak-aktif">Tidak aktif</option>
                                        <option value="lulus">Lulus</option>
                                        @break

                                        @case('tidak-aktif')
                                        <option value="waiting-list">Waiting list</option>
                                        <option value="belum-aktif">Belum Aktif</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="lulus">Lulus</option>
                                        @break

                                        @case('lulus')
                                        <option value="waiting-list">Waiting list</option>
                                        <option value="belum-aktif">Belum Aktif</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak-aktif">Tidak aktif</option>
                                        @break
                                        @endswitch
                                        @else
                                        <option value="" selected></option>
                                        <option value="waiting-list">Waiting list</option>
                                        <option value="belum-aktif">Belum Aktif</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak-aktif">Tidak aktif</option>
                                        <option value="lulus">Lulus</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tingkat <small class="text-danger">*</small></label>
                                    <select class="form-control" name="student[grade]" require>
                                        @if( old('grade', $student->grade ?? null) )
                                        <option value="{{ old('grade', $student->grade ?? null) }}" selected>
                                            {{ old('grade', $student->grade ?? null) }}</option>
                                        @switch($student->grade)
                                        @case('TBTQ')
                                        <option value="SDTQ">SDTQ</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="ST">ST</option>
                                        @break

                                        @case('SDTQ')
                                        <option value="TBTQ">TBTQ</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="ST">ST</option>
                                        @break

                                        @case('SMP')
                                        <option value="TBTQ">TBTQ</option>
                                        <option value="SDTQ">SDTQ</option>
                                        <option value="SMA">SMA</option>
                                        <option value="ST">ST</option>
                                        @break

                                        @case('SMA')
                                        <option value="TBTQ">TBTQ</option>
                                        <option value="SDTQ">SDTQ</option>
                                        <option value="SMP">SMP</option>
                                        <option value="ST">ST</option>
                                        @break

                                        @case('ST')
                                        <option value="TBTQ">TBTQ</option>
                                        <option value="SDTQ">SDTQ</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        @break
                                        @endswitch

                                        @else
                                        <option selected>(Pilih)</option>
                                        <option value="TBTQ">TBTQ</option>
                                        <option value="SDTQ">SDTQ</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="ST">ST</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" href="#addres-form" aria-expanded="true"
                                aria-controls="addres-form">
                                <h3 class="card-title mt-2">
                                    Alamat
                                </h3>
                            </div>
                            <div class="card-body collapse" id="addres-form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group" style="width:100%">
                                            <label for="name">Kode pos</label>
                                            <input type="number" class="form-control" name="student_detail[pos_zip]"
                                                value="{{ old('pos_zip', $studentDetail['pos_zip'] ?? null) }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group" style="height:100%; width:100%">
                                            <label for="name">Alamat</label>
                                            <textarea class="form-control" name="student_detail[address]"
                                                rows="8">{{ old('address', $studentDetail['address'] ?? null) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mt-2" data-toggle="collapse" href="#school-form"
                                    aria-expanded="true" aria-controls="school-form">
                                    Sekolah
                                </h3>
                            </div>
                            <div class="card-body collapse" id="school-form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Sekolah asal</label>
                                            <input type="text" class="form-control" name="student_detail[origin_school]"
                                                value="{{ old('origin_school', $studentDetail['origin_school'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Alamat sekolah asal</label>
                                            <input type="text" class="form-control"
                                                name="student_detail[origin_school_address]"
                                                value="{{ old('origin_school_address', $studentDetail['origin_school_address'] ?? null) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="name">Sekolah pindahan</label>
                                            <input type="text" class="form-control"
                                                name="student_detail[transfer_school]"
                                                value="{{ old('transfer_school', $studentDetail['transfer_school'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Alamat sekolah pindahan</label>
                                            <input type="text" class="form-control"
                                                name="student_detail[transfer_school_address]"
                                                value="{{ old('transfer_school_address', $studentDetail['transfer_school_address'] ?? null) }}">
                                        </div>
                                        <div id="transfer_reason" class="form-group">
                                            <label for="name">Alasan pindah</label>
                                            <input type="text" class="form-control"
                                                name="student_detail[transfer_reason]"
                                                value="{{ old('transfer_reason', $studentDetail['transfer_reason'] ?? null) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Tanggal masuk</label>
                                            <input type="date" class="form-control" name="student_detail[entry_date]"
                                                value="{{ old('entry_date', $studentDetail['entry_date'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Diterima dikelas</label>
                                            <select class="form-control" name="student_detail[class_accepted]">
                                                @if( old('class_accepted', $studentDetail['class_accepted'] ?? null) )
                                                <option
                                                    value="{{ old('class_accepted', $studentDetail['class_accepted'] ?? null) }}">
                                                    {{ old('class_accepted', $studentDetail['class_accepted'] ?? null) }}
                                                </option>
                                                @switch($studentDetail['class_accepted'])
                                                
                                                @case('1')
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('2')
                                                <option value="1">1</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('3')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('4')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('5')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('6')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('7')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('8')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('9')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('10')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('11')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="12">12</option>
                                                @break

                                                @case('12')
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                @break
                                                @endswitch

                                                @else
                                                <option disabled>(Pilih)</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nomor Ujian</label>
                                            <input type="text" class="form-control" name="student_detail[test_number]"
                                                value="{{ old('test_number', $studentDetail['test_number'] ?? null) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Prestasi</label>
                                            <textarea class="form-control" name="student_detail[achievement]" rows="8"
                                                cols="80">{{ old('achievement', $studentDetail['achievement'] ?? null) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Nomor ijazah</label>
                                            <input type="text" class="form-control" name="student_detail[ijazah_number]"
                                                value="{{ old('ijazah_number', $studentDetail['ijazah_number'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tahun ijazah</label>
                                            <input type="text" class="form-control" name="student_detail[ijazah_year]"
                                                value="{{ old('ijazah_year', $studentDetail['ijazah_year'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nomor SKHUN</label>
                                            <input type="text" class="form-control" name="student_detail[skhun_number]"
                                                value="{{ old('skhun_number', $studentDetail['skhun_number'] ?? null) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-t-10">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mt-2" data-toggle="collapse" href="#docs-form"
                                    aria-expanded="true" aria-controls="docs-form">
                                    Dokumen
                                </h3>
                            </div>
                            <div class="card-body collapse" id="docs-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_photo" for="name">Foto <small
                                                    class="text-danger">*</small></label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="   " class="form-control" name="file[student][photo]">
                                        </div>
                                        <div class="form-group">
                                            <label id="label_family_card" for="name">Kartu keluarga</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][family_card]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_birth_certificate" for="name">Akte kelahiran</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][birth_certificate]">
                                        </div>
                                        <div class="form-group">
                                            <label id="label_father_identity_card" for="name">KTP ayah</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][father_identity_card]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_mother_identity_card" for="name">KTP ibu</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][mother_identity_card]">
                                        </div>
                                        <div class="form-group">
                                            <label id="label_healthy_certificate" for="name">Surat Keterangan
                                                Sehat</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][healthy_certificate]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_skpi_cerfiticate" for="name">Surat Keterangan Penyetaraan
                                                Ijazah</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][skpi_cerfiticate]">
                                        </div>
                                        <div class="form-group">
                                            <label id="label_skkbri_certificate" for="name">Surat Keterangan
                                                KBRI</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][skkbri_certificate]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_transfer_certificate" for="name">Surat Keterangan
                                                Pindah</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][skpsa_certificate]">
                                        </div>
                                        <div class="form-group">
                                            <label id="label_child_identity_card" for="name">Kartu Identitas
                                                Anak</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][child_identity_card]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label id="label_sps_certificate" for="name">
                                                Surat Keterangan KEMENDIKBUD
                                                <a style="float:right; max-width:30px;" href=""
                                                    class="d-inline-block text-truncate" target="_blank"></a>
                                            </label>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][sps_certificate]">
                                        </div>
                                        <div class="form-group">
                                            <label id="label_graduation_certificate" for="name">Surat Keterangan
                                                KEMENDIKBUD</label>
                                            <a style="float:right; max-width:30px;" href=""
                                                class="d-inline-block text-truncate" target="_blank"></a>
                                            <input type="file" class="form-control"
                                                name="file[student_detail][graduation_certificate]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mt-2" data-toggle="collapse" href="#stay-status-form"
                                    aria-expanded="true" aria-controls="stay-status-form">
                                    Status Tinggal
                                </h3>
                            </div>
                            <div class="card-body collapse" id="stay-status-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Tinggal dengan</label>
                                            <select class="form-control" name="student_detail[living_with]">
                                                @if( old('living_with', $studentDetail['living_with'] ?? null) )
                                                <option
                                                    value="{{ old('living_with', $studentDetail['living_with'] ?? null) }}"
                                                    selected>{{ old('living_with', $studentDetail['living_with'] ?? null) }}
                                                </option>
                                                @switch($studentDetail['living_with'])
                                                @case('sendiri')
                                                <option value="wali">Wali</option>
                                                <option value="orang-tua">Orang Tua</option>
                                                @break

                                                @case('wali')
                                                <option value="sendiri">Sendiri</option>
                                                <option value="orang-tua">Orang Tua</option>
                                                @break

                                                @case('orang-tua')
                                                <option value="sendiri">Sendiri</option>
                                                <option value="wali">Wali</option>
                                                @break
                                                @endswitch

                                                @else
                                                <option disabled>(Pilih)</option>
                                                <option value="sendiri">Sendiri</option>
                                                <option value="wali">Wali</option>
                                                <option value="orang-tua">Orang Tua</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Jarak rumah ke sekolah (KM)</label>
                                            <input type="number" class="form-control"
                                                name="student_detail[home_distance]"
                                                value="{{ old('home_distance', $studentDetail['home_distance'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Jumlah saudara</label>
                                            <input type="number" class="form-control" name="student_detail[siblings]"
                                                value="{{ old('siblings', $studentDetail['siblings'] ?? null) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Kendaraan harian</label>
                                            <input type="text" class="form-control" name="student_detail[daily_vehicle]"
                                                value="{{ old('daily_vehicle', $studentDetail['daily_vehicle'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">No. HP siswa</label>
                                            <input type="text" class="form-control" name="student_detail[student_phone]"
                                                value="{{ old('student_phone', $studentDetail['student_phone'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Email siswa</label>
                                            <input type="email" class="form-control" name="student_detail[student_email]"
                                                value="{{ old('student_email', $studentDetail['student_email'] ?? null) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Golongan darah</label>
                                            <select class="form-control" name="student_detail[bloodtype]">
                                                @if( old('bloodtype', $studentDetail['bloodtype'] ?? null) )
                                                <option
                                                    value="{{ old('bloodtype', $studentDetail['bloodtype'] ?? null) }}"
                                                    selected>{{ old('bloodtype', $studentDetail['bloodtype'] ?? null) }}
                                                </option>
                                                @switch($studentDetail['bloodtype'])
                                                @case('a')
                                                <option value="b">B</option>
                                                <option value="o">O</option>
                                                <option value="ab">AB</option>
                                                @break

                                                @case('b')
                                                <option value="a">A</option>
                                                <option value="o">O</option>
                                                <option value="ab">AB</option>
                                                @break

                                                @case('o')
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="ab">AB</option>
                                                @break

                                                @case('ab')
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="o">O</option>
                                                @break
                                                @endswitch

                                                @else
                                                <option value="" selected>(Pilih)</option>
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="o">O</option>
                                                <option value="ab">AB</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Riwayat Alergi</label>
                                            <input type="text" class="form-control"
                                                name="student_detail[allergic_history]"
                                                value="{{ old('allergic_history', $studentDetail['allergic_history'] ?? null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Riwayat Penyakit</label>
                                            <input type="text" class="form-control"
                                                name="student_detail[illness_history]"
                                                value="{{ old('illness_history', $studentDetail['illness_history'] ?? null) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div>
                <div class="float-right mt-3">
                    <button type="button" class="btn btn-default mr-3"><a href="{{ url('student')}}"
                            style="color:black;">Kembali</a></button>
                    <button type="submit" id="submit" class="btn create-button btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @endsection