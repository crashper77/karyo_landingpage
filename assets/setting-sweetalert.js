const { default: Swal } = require("sweetalert2");

const flashData = $('.flash-data').data('add_success');

if (flashData) {
    Swal({
        title: 'Data Margin ',
        text: 'Berhasil' + flashData,
        type: 'success'
    });
}