<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <!-- datpicker custom -->
  <script type="text/javascript">
    //tanggal dari
    $('#tanggal_dari').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
      orientation: "auto",
      todayBtn: true,
      todayHighlight: true
    })
    
    //tanggal sampai
    $('#tanggal_sampai').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
      orientation: "auto",
      todayBtn: true,
      todayHighlight: true
    })

    //form load
    $(document).ready(function(){
      $('#LapPemesanan').submit(function(e){
        e.preventDefault();

        var TanggalDari = $('#tanggal_dari').val();
        var TanggalSampai = $('#tanggal_sampai').val();

        if(TanggalDari == '' || TanggalSampai == '') {
          $('.modal-dialog').removeClass('modal-lg');
          $('.modal-dialog').addClass('modal-sm');
          $('#ModalHeader').html('Oops !');
          $('#ModalContent').html("Tanggal harus diisi !");
          $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
          $('#ModalKu').modal('show');
        
        } else {
          var URL = "<?=base_URL()?>pengguna/laporanpemesanan/lihat/" + TanggalDari + "/" + TanggalSampai;

          $('#result').load(URL);
        }
      })
    })
  </script>

