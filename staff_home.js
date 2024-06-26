$('#sh_ay').on('change', async function(){
    const ay=$(this).val();
    const type = $('#non_select').val();
    console.log('ay: ', ay);
    console.log('type: ', type);
    const response = await axios.get(`http://localhost/mit/sibonganhon.php?sh_ay=${ay}&type=${type}`);

    const studList = response.data.count;
    console.log('list: ', studList);
    const count = studList.count;

    $('#list').text('No. of students: ' + count);

    
    const fullList = response.data.sid_count;
    console.log('full: ', fullList);
    const full = fullList.sid_count;
    
    $('#full').text('Paid in full: ' + full);

    const totalAmount = response.data.total;
    console.log('total', totalAmount);
    const amount = totalAmount.total;

    $('#total').text('Total amount collected: ' + amount);
    
    

    //nonsibonganhon info

    const nonlist = response.data.non;
    console.log('list-non', nonlist);
    const noncount = nonlist.non;

    const nonfull = response.data.sid_countnon;
    console.log('list-nonnn', nonfull);
    const noncountfull = nonfull.sid_countnon;

    const totalAmountnon = response.data.totalnon;
    console.log('totalnon', totalAmountnon);
    const amountnon = totalAmountnon.totalnon;


    $('#non_display').empty();
    $('#non_display').append(`
    <p>No. of students: ${noncount}</p>
    <p>Paid in full: ${noncountfull}</p>
    <p>Total amount collected: ${amountnon}</p>
    

    `)
    

    $('#non_select').on('change', async function(){
        
        const type=$(this).val();
        console.log("you clickkkk", type);

        const nonlist = response.data.non;
        console.log('list-non', nonlist);
        const noncount = nonlist.non;

        const nonfull = response.data.sid_countnon;
        console.log('list-nonnn', nonfull);
        const noncountfull = nonfull.sid_countnon;

        const totalAmountnon = response.data.totalnon;
        console.log('totalnon', totalAmountnon);
        const amountnon = totalAmountnon.totalnon;

        const totaltuition = response.data.tuition;
        console.log('tuition: ', totaltuition);
        const tui = totaltuition.tuition;

        if(type==1){
            $('#non_display').empty();
            $('#non_display').append(`
            <p>No. of students: ${noncount}</p>
            <p>Paid in full: ${noncountfull}</p>
            <p>Total amount collected: ${amountnon}</p>
            

            `)

        }
        else{
            $('#non_display').empty();
            $('#non_display').append(`
            <p>No. of students: ${noncount}</p>
            <p>Total amount collected: ${tui}</p>
            

            `)
        }



    });

    
});

$('.editdiv').click(async function(){
    const idstaff = idvalue;
    const request = await axios.get(`updateinfo.php?idstaff=${idstaff}`);
    const staffdetails = await request.data;

    $('.botEP').html(`
    
    <form action="updateinfo2.php" method="post"  enctype="multipart/form-data">
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