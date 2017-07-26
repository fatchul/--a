<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
<?php echo t_static('Judul ',$res[0]->title_silabus) ?>
<?php echo t_static('Kesimpulan ',$res[0]->summary_silabus) ?>
<?php echo t_static('Konten',$res[0]->content_silabus) ?>
<?php echo t_static('Tanggal Publish',dates($res[0]->last_update)) ?>

<?php echo t_static('Keterangan',active($res[0]->is_publish)) ?>

<hr>
<?php echo t_static('Jumlah Enrollment',$this->enroll->total_enrollment($res[0]->id_silabus)." User") ?>
<hr>

<?php //echo t_static('Jumlah Sub Materi',"10 Materi") ?>
</form>
<?php echo close_bootstrap(); ?>

