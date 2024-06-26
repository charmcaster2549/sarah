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

        <form action="studentupdatestaff.php" method="post" id="myForm">
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
                <td colspan="2"><h2>BACKGROUND INFORMATION</h2></td>
            </tr>
            <tr>
                <td><label for="">Barangay</label></td>
                <td><input type="text" name="brgy" value="${studentDetails.barangay}"></td>
            </tr>
            <tr>
                <td><label for="">Municipality/City</label></td>
                <td><input type="text" name="mun" required value="${studentDetails.mun_city}"></td>
            </tr>
            <tr>
                <td><label for="">Province</label></td>
                <td><input type="text" name="pro" value="${studentDetails.province}"></td>
            </tr>
            <tr>
                <td><label for="">Guardian Address</label></td>
                <td><input type="text" name="gadd" value="${studentDetails.gaddress}"></td>
            </tr>
            <tr>
                <td><label for="">Other Address</label></td>
                <td><input type="text" name="oadd" value="${studentDetails.oaddress}"></td>
            </tr>
            
            <tr>
                <td><label for="">Father's Name</label></td>
                <td><input type="text" name="father" value="${studentDetails.fathername}"></td>
            </tr>
            
            <tr>
                <td><label for="">Mother's Name</label></td>
                <td><input type="text" name="mother" value="${studentDetails.mothername}"></td>
            </tr>
            <tr>
                <td><label for="">Guardian's Name</label></td>
                <td><input type="text" name="gname" value="${studentDetails.guardianame}"></td>
            </tr>
            <tr>
                <td colspan="2"><h2>OTHER INFORMATION</h2> </td>
            </tr>
            <tr>
                <td><label for="">Contact Number</label></td>
                <td><input type="text" name="cnum" value="${studentDetails.con_num}"></td>
            </tr>
            <tr>
                <td><label for="">Telephone/Mobile</label></td>
                <td><input type="text" name="tel" value="${studentDetails.tel}"></td>
            </tr>
            
            
            
            <tr>
                <td><label for="">Email</label></td>
                <td><input type="text" name="email" value="${studentDetails.email}"></td>
            </tr>
            
            </table>
            <div class="btncontainer">
            <input type="submit" class="submit" value="update">
        </form> 
            </div>
       
   
    

`);


    function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
    }

    
});