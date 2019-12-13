@push('meta')
    <meta name="url" content="dormitory">
    <meta name="content" content="dormitory">
@endpush
    
@push('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/datatable-main.js') }}"></script>
    <script src="{{ asset('js/student.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
@endpush