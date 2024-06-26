$('#acad').on('change', async function() {
  const academicId = $(this).val();
  const currentUserId=$("#currentUserId").val();
  const request = await axios.get(`http://localhost/mit/getsoa.php?academic_id=${academicId}&current_user_id=${currentUserId}`); 
  const transRec = await request.data.trans_rec;
  const recInfo = await request.data.rec_info;

  
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

  $('#total').html(`
  <table border='0' style="width: 80%; table-layout: fixed;">
  
     <div class="form">
     <tr>
        <div>
           <td style="width: 30%"><label>Total Tuition:</label></td>
           <td><input type="text" value="PHP ${recInfo.totaltuition}" / style="font-size: 20px; width: 80%; height: 50px; margin: 5px; padding: 10px" readonly></td>
        </div>
        </tr>
        <tr>
        <div>
           <td><label>Balance:</label></td>
           <td><input type="text" value="PHP ${recInfo.balance}" / style="font-size: 20px; width: 80%; height: 50px; margin: 5px; padding: 10px" readonly></td>
        </div>
        </tr>
        <tr>
        <div>
           <td><label>Total Amount Paid:</label></td>
           <td style="padding 5px"><input type="text" value="PHP ${recInfo.totalAmtPaid}" / style="font-size: 20px; width: 80%; height: 50px; margin: 5px; padding: 10px" readonly></td>
        </div>
        </tr>
     </div>
     </table>
  `);
});