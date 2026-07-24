$(document).ready(async function () {
    let columns = [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'fname',
            name: 'fname'
        },
        {
            data: 'lname',
            name: 'lname'
        },
        {
            data: 'mobile',
            name: 'mobile'
        },
        {
            data: 'service',
            name: 'service'
        },
        {
            data: 'message',
            name: 'message'
        },
        {
            data: 'actions',
            name: 'actions',
            orderable: false,
            searchable: false,
            className: 'admin-action-cell'
        },
       
       
    ];

    let table = await initDataTable($('#inquire-table'), columns);
});

$(document).on('click', '.delete', function () {
    $('#delete-modal .modal-title').html('Delete Inquire');
    $('#delete-modal #ajax-form').attr('method', 'DELETE');
    $('#delete-modal #ajax-form').attr('action', $(this).attr('data-url'));
    $('#delete-modal #ajax-form').attr('data-table', 'inquire-table');
    let modal = new bootstrap.Modal(document.getElementById('delete-modal'));
    modal.show();
});
