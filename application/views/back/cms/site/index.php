<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
?>
<div class="container-default">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-body">
          <?php echo form_open('admin/cms/site/save',"class='form-horizontal'") ?>
          <?php foreach ($list_sosmed as $key => $value): ?>
            <?php if ($value->type=='text'){ ?>
                <div class="form-group">
              <label for="exampleInputAmount2" class="col-sm-2 control-label form-label"><?php echo $value->sosmed ?></label>
              <div class="col-sm-5">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa <?php echo $value->favicon ?>"></i></div>
                  <input type="hidden" name="id[<?php echo $value->id ?>]" value="<?php echo $value->id ?>">
                  <input type="text" class="form-control" id="exampleInputAmount2"  name="about[<?php echo $value->id ?>]" value="<?php echo $value->the_value_is ?>">
                </div>
              </div>
              <div class="col-sm-1">as</div>
              <div class="col-sm-2">
                <input type="text" class="form-control form-control-line" name="tag[<?php echo $value->id ?>]" value="<?php echo $value->as_a ?>">
              </div>
              <div class="col-sm-1">
                <?php if ($value->shows==='1'): ?>
                  <input type="checkbox" name="show[<?php echo $value->id ?>]" title="Show on a Web" value="1" checked>  
                <?php else: ?>
                  <input type="checkbox" name="show[<?php echo $value->id ?>]" title="Show on a Web" value="1">  
                <?php endif ?>
                
              </div>
            </div>  
            <?php } ?>
            <?php if ($value->type=='textarea'){ ?>
              <div class="form-group">
              <label for="exampleInputAmount2" class="col-sm-2 control-label form-label"><?php echo $value->sosmed ?></label>
              <div class="col-sm-5">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa <?php echo $value->favicon ?>"></i></div>
                  <input type="hidden" name="id[<?php echo $value->id ?>]" value="<?php echo $value->id ?>">
                  <textarea class="form-control" name="about[<?php echo $value->id ?>]"><?php echo $value->the_value_is ?></textarea>
                </div>
              </div>
              
            </div>  
            <?php } ?>
              
          <?php endforeach ?>
          

         


          <div class="form-group">
            <label class="col-sm-2 control-label form-label"></label>
            <div class="col-sm-5">
              <input type="submit" name="btn-save" class="btn btn-default" value="Save">
            </div>
          </div>

        </form>

      </div>

    </div>
  </div>

</div>
</div>
