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
            name: 'actions'
        },
       
       
    ];

    let table = await initDataTable($('#projects-table'), columns);
});

$(document).on('click', '.delete', function () {
    $('#delete-modal .modal-title').html('Delete Project');
    $('#delete-modal #ajax-form').attr('method', 'DELETE');
    $('#delete-modal #ajax-form').attr('action', $(this).attr('data-url'));
    $('#delete-modal #ajax-form').attr('data-table', 'projects-table');
    let modal = new bootstrap.Modal(document.getElementById('delete-modal'));
    modal.show();
});

