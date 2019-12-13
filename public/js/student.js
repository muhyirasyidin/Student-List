switch (content) {
    case 'student':
    table = $('#datatable').DataTable({
        responsive: true,
        autoWidth: false,
        processing : true,
        serverSide : true,
        pageLength: 50,
        ajax : {
            url : window.location.origin + '/datatable/' + url,
            type: 'GET',
        },
        columns : [
            { data : 'status', defaultContent: '-'},
            { data : 'current_grade', defaultContent: '-'},
            { data : 'grade', defaultContent: '-'},
            { data : 'nis', defaultContent: '-'},
            { data : 'nisn', defaultContent: '-'},
            { data : 'full_name', defaultContent: '-'},
            { data : 'rfid', defaultContent: '-'},
            { data : '', defaultContent: '-'},
            { data : '', defaultContent: '-'},
            { data : '', defaultContent: '-'},
            { data : 'gender', defaultContent: '-'},
            { data : 'birthplace', defaultContent: '-'},
            { data : 'birthdate', defaultContent: '-'},
            { data : 'updated_at', defaultContent: '-'},
            { data : 'action' }
        ]
    });
    break;
    case 'dormitory':
    table = $('#dormitory-table').DataTable({
        responsive: true,
        autoWidth: false,
        processing : true,
        serverSide : true,
        pageLength: 50,
        ajax : {
            url : window.location.origin + '/datatable/' + url,
            type: 'GET',
        },
        columns : [
            { data : 'name' },
            { data : 'employee.full_name',},
            { data : 'action' }
        ]
    });
    break;
    case 'student-class':
    table = $('#datatable').DataTable({
        responsive: true,
        autoWidth: false,
        processing : true,
        serverSide : true,
        pageLength: 50,
        ajax : {
            url : window.location.origin + '/datatable/' + url,
            type: 'GET',
        },
        columns : [
            { data : 'employee', defaultContent: '-' },
            { data : 'major'},
            { data : 'grade'},
            { data : 'local'},
            { data : 'gender'},
            { data : 'action' }
        ]
    });
    break;

    case 'recitation_group':
    table = $('#recitation-group-table').DataTable({
        responsive: true,
        autoWidth: false,
        processing : true,
        serverSide : true,
        ajax : {
            url : url + '/data',
            type: 'GET'
        },
        columns : [
            { data : 'recitation_group' },
            { data : 'employee_id' },
            { data : 'juz_target' },
            { data : 'updated_at' },
            { data : 'action' }
        ]
    });
    break;
}
