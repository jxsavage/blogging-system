$(function () {

    $(".datetimepicker").datetimepicker({});

    //adds a new file picker when add picture button is clicked.
    $(".btn-add-photo").on('click', function(){
        var picker = $('<input class="btn btn-primary" name="pictures[]" type="file">');
        $(this).before(picker);
    })

    // var files;
    // $('input[type=file]').on('change', prepareUpload);
    // function prepareUpload(event)
    // {
    //     files = event.target.files;
    //     console.log(files);
    // }

    $( ".ajax-form" ).on( "submit", function( event ) {

        event.preventDefault();

        //uploading button change here



        // if ( files )
        // {
        //     serializedForm = new FormData(this);
        //
        //     $.each(files, function(key, value){
        //
        //         console.log(key);
        //         console.log(value);
        //         serializedForm.append(key, value);
        //
        //     });
        //
        //
        // }
        //
        // console.log(serializedForm);
        var form = $(this);
        var target = form.attr("data-target");
        var method = form.find('[name=_method]').attr('value');
        var serializedForm = form.serialize();
        $.post(this.action, serializedForm, function (data) {
                if ( method === 'DELETE' )
                {
                    if ( target === '#tag-container')
                    {
                        $(target).empty();
                        $(target).append(data);
                    }
                    else
                    {
                        $(target).remove();
                    }
                }
                else if ( method === 'PUT' )
                {
                    $(target).empty();
                    $(target).append(data);
                }
                //undefined === POST
                else if ( method === undefined )
                {
                    if ( target === '#tag-container')
                    {
                        $(target).empty();
                        $(target).append(data);
                    }

                }
            }).fail(function (data) {
                console.log(data.responseJSON);
                for(key in data.responseJSON)
                {
                    alert(data.responseJSON[key]);
                }
            });




        });




});
