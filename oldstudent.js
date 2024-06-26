$('#searchinput').on('keyup', function(e) {
    if (e.key === 'Enter') {
        var searchText = $(this).val();
        $.ajax({
            url: 'search.php', // Replace with the server-side script URL
            method: 'GET',
            data: { search: searchText },
            success: function(response) {
                $('#results').show();
                $('#results').addClass('active');
                $('#results').html(response); // Display the response in the searchResults div
            }
        });
    }
});

$('html, body').on('click', function() {
    $('#results.active').hide();
});

$(document).on('click', '#acad > div', async function() {
    const studentId = $(this).data('student-id');
    const request = await axios.get(`getStudentInfo.php?student_id=${studentId}`);
    const studentDetails = await request.data;
    
    
    studentIdNumber = studentDetails.studidnum;
    console.log("id: ", studentId);

    


    $(".wrapperstud").html(`

        <form action="studentaccountold.php" method="post" id="myForm">
            <table>
            <tr><td colspan="2"><h2>MAIN INFORMATION</h2></td></tr>
            <tr>
                <td><label for="">Student ID Number</label></td>
                <td><input type="text" name="id" value="${studentDetails.studidnum}"></td>
            </tr>
            <tr>
                <td style="width: 150;"><label for="">First Name</label></td>
                <td><input type="text" name="fname" value="${studentDetails.fname}"></td>
            </tr>
            <tr>
                <td><label for="">Middle Name</label></td>
                <td><input type="text" name="mname" value="${studentDetails.mname}"></td>
            </tr>
            <tr>
                <td><label for="">Last Name</label></td>
                <td><input type="text" name="lname" value="${studentDetails.lname}"></td>
            </tr>
            <tr>
                <td><label for="">Course</label></td>
                <td><input type="text" name="course" value="${studentDetails.course}"></td>
            </tr>
            <tr>
                <td ><label for="">Year</label></td>
                <td style="display: flex; align-items: center; justify-content: space-between;">
                <select name="year" id="" style="height: 38px;">
                    <option value="${studentDetails.year}">${studentDetails.year}</option>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
            </tr>
            <tr>
            <td><label for="">Total Units</label></td>
            <td><input type="text" name="units" style="width:117;" required></td>
        </tr>
        <tr>
            <td>Residence</td>
            <td>
                <select name="residence" id="" style="height:38px;" required>
                    <option value="${studentDetails.residence}">${studentDetails.residence}</option>
                    <option value="sibonganhon">Sibonganhon</option>
                    <option value="nonsibonganhon">Non-Sibonganhon</option>
            </select></td>
        </tr>
        <tr>
            <td><label for="">Academic Year</label></td>
            <td id="academicyearcontainer">
            </td>
        </tr>
            
            </table>
            <div class="btncontainer">
            <input type="submit" class="submit" value="submit">
        </form> 
            </div>
`);


$.ajax({
    url: 'ay.php',
    type: 'GET',
    success: function(response){
        $("#academicyearcontainer").html(response);
    }
})


function capitalizeFirstLetter(string) {
return string.charAt(0).toUpperCase() + string.slice(1);
}


   
});