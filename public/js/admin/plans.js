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
            data: 'type',
            name: 'type'
        },
        {
            data: 'title',
            name: 'title'
        },
        {
            data: 'location',
            name: 'location'
        },
        {
            data: 'actions',
            name: 'actions',
            orderable: false,
            searchable: false,
            className: 'admin-action-cell'
        },
       
       
    ];

    let table = await initDataTable($('#plans-table'), columns);
});

$(document).on('click', '.delete', function () {
    $('#delete-modal .modal-title').html('Delete Plans');
    $('#delete-modal #ajax-form').attr('method', 'DELETE');
    $('#delete-modal #ajax-form').attr('action', $(this).attr('data-url'));
    $('#delete-modal #ajax-form').attr('data-table', 'plans-table');
    let modal = new bootstrap.Modal(document.getElementById('delete-modal'));
    modal.show();
});
