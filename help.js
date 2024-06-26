
    
   var hrefValue = 'asmtperstudent.php?sid=' + currentUserId + '&ay=' + academicId;
   $('#rep').attr('href', hrefValue);
   var hrefValue2 = 'report-allrec.php?sid=' + currentUserId + '&ay=' + academicId;
   $('#asmt').attr('href', hrefValue2);


$('.pay').click(function(){
    $('.blur').show();
    $('.payment').show();
    
});

$('.closehelp').click(function () {
    $('.blur').hide();
    $('.payment').hide();
});

$('.bayad').click(function(){
    $('.blur').show();
    $('.bayad2').show();
});

$('.closebayad').click(function(){
    $('.blur').hide();
    $('.bayad2').hide();
});

$('.limot').click(function(){
    $('.blur').show();
    $('.forgot').show();
});

$('.closeforgot').click(function(){
    $('.blur').hide();
    $('.forgot').hide();
});
