function generatePDF() {
    const element = document.getElementById("printedFile");

    //custom file name
    //html2pdf().set({filename: 'code_with_mark_'+js.AutoCode()+'.pdf'}).from(element).save();


    //more custom settings
    var opt = {
        margin: -0.5,
        //    image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
    };

    // New Promise-based usage:
    html2pdf()
        .set(opt)
        .from(element)
        .save();
}