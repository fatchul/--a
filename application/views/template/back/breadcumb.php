
<div class="page-header">
      <h1 class="title"><?php echo ucwords($this->uri->segment(1)) ?></h1>
      <?php echo $this->breadcrumbs->show();?>      
      <div class="right">
        <div class="btn-group" role="group" aria-label="...">
          <a href="<?= base_url() ?>dashboard" class="btn btn-light">Dashboard</a>          
          <!-- <button class="btn btn-light" id="refresh"><i class="fa fa-refresh"></i></button>
          <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a> -->
      
        </div>
      </div>
    </div>

   