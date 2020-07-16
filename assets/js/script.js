$(function () {


    $('.tambahData').on('click', function () {
        $('#dataModalLabel').html('Tambah Data');
        $('.modal-footer button[type=submit]').html('Tambah');

        $('#nik').val('');
        $('#nama').val('');
        $('#jk').val('');
        $('#alamat').val('');
        $('#divisi').val('');
    });

    $('.tampilRubahData').on('click', function () {

        $('#dataModalLabel').html('Rubah Data');
        $('.modal-footer button[type=submit]').html('Rubah');
        $('.modal-content form').attr('action', 'http://localhost/ci-test/data/rubahData');
        $('.form-check-input').val('1');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/ci-test/data/getEditData',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id)
                $('#nik').val(data.nik);
                $('#nama').val(data.nama);
                $('#jk').val(data.jenis_kelamin);
                $('#alamat').val(data.alamat);
                $('#divisi').val(data.divisi);
            }
        });

    });
});
