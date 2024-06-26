let studentIdNumber;
let isUpdate = false;
let paymentHistoryId = 0;
//nagkuha sa gi search
$('#searchinput').on('keyup', function(e) {
    if (e.key === 'Enter') {
        var searchText = $(this).val();
        $.ajax({
            url: 'search.php', 
            method: 'GET',
            data: { search: searchText },
            success: function(response) {
                $('#results').show();
                $('#results').addClass('active');
                $('#results').html(response); 
            }
        });
    }
});


$('html, body').on('click', function() {
    $('#results.active').hide();
});

//nag select based sa result
$(document).on('click', '#acad > div', async function() {
    const studentId = $(this).data('student-id');
    const request = await axios.get(`getStudentInfo.php?student_id=${studentId}`);
    const studentDetails = await request.data;
    
    //gkuha ang id number sa student
    studentIdNumber = studentDetails.studidnum;

    //paras ay eg human search
    const request2 = await axios.get(`newaystaff.php?student_id=${studentIdNumber}`);
    const ayname = await request2.data.ayname;
    // console.log("aynem: ",ayname);

    $('#ay').empty();
    ayname.forEach(ayy => {
        $('#ay').append(`
            
            <option value="${ayy.no}">${ayy.name}</option>
            </select>
            `)
    })
  
    $('.studname').html(`Name: ${capitalizeFirstLetter(studentDetails.fname)} ${capitalizeFirstLetter(studentDetails.lname)}`);
    $('.studcourse').html(`Course & Year: ${studentDetails.course} - ${studentDetails.year}`);
    $('.place').html(`Residence: ${capitalizeFirstLetter(studentDetails.residence)}`);

    function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
    }

    getStudentTransRec();
    
});


$('#transRecSubmit').on('submit', async function(e) {
    e.preventDefault();

    const receipt = $('.receipt').val();
    const petsa = $('.petsa').val();
    const amt = $('.amt').val();
    const ay = $('#ay').val();
    const type = $('#type').val();
    const no = $('.no').val();
    let response;

    const data = {
        receipt: receipt,
        petsa: petsa,
        amt: amt,
        ay: ay,
        type: type,
        sid: studentIdNumber,
        no: no,
        paymentHistoryId: paymentHistoryId,
    };

    console.log("data: ", data)
    if (isUpdate) {
        const request = await axios.post('updateTransRec.php', data);
        response = await request.data;
        isUpdate = false;
    } else {
        const request = await axios.post('saveTransRec.php', data);
        response = await request.data;
    }

    alert(response);
    getStudentTransRec();

    $('.submit').click(function(){
        $('.amt').removeAttr('style');
        $('.petsa').removeAttr('style');
        $('.receipt').removeAttr('style');
    })
});


//update staff information
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



//if mag change ug semester
$('#ay').on('change', async function(){
    const ay = $('#ay').val();
    console.log('ay change: ', ay);
    const request = await axios.get(`getStudentTransRec.php?studidnum=${studentIdNumber}&ay=${ay}`);
    console.log("sid change: ", studentIdNumber);
    const transRecs = await request.data.trans_rec;
    const recInfo = await request.data.rec_info;
    const breakdown = await request.data.break_down;
    
    // console.log("trans: ",transRecs);
    // console.log("rec: ",recInfo);
    // console.log("break: ",breakdown);
    
    getStudentTransRec();
        
    $("#list_summary").html(`

       
        <table id="lista2">
        <tbody class="listabody">
        <tr>
        <td><label>Tuition</label></td>
        <td><input type="text" class="tui" value="PHP ${breakdown.totaltuition}"></td>
        <td><label>SG Fund</label></td>
        <td><input type="text" value="1600"></td>
        <td><label>Miscellaneous</label></td>
        <td><input type="text" value="${breakdown.others-1600}"></td>
        </tr>
       
        
        <tr>
        <td><label>Total Tuition Fee</label></td>
        <td><input type="text" class="tt" value="PHP ${recInfo.totaltuition}" ></td>
  
        <td><label>Total Amount Paid</label></td>
        <td><input type="text" class="tap" value="PHP ${recInfo.totalAmtPaid}"></td>

        <td><label>Balance</label></td>
        <td><input type="text" class="bal" value="PHP ${recInfo.balance}"></td>
        </tr>
        </tbody>
        </table>
       

`);
      
})

//pa display sa record sa mga resibo sa bayad
const getStudentTransRec = async () => {
    
    const ay = $('#ay').val();
    // console.log('ay: ', ay);
    const request = await axios.get(`getStudentTransRec.php?studidnum=${studentIdNumber}&ay=${ay}`);
    // console.log("sss: ", studentIdNumber);
    const transRecs = await request.data.trans_rec;
    const recInfo = await request.data.rec_info;
    const breakdown = await request.data.break_down;
    
    // console.log("trans: ",transRecs);
    // console.log("rec: ",recInfo);
    // console.log("break: ",breakdown);


    $('#transRecList').empty();
    let countno = 1;
    transRecs.forEach(trasnrec => {
        $('#transRecList').append(`
            <tr>
                <td>${countno++}</td>
                <td>${trasnrec.Ofrcpt}</td>
                <td>${trasnrec.date}</td>
                <td>${Number(trasnrec.amt).toLocaleString('en-us')}</td>
                <td>${trasnrec.no}</td>
                <td >
                    <div style="display: flex; justify-content: center; padding: 0;">
                    <button type="button" src="button_edit.php" class="editbutton">Edit | <img src="pic/edit.png" alt="edit" style="width: 21px"></button>
                    </div>
                </td>
            </tr>
        `);
    });

    //para edit sa resibo
    $(document).on('click', '.editbutton', function(){
        const paymentHistories = $(this).closest('tr').find('td');
        paymentHistoryId = paymentHistories.eq(0).text();
        const officialReceipt = paymentHistories.eq(1).text();
        const date = paymentHistories.eq(2).text();
        const amount = paymentHistories.eq(3).text();
        const no = paymentHistories.eq(4).text();
        var currentDate = new Date(date);
        var formattedDate = currentDate.toISOString().slice(0, 10);
        $('.receipt').val(officialReceipt);
        $('.receipt').css('background', '#CECECE');
        $('.petsa').val(formattedDate);
        $('.petsa').css('background', '#CECECE');
        $('.amt').val(amount);
        $('.amt').css('background', '#CECECE');
        $('.no').val(no);
        isUpdate = true;
    });


    //summary nga box
    $("#list_summary").html(`

       
        <table id="lista2">
        <tbody class="listabody">
        <tr>
        <td><label>Tuition</label></td>
        <td><input type="text" class="tui" value="PHP ${breakdown.totaltuition}"></td>
        <td><label>SG Fund</label></td>
        <td><input type="text" value="1600"></td>
        <td><label>Miscellaneous</label></td>
        <td><input type="text" value="${breakdown.others-1600}"></td>
        </tr>
       
        
        <tr>
        <td><label>Total Tuition Fee</label></td>
        <td><input type="text" class="tt" value="PHP ${recInfo.totaltuition}" ></td>
  
        <td><label>Total Amount Paid</label></td>
        <td><input type="text" class="tap" value="PHP ${recInfo.totalAmtPaid}"></td>

        <td><label>Balance</label></td>
        <td><input type="text" class="bal" value="PHP ${recInfo.balance}"></td>
        </tr>
        </tbody>
        </table>
       

`);
}


$('.editdiv').click(function(){
    $('.editprofcon').show();
})

$('.close').click(function(){
    $('.editprofcon').hide();
})