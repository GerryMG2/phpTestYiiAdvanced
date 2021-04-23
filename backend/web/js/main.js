$(function () {
    $(document).on('click', '.showModalButton', function () {
        if ($('#modal').data('bs.modal').isShown) {
            $('#modal').find('#modalContent').html("cargando..").load($(this).attr('value'));
            //dynamiclly set the header for the modal
            document.getElementById('modalHeader').innerHTML ='<button type="button" class="close" data-dismiss="modal" aria-hidden = "true" >×</button > <h4 style="margin: 0px !important">' + $(this).attr('title') + '</h4>';
        } else {
            //if modal isn't open; open it and load content
            $
                ('#modal').modal('show').find('#modalContent').html("cargando...").load($(this).attr('value'));
            //dynamiclly set the header for the modal
            document.getElementById('modalHeader').innerHTML = '<button type="button" class="close" data-dismiss="modal" aria-hidden = "true" >×</button > <h4 style="margin: 0px !important">' + $(this).attr('title') + '</h4>';
        }
    });
});