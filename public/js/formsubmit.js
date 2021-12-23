$(function() {
    //find the button clicked
    var frmactionurl;
    $(document).on('click','.btnsubmit',function(){
        frmactionurl = $(this).val(); //get form action of the button and set to formationurl
    });
    // Variable to hold request
    var request;
    
    // Bind to the submit event of our form
    $("#dotform").submit(function(event){

        // Prevent default posting of form - put here to work in case of errors
        event.preventDefault();

        // Abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
            url: baseuri+frmactionurl,
            type: "post",
            beforeSend: function(){
                $('#processing').show();
            },
            data: serializedData
        });
        
        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            $('#result').html(response);
            //console.log(response);
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            $('#result').html(textStatus);
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
            $('#processing').hide();
        });

    });
});