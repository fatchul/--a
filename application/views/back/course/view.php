<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
<?php echo t_static('Judul ',$res[0]->title) ?>
<?php echo t_static('Kesimpulan ',$res[0]->summary) ?>
<?php echo t_static('Penjabaran',$res[0]->content) ?>
<?php echo t_static('Tanggal Publish',dates($res[0]->last_update)) ?>
<?php echo t_static('Durasi',$res[0]->duration) ?>
<?php echo t_static('Keterangan',active($res[0]->is_publish)) ?>
<?php echo t_static('Meta',$res[0]->meta) ?>
<hr>
<?php echo t_static('Jumlah Enrollment',$this->enroll->total_enrollment($res[0]->id_course)." User") ?>
<hr>
<div class="form-group">
	<label class="col-sm-2 control-label form-label">Media(s)<br>                        
	</label>
	<div class="col-sm-10">
		<?php $get_media=$this->galeri_course->retrieve_all_media($res[0]->id_course) ?>
			<?php if ($get_media<>0) { ?>
				<?php foreach ($get_media as $key => $value): ?>
					<div class="col-md-4 column productbox">
					    <img src="<?= base_url()."".$value->directory."/".$value->enc_name ?>" class="img-media">
					    <div class="producttitle"><?php echo $value->mime ?></div>
					    <div class="productprice"><div class="pull-right"></div>
						    <div class="pricetext">
						    	<?php if ($value->owner=='T'){ ?>
						    		<span class="btn btn-xs btn-primary">Thumbnail</span>
						    	<?php } else { ?>
						    		&nbsp
						    	<?php } ?>
						    </div>
					    </div>
					</div>
				<?php endforeach ?>
			<?php } ?>
	</div>
</div>
<?php //echo t_static('Jumlah Sub Materi',"10 Materi") ?>
</form>
<?php echo close_bootstrap(); ?>

