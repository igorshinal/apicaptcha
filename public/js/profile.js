$( document ).ready(function() {

    $( "#save" ).on( "click", function() {

            var form_data = new FormData();

                var background_width = $('#background_width').val();
                var background_height = $('#background_height').val();
                var logo_width = $('#logo_width').val();
                var logo_height = $('#logo_height').val();
                var textcolor = $('#textcolor').val();


                form_data.append('background_width', background_width);
                form_data.append('background_height', background_height);
                form_data.append('logo_width', logo_width);
                form_data.append('logo_height', logo_height)
                form_data.append('textcolor', textcolor);

                var font = $('#font').prop('files')[0];
                form_data.append('font', font);

                var file_data = $('#background').prop('files')[0];
                form_data.append('background', file_data);

                var logo_data = $('#logo').prop('files')[0];
                form_data.append('logo', logo_data);

            var word = $('#word').val();
            form_data.append('word', word);

            $.ajax({
                url: '/profile/save',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(result){
                    $('#showbackground').attr({
                        src: result.background+'?'+new Date().getTime(),
                    });
                    $('#showlogo').attr({
                        src: result.logo +'?'+new Date().getTime(),
                    });
                    $('#result').attr({
                        src: result.draw +'?'+new Date().getTime(),
                    });
                    $('#background_width').val(result.background_width);
                    $('#background_height').val(result.background_height);
                    $('#logo_width').val(result.logo_width);
                    $('#logo_height').val(result.logo_height);

                    if(result.error)
                    {
                        $('.status').fadeIn();
                        $('.status').html(result.error);
                        $('.status').delay(2500).fadeOut();
                    }
                    else
                    {
                        $('.status').fadeIn();
                        $('.status').html('Сохранения изменены успешно');
                        $('.status').delay(2500).fadeOut();
                    }
                }
            });
    });

});
