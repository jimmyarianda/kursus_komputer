<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        // View data guru
        $('#tguru').DataTable({
            "processing": true,
            "language": {
                "processing": "Sedang memuat....."
            },
            "serverSide": true,
            "ajax": "<?=site_url('guru/get_data');?>",
            "columns": [
                {
                    "data": null,
                    "orderable": true
                },
                {"data": "gru_id", "visible": false},
                {"data": "gru_nama"},
                {"data": "gru_alamat"},
                {"data": "gru_nope"},
                {"data": "action"}
            ],
            "order": [[1, 'dsc']],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // View data siswa
        $('#tsiswa').DataTable({
            "processing": true,
            "language": {
                "processing": "Sedang memuat....."
            },
            "serverSide": true,
            "ajax": "<?=site_url('siswa/get_data');?>",
            "columns": [
                {
                    "data": null,
                    "orderable": true
                },
                {"data": "swa_id", "visible": false},
                {"data": "swa_nama"},
                {"data": "swa_jekel"},
                {"data": "swa_alamat"},
                {"data": "swa_umur"},
                {"data": "swa_nope"},
                {"data": "action"}
            ],
            "order": [[1, 'dsc']],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // View data kursuss
        $('#tkursus').DataTable({
            "processing": true,
            "language": {
                "processing": "Sedang memuat....."
            },
            "serverSide": true,
            "ajax": "<?=site_url('kursus/get_data');?>",
            "columns": [
                {
                    "data": null,
                    "orderable": true
                },
                {"data": "krs_id", "visible": false},
                {"data": "gru_nama"},
                {"data": "swa_nama"},
                {"data": "krs_tgl_masuk"},
                {"data": "krs_tgl_selesai"},
                {"data": "action"}
            ],
            "order": [[1, 'dsc']],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // View data kursuss
        $('#tpembayaran').DataTable({
            "processing": true,
            "language": {
                "processing": "Sedang memuat....."
            },
            "serverSide": true,
            "ajax": "<?=site_url('pembayaran/get_data');?>",
            "columns": [
                {
                    "data": null,
                    "orderable": true
                },
                {"data": "pby_id", "visible": false},
                {"data": "swa_nama"},
                {"data": "pby_spp"},
                {"data": "pby_tgl"},
                {"data": "action"}
            ],
            "order": [[1, 'dsc']],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // View data user
        $('#tuser').DataTable({
            "processing": true,
            "language": {
                "processing": "Sedang memuat....."
            },
            "serverSide": true,
            "ajax": "<?=site_url('user/get_data');?>",
            "columns": [
                {
                    "data": null,
                    "orderable": true
                },
                {"data": "usr_id", "visible": false},
                {"data": "usr_username"},
                {"data": "usr_nama"},
                {"data": "usr_level"},
                {"data": "action"}
            ],
            "order": [[1, 'asc']],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // Notification alert
        $("#errorMessage").alert().delay(4000).slideUp('slow');
        $("#successMessage").alert().delay(4000).slideUp('slow');
    });
</script>