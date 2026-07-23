$(document).ready(async function () {
    let columns = [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'image',
            name: 'image'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'qualification',
            name: 'qualification'
        },
        {
            data: 'position',
            name: 'position'
        },
        {
            data: 'actions',
            name: 'actions'
        },
       
    ];

    let table = await initDataTable($('#team-table'), columns);
});


$(document).on('click', '.delete', function () {
    $('#delete-modal .modal-title').html('Delete Member');
    $('#delete-modal #ajax-form').attr('method', 'DELETE');
    $('#delete-modal #ajax-form').attr('action', $(this).attr('data-url'));
    $('#delete-modal #ajax-form').attr('data-table', 'team-table');
    let modal = new bootstrap.Modal(document.getElementById('delete-modal'));
    modal.show();
});