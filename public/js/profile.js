$( document ).ready(function() {
    $( "#save" ).on( "click", function() {

        //собираем все поля
        var form_data = new FormData();
        var textcolor = $('#textcolor').val();
        var font = $('#font').prop('files')[0];
        var file_data = $('#background').prop('files')[0];
        var logo_data = $('#logo').prop('files')[0];
        var word = $('#word').val();
        //добавляем в форму
        form_data.append('textcolor', textcolor);
        form_data.append('font', font);
        form_data.append('background', file_data);
        form_data.append('logo', logo_data);
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

                    //Ошибки
                    $('#background_error').html(result.background_error);
                    $('#logo_error').html(result.logo_error);
                    $('#font_error').html(result.font_error);
                    
                        $('.status').fadeIn();
                        $('.status').html('Сохранения изменены');
                        $('.status').delay(2500).fadeOut();
                }
            });
    });
});
