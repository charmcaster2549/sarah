$('.addsem').on('click', function(){
    $('.sh_right').addClass('blur');
    $('.wrappersummarry_box').hide();
    $('.sh_summary_box').hide();

    $('.table').addClass('blur');
    $('.title').hide();
    $('.tbgroup').hide();
    $('.popup').show();
});


$('.closeButton').click(function(){
    $('.popup').hide();
    $('.wrappersummarry_box').show();
    
    $('.sh_summary_box').show();
    $('.sh_right').removeClass('blur');

    
    $('.table').removeClass('blur');
    $('.title').show();
    $('.tbgroup').show();
});

$('.misc').click(function(){
    $('.sh_right').addClass('blur');
    $('.wrappersummarry_box').hide();
    $('.sh_summary_box').hide();
    $('.miscellaneous').show();
    $('.table').addClass('blur');
    $('.title').hide();
    $('.tbgroup').hide();
    $('#miscfocus').focus();
})

$('.closemisc').click(function(){
    $('.miscellaneous').hide();
    $('.wrappersummarry_box').show();
    
    $('.sh_summary_box').show();
    $('.sh_right').removeClass('blur');

    
    $('.table').removeClass('blur');
    $('.title').show();
    $('.tbgroup').show();
})