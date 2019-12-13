var content = $('meta[name="content"]').attr('content');
var url = $('meta[name="url"]').attr('content');
var employee_url = 'http://employee.wibs.sch.id';
var student_url = 'http://student.wibs.sch.id';
var lastClick, table, id, form, to, modal, select, textarea;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#refresh-button').click(function(){
    table.ajax.reload();
});

$('#submit').click(function () {
    form = $('#form').serialize();
    switch (lastClick) {
        case 'edit-button':
            $.ajax({
                url: window.location.origin + '/' + content + '/' + id,
                type: 'PUT',
                data: form,
                success: function(x){
                    ajaxSuccess(x);
                    window.location.href = window.location.origin + '/' + content;
                },
                error: function(x){
                    ajaxError(x);
                }
            });
            break;
        default:
            $.ajax({
                url: window.location.origin + '/' + content + '/data',
                type: 'POST',
                data: form,
                success: function(x){
                    ajaxSuccess(x);
                    window.location.href = window.location.origin + '/' + content;
                },
                error: function(x){
                    ajaxError(x);
                }
            });
    }
});

function ajaxSuccess(x) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        type: 'success',
        title: 'Successfully'
    }).then(() => {
        if (modal) {
            $('#modal').modal('toggle');
        }
        if (table) {
            table.ajax.reload();
        }
    });
}

function ajaxError(x) {
    let h = JSON.parse(x.responseText);
    if (h.errors) {
        let error = '';
        $.each(h.errors, (i, v) => {
            error += v + '<br>';
        });
        Swal.fire({
            type : 'error',
            title: 'Oops...',
            text: h.message,
            footer: error
        });
    } else if (h.message) {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: x.responseJSON.message
        });
    } else {
        Swal.fire("Oops, An error occurred, please try again later", "", "error");
    }
}