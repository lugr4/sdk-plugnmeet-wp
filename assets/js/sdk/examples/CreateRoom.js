/* THIS SCRIPT IS AN EXAMPLE ONLY. IT DOES NOT WORK WITH THE PLUGIN. */

jQuery(document).ready(function ($) {
    $('#btn').on('click', function (event) {
        event.preventDefault();
        /*Prepare params*/
        const metadata = createRooMetadata({
            room_title: 'Title API',
        });
        const params = createRoomParams({
            room_id: 'API_Room',
            max_participants: 10,
            metadata: metadata
        });
        //Preapare json with params
        const paramsjson = JSON.stringify(params);

        // Do AJAX
        $.ajax({
            url: ajaxurl.ajaxurl, //WP admin ajax 
            type: 'POST',
            data: {
                action: 'process_active_room_info', //Action (Actions list)
                params: paramsjson //params
            },
            success: function (response) {
                // Manejar la respuesta del servidor
                if (response) {
                    console.log(response);
                }
            },
            error: function (error) {
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    });
});