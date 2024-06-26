
$('.editdiv').click(async function(){
    const idstaff = idvalue;
    console.log("id staff: ", idstaff);
    const request = await axios.get(`updateinfo.php?idstaff=${idstaff}`);
    const staffdetails = await request.data;

    
    $('#extra2').show();
    $('#extra2').addClass('extra2');
    $('.close').click(function(){
        $('#extra2').hide();
    })

    $('.botEP').html(`
    
    <form action="updateinfostud.php" method="post"  enctype="multipart/form-data">
        <table id="EPtable" border='0'>
            
            <tr>
            <input type="hidden" name="hide" value="${idstaff}">
                <td><label for="">Username</label></td>
                <td><input type="text" name="uname" class="uname" value="${staffdetails.username}"></td>
            </tr>
            <tr></tr>
                    <td><label for="">Password</label></td>
                    <td><input type="text" name="pwd" value="${staffdetails.password}"></td>
                </td>
                <tr>
                    <td><label for="">Name</label></td>
                    <td><input type="text" name="name" id="" value="${staffdetails.name}"></td>
                </tr>
                <tr>
                    <td><label for="">Email</label></td>
                    <td><input type="text" name="email" id="" value="${staffdetails.email}"></td>
                </tr>
                <tr>
                    <td><label for="">Image</label></td>
                    <td>
                        <input type="file" name="file" id="file">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="upload" id="upload" value="submit">
                    </td>
                </tr>
                </form>
            </table>
    `)
})


$('.editdiv').click(function(){
    $('.editprofcon').show();
})

$('.close').click(function(){
    $('.editprofcon').hide();
})