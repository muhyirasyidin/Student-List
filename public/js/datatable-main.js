$(document).ready(function(){
    // table.on('click', '.delete-button', function(){
    $('table').on('click', '.delete-button', function(){
        id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'danger',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: window.location.origin + '/' + content + '/' + id,
                    type: 'DELETE',
                    success: function(x){
                        ajaxSuccess(x);
                        window.location.href = window.location.origin + '/' + content;
                    },
                    error: function(){
                        swal("Oops!", "You got problem here!", "error");
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                );
            }
        })
    });
});