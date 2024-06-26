$('#acad').on('change', async function() {
    const academicId = $(this).val();
    const currentUserId=$("#currentUserId").val();
    const request = await axios.get(`http://localhost/mit/getsoa.php?academic_id=${academicId}&current_user_id=${currentUserId}`);
    const transRec = await request.data;
 $('#transreclist').empty();
    transRec.forEach(trans => {
         $('#transreclist').append(`
         <tr>
         <td>${trans.Ofrcpt}</td>
         <td>${trans.date}</td>
         <td>${trans.amt}</td>
         </tr>
     `);
    });
 });