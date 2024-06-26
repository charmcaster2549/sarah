$(document).ready(function(){
let ay="";
let count=1;

const sid = sidval;
const ay2 = $('#sh_ay').val();

// console.log("ay para assessment: ", ay2);
// console.log("sid para assessmenet:", sid);

var hrefValue = 'asmtperstudent.php?sid=' + sid + '&ay=' + ay2;
var hrefValue2 = 'report-allrec.php?sid=' + sid + '&ay=' + ay2;
$('#sarah').attr('href', hrefValue);
$('#asmt').attr('href', hrefValue2);


$('#select').on('change', async function(){
    const select = $(this).val();
    // console.log(select);

    if(select ==5 || select==6){
        $('#extra').show();
        $('#extra').addClass('extra');
        $('#grade').show();
        $('#grade').addClass('grade2');
        $('.grade2').append(`
            <div id="newdiv">
            Enter academic year: <input type="text" name="aygrade" id="aygrade" placeholder="e.g. 1st Sem ay 2024-2025">
            <input type="button" id="done" value="done">
            </div>
            `);
        
        $('.grade2').css({
        'display': 'flex', 
        'align-items':'center', 
        'justify-content':'center',
        'position':'relative'
        });
        
        // console.log("ay: ", ay)
        $('#done').click(function(){
            ay = $('#aygrade').val();
            // console.log('ay: ', ay);
            $('#extra').hide();
            $('#grade').hide();
            $('#newdiv').empty();

        })
        

    }

    
})



$('#sjs').click(function(){
    location.reload();
})

 $('#submit').on('click', async function(){
    const req = $('#select').val();
    const res = $('#reason').val();
    // console.log("request: ", req);
    // console.log("reason: ", res)    ;
    // console.log("ay: ", ay);
    // console.log("sid: ", sidval);
    
    const response = await axios.get(`requestdb.php?req=${req}&res=${res}&ay=${ay}&sid=${sidval}`);
    const responseData = response.data;
    // console.log(responseData);
    if (responseData.success) {
        alert('Insertion successful!');
    } else {
        alert('Insertion failed!');
    }
    
 })

 

 $.ajax({
    url: 'requestview.php',
    
    data: { sid: sidval },
    type: 'GET',
    success: function(response){
        // console.log(response);
        const responseData = JSON.parse(response);
        const viewdata = responseData.view;

        let tableContent = ''; 

        viewdata.forEach(item => {
            tableContent += `
                <tr>
                    <td>${count++}</td>
                    <td>${item.name}</td>
                    <td>${item.datesubmit}</td>
                    <td>${item.approvedate}</td>
                    <td>${item.datevalidated}</td>
                </tr>
            `;
        });

        $('#tbody').html(tableContent);

              
    }
})




});

