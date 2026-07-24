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
            data: 'image',
            name: 'image'
        },
     
        {
            data: 'actions',
            name: 'actions',
            orderable: false,
            searchable: false,
            className: 'admin-action-cell'
        },
       
       
    ];

    let table = await initDataTable($('#modal-projects-table'), columns);
});

$(document).on('click', '.delete', function () {
    $('#delete-modal .modal-title').html('Delete Modal Project');
    $('#delete-modal #ajax-form').attr('method', 'DELETE');
    $('#delete-modal #ajax-form').attr('action', $(this).attr('data-url'));
    $('#delete-modal #ajax-form').attr('data-table', 'modal-projects-table');
    let modal = new bootstrap.Modal(document.getElementById('delete-modal'));
    modal.show();
});
