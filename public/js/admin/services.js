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
            data: 'icon',
            name: 'icon'
        },
        {
            data: 'title',
            name: 'title'
        },
        {
            data: 'description',
            name: 'description'
        },
        {
            data: 'actions',
            name: 'actions',
            orderable: false,
            searchable: false,
            className: 'admin-action-cell'
        },
       
       
    ];

    let table = await initDataTable($('#service-table'), columns);
});


$(document).on('click', '.delete', function () {
    $('#delete-modal .modal-title').html('Delete Service');
    $('#delete-modal #ajax-form').attr('method', 'DELETE');
    $('#delete-modal #ajax-form').attr('action', $(this).attr('data-url'));
    $('#delete-modal #ajax-form').attr('data-table', 'service-table');
    let modal = new bootstrap.Modal(document.getElementById('delete-modal'));
    modal.show();
});
