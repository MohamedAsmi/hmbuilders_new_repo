$(document).ready(async function () {
    let columns = [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'subject',
            name: 'subject'
        },
        {
            data: 'message',
            name: 'message'
        },
        {
            data: 'actions',
            name: 'actions'
        },
       
       
    ];

    let table = await initDataTable($('#message-table'), columns);
});

$(document).on('click', '.delete', function () {
    $('#delete-modal .modal-title').html('Delete Message');
    $('#delete-modal #ajax-form').attr('method', 'DELETE');
    $('#delete-modal #ajax-form').attr('action', $(this).attr('data-url'));
    $('#delete-modal #ajax-form').attr('data-table', 'message-table');
    let modal = new bootstrap.Modal(document.getElementById('delete-modal'));
    modal.show();
});
