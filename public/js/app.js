$( document ).ready(function() {
    $.ajax( "/register/langlist" )
        .done(function(data) {
            $.each(JSON.parse(data), function(k,v) {
                $('#lang_select').append('<option value="'+v.alpha2+'">'+v.name+'</option>');
            });
        });
    $.ajax( "/register/countrylist" )
        .done(function(data) {
            $.each(JSON.parse(data), function(k,v) {
                $('#country_select').append('<option value="'+v.code+'">'+v.name+'</option>');
            });
        });
});
