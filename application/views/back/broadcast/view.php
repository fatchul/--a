<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
<?php echo t_static('Tujuan ',$res[0]->kepada) ?>
<?php echo t_static('Subjek Pesan ',$res[0]->judul) ?>
<?php echo t_static('Isi pesan',$res[0]->isi) ?>
<?php echo t_static('Tanggal Terkirim',dates($res[0]->date_create)) ?>
<?php echo form_close() ?>
<?php echo close_bootstrap(); ?>