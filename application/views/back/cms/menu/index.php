<style type="text/css">
  .list-group.panel > .list-group-item {
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px
  }
  .list-group-submenu {
    margin-left:20px;
  }
</style>
<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
?>
<div class="container-default">
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-title">
          Arrange Your Menu  
        </div>

        <div class="panel-body">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default panel-collapse">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-home"></i> Halaman & Kategori
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <div role="tabpanel">
                    <ul class="nav nav-pills" role="tablist">
                      <li role="presentation" class="active"><a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">Halaman</a></li>
                      <li role="presentation"><a href="#profile2" aria-controls="profile2" role="tab" data-toggle="tab">Kategori</a></li>
                      
                    </ul>
                    <?php echo form_open('admin/cms/menu/add_to_menu') ?>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home2">
                          <a href="<?php echo base_url('admin/cms/page/tambah?get=page') ?>" target="_blank">Tambah</a>
                          <?php if ($pages <> 0): ?>
                            <?php foreach ($pages as $key => $value): ?>
                              <div class="checkbox">
                                <input id="checkbox<?php echo $value->id ?>" type="checkbox" value="<?php echo $value->id ?>" name="page[]">
                                <label for="checkbox<?php echo $value->id ?>">
                                  <?php echo $value->title ?>
                                </label>
                              </div>
                            <?php endforeach ?>
                          <?php endif ?>
                          <input type="submit" name="btn-pages" value="Add to menu" class="btn btn-xs btn-purple">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile2">
                          <a href="<?php echo base_url('admin/cms/page/tambah') ?>" target="_blank">Tambah</a>
                          <?php if ($categori <> 0): ?>
                            <?php foreach ($categori as $key => $value): ?>
                              <div class="checkbox">
                                <input id="checkbox<?php echo $value->id ?>" type="checkbox" value="<?php echo $value->id ?>" name="category[]">
                                <label for="checkbox<?php echo $value->id ?>">
                                  <?php echo $value->title ?>
                                </label>
                              </div>
                            <?php endforeach ?>
                          <?php endif ?>
                          <input type="submit" name="btn-category" value="Add to menu" class="btn btn-xs btn-purple">
                        </div>

                      </div>

                    </form>
                  </div>    
                </div>
              </div>
            </div>
            
          </div>

        </div>
      </div>



    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-title">
          Menu
        </div>

        <div class="panel-body">

          <ul>
            <?php echo form_open('admin/cms/menu/save') ?>
            <?php if ($menu<>0): ?>
              <?php foreach ($menu as $key => $value): ?>
                <?php 
                  $from=$value->table_from;
                  $id_m=$value->id_menu;
                  $id=$value->id;
                  $page_title=$value->title;
                  
                ?>
                <li>
                 <?php echo $page_title ?> 
                  Set as 
                  <select class="menu_main" id="menu_main<?php echo $id ?>" name="main[<?php echo $id ?>]">
                    <option value="0-<?php echo $value->id_menu ?>">Main Menu</option>
                    <option value="1-<?php echo $value->id_menu ?>" id="c1">Child 1</option>
                  </select>
                  <select class="child_menu" id="child_1<?php echo $id ?>" style="display: none" name="parent_c1[<?php echo $id ?>]">
                    <option value="0">--Select Parent--</option>
                    
                      <?php if ($p_0 <> 0): ?>
                        <?php foreach ($p_0 as $key => $value): ?>
                          <?php 
                            $title=$value->title;
                            
                          ?>
                          <option value="<?php echo $value->id_menu ?>"><?php echo $title ?></option>
                        <?php endforeach ?>
                      <?php endif ?>
                  </select>
                  <a href="<?php echo site_url('pages/delete_list/'.$id_m.'') ?>">Delete</a>
                  <select class="grand_child_menu" id="child_2<?php echo $id ?>" style="display: none" name="parent[<?php echo $id ?>]">
                    <option value="0">--Select Grand Parent--</option>
                      <?php if ($p_1 <> 0): ?>
                        <?php foreach ($p_1 as $key => $value): ?>
                          <?php 
                            if ($value->table_from==='page') {
                              $title=$value->page_title;
                            }
                            elseif ($value->table_from==='tag') {
                              $title=$value->type_name;
                            }
                          ?>
                          <option value="<?php echo $value->id_menu ?>"><?php echo $title ?></option>
                        <?php endforeach ?>
                      <?php endif ?>
                  </select>
                </li>

              <?php endforeach ?>

            </ul>
            <input type="submit" name="save-menu" value="Save">
          </form>    
        <?php endif ?>

        <div class="list-group panel">
        
        <?php if ($main<>0): ?>
          <?php foreach ($main as $key => $first):           
                
                $carret="";
                if ($this->menu->has_child_1($first->id_menu,1,1)){
                  $carret=" <i class='fa fa-caret-down'></i>";
                }
                $title=$first->title;
              ?>
              <a href="#demo<?= $first->id_menu ?> " class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu" id ="rows<?php echo $first->id_menu ?>"><b><?php echo $title ?></b> &nbsp<span onclick="edit_menu(<?php echo $first->id_menu ?>)" class="btn btn-xs btn-primary">&nbsp<i class='fa fa-pencil'></i></span>&nbsp<span onclick="hapus_menu(<?php echo $first->id_menu ?>)" class="btn btn-xs btn-danger">&nbsp<i class='fa fa-trash'></i></span><?php echo $carret ?></a>
                <div class="collapse" id="demo<?= $first->id_menu?>">
                  <?php if ($this->menu->has_child_1($first->id_menu,1,1)<>0): ?>
                    <?php if ($this->menu->list_childs(1,$first->id_menu,1)<>0){ ?>
                    <?php foreach ($this->menu->list_childs(1,$first->id_menu,1) as $key => $vchild){ 
                        $carret="";
                        $ctitle="&nbsp&nbsp&nbsp ".$vchild->title;
                      ?>

                    <a href="#SubMenu<?= $vchild->id_menu ?>" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu<?= $vchild->id_menu ?>"  style="padding-left:15px"><?php echo $ctitle ?>

                    &nbsp<span onclick="edit_menu(<?php echo $vchild->id_menu ?>)" class=" btn-xs btn-warning">&nbsp<i class='fa fa-pencil'></i></span>&nbsp<span onclick="hapus_menu(<?php echo $vchild->id_menu ?>)" class=" btn-xs btn-danger">&nbsp<i class='fa fa-trash'></i>

                    <?php echo $carret ?></a>

                    <?php if ($this->menu->has_child_1($vchild->id_menu,2,1)): ?>
                      <div class="collapse list-group-submenu" id="SubMenu<?= $vchild->id_menu ?>">
                        <?php foreach ($this->menu->list_childs(2,$vchild->id_menu,1) as $key => $vgrandchild){ ?>
                        <?php 
                          if ($vgrandchild->table_from==='page') {
                            $gctitle=$vgrandchild->page_title;
                          }
                          elseif ($vgrandchild->table_from==='tag') {
                            $gctitle=$vgrandchild->type_name;
                          }
                        ?>
                        <a href="#" class="list-group-item" data-parent="#SubMenu<?= $vchild->id_menu ?>"><?php echo $gctitle ?> 

                          &nbsp<span onclick="edit_menu(<?php echo $vgrandchild->id_menu ?>)" class="btn btn-xs btn-primary">&nbsp<i class='fa fa-pencil'></i></span>&nbsp<span onclick="hapus_menu(<?php echo $vgrandchild->id_menu ?>)" class="btn btn-xs btn-danger">&nbsp<i class='fa fa-trash'></i>

                        </a>                       
                        <?php } ?>
                      </div>
                      <?php endif ?>
                    <?php } ?>
                    <?php } ?>
                  <?php endif ?>
                </div>  
                
              <?php endforeach ?>
            <?php endif ?>
            </div>
          </div>
        </div>

      </div>
      <?php //$this->load->view('admin/template/modal') ?>
      <script type="text/javascript">
        $(document).ready(function() {
          $(".menu_main").change(function() {

            if (this.value.substr(0,1) == "1") {
              $(this).siblings(".child_menu").show();
              $(this).siblings(".grand_child_menu").hide();
            }
            else if (this.value.substr(0,1) == "2") {
              $(this).siblings(".child_menu").hide();
              $(this).siblings(".grand_child_menu").show();
            }
            else {
              $(this).siblings(".child_menu").hide();
              $(this).siblings(".grand_child_menu").hide();
            }
          }).change();
        });
        function edit_menu(id){
          var post_data = {
              'id': id,
              '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
          };

          $.ajax({
            url : "<?php echo site_url('pages/edit_menu')?>/"+id,
            data: post_data,
            type: "POST",
            dataType: "json",
            success: function(data)
            {
              $('#modal_overview').html(data);
              $('#modal-form').modal('show');                
            },
            error: function (xhr, textStatus, errorThrown)
            {
              alert(xhr.responseText);
            }
          });
        }
        function hapus_menu(id){
           if(confirm('Are you sure delete this data?')){
            $.ajax({
              url : "<?php echo site_url('pages/delete_menu')?>/"+id,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                $('#notif').modal('show');
                $('#rows'+id).css('text-decoration','line-through');               
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error deleting data');
              }
            });
          }
        }
      </script>