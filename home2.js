$(window).on('load', async function(){
    
    const sid = sidval;
    const ay = $('#sh_ay').val();
    // console.log("ay: ", ay);
    // console.log(sid);


    var hrefValue = 'asmtperstudent.php?sid=' + sid + '&ay=' + ay;
    var hrefValue2 = 'report-allrec.php?sid=' + sid + '&ay=' + ay;
    var hrefValue3 = 'asmtperstudent.php?sid=' + sid + '&ay=' + ay;
    $('#rep').attr('href', hrefValue);
    $('#asmt').attr('href', hrefValue2);
    $('#rep2').attr('href', hrefValue3);

    const request = await axios.get(`home2db.php?studid=${sid}&ay=${ay}`);
    const recinfo = request.data.due;
    const transrec = request.data.trans_rec;
    
    const name_ay = request.data.ayname;
    // console.log("name sa ay: ", name_ay);
    const recout = request.data.total;
    // console.log("total: ", recout);

    $('#dueno').html(`<h4 id="dueno">${transrec && transrec.amt ? transrec.amt : '0.00'}</h4>`)
    $('#paidno').html(`<h4 id="paidno">${recinfo.totalAmtPaid}</h4>`);
    $('#balno').html(`<h4 id="balno">${recinfo.balance}</h4>`);
    $('#balsem').html(`<p id="balsem">${name_ay.name}`);
    $('#outno').html(`<h4 id="outno">${recout.total}</h4>`)

});

$('#sh_ay').on('change', async function(){
    const sid = sidval;
    const ay = $('#sh_ay').val();
    // console.log("ay: ", ay);
    // console.log(sid);

    var hrefValue = 'asmtperstudent.php?sid=' + sid + '&ay=' + ay;
    $('#rep').attr('href', hrefValue);
    
    const request = await axios.get(`home2db.php?studid=${sid}&ay=${ay}`);
    const recinfo = request.data.due;
    const transrec = request.data.trans_rec;
    const recout = request.data.total;
    // console.log("total: ", recout);

    
    const name_ay = request.data.ayname;
    // console.log("name sa ay: ", name_ay);

    
    $('#balsem').html(`<p id="balsem">${name_ay.name}`);


    $('#dueno').html(`<h4 id="dueno">${transrec.amt}</h4>`)
    $('#paidno').html(`<h4 id="paidno">${recinfo.totalAmtPaid}</h4>`);
    $('#balno').html(`<h4 id="balno">${recinfo.balance}</h4>`);
    $('#outno').html(`<h4 id="outno">${recout.total}</h4>`)
}) 

