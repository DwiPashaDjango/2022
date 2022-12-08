$(document).ready(function() {
    $.ajax({
        url: '/staff/json',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            var user = '';
            $.each(data, function(key, value) {
                user += '<tr>';
                user += '<th>'+ value.name +'</th>';
                user += '<th>'+ value.jk +'</th>';
                user += '<td>'+ value.email +'</td>';
                user += '<td>'+ value.tgl_lahir +'</td>';
                user += '<td>'+ value.tempat_lahir +'</td>';
                user += '<td>'+ value.job +'</td>';
                user += '<td>'+ value.no_tlp +'</td>';
                user += '<td>'+ value.alamat +'</td>';
                user += '<td>'+ value.validasi +'</td>';
                user += '<td>'+ value.created_at +'</td>';
                user += '<td><a href="javascript:void(0)" data-id"'+ value.id +'" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a> <a href="javascript:void(0)" data-id"'+ value.id +'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>';
                user += '</tr>';
            });
            $('#usr-table').append(user).DataTable();
        }
    })

    $('.add').on('click', function() {
        $('#modalAdd').modal('show');
        $('#modalAddLabel').html('Tambah Staff');
        $('.saveAdd').on('click', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var validasi = $('#validasi').val();
            var jk = $('#jk').val();
            var email = $('#email').val();
            var tgl_lahir = $('#tgl_lahir').val();
            var tempat_lahir = $('#tempat_lahir').val();
            var id_job = $('#id_job').val();
            var no_tlp = $('#no_tlp').val();
            var alamat = $('#alamat').val();
            var level = $('#level').val();
            var password = $('#password').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/add',
                type: 'POST',
                data: {
                    name:name,
                    validasi:validasi,
                    jk:jk,
                    email:email,
                    tgl_lahir:tgl_lahir,
                    tempat_lahir:tempat_lahir,
                    id_job:id_job,
                    no_tlp:no_tlp,
                    alamat:alamat,
                    level:level,
                    password:password,
                },
                success: function(res) {
                    console.log(res)
                }
            })
        });
    });
});