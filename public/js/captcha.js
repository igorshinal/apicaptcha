$( document ).ready(function() {
    var domain = 'http://83.142.104.2';
    $.ajax({
        url: domain+"/api/get/captcha",
        dataType: 'json',
        success: function (result) {
            $('.captcha').attr({
                src: domain+result.captcha_link,
                'data-id': result.captcha_id,
            });
        },
    });
    $(".check").submit(function(e) {
        e.preventDefault();
        var id = $('.captcha').data('id');
        var text = $('.text').val();
        var self = this;
        $.ajax({
            url: domain+"/api/check/captcha",
            method: "POST",
            data: { id : id,
                text: text},
            success: function (result) {
                if(result == 'false')
                {
                    $('.error').html('Символы с картинки введены не верно');
                }
                else
                {
                    $('.error').html('');
                    self.submit();
                }
            },
        });
    });
});

