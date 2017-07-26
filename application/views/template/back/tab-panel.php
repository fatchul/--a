<div role="tabpanel" class="sidepanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#today" aria-controls="today" role="tab" data-toggle="tab">TODAY</a></li>
      <!-- <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">TASKS</a></li>
      <li role="presentation"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">CHAT</a></li> -->
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="today">

        <div class="sidepanel-m-title">
          Today          
        </div>

        <div class="gn-title">NEW</div>

        <ul class="list-w-title">
          
          <li>
            <a href="#">
              <span class="label label-danger">ORDER</span>
              <?php if ($data_order<>0){ $no=0; ?>
                <?php foreach ($data_order as $key => $value_order): $no++; ?>                  
                  <h4><?php echo $no ?>. Order No : <?php echo $value_order->id_order ?></h4>
                  <b><?php echo $value_order->name ?></b><br>Status: <?php echo $this->order->status_order($value_order->status) ?>
                <?php endforeach ?>
              <?php } ?>
            </a>
          </li>
          
          <li>
            <a href="">
              <span class="label label-success">DISCUSSIONS</span>
              <?php if ($review<>0){ $no=0; ?>
                <?php foreach ($review as $key => $rev): $no++; ?>                  
                  <h4><?php echo $no ?>. Product : <span onclick="open(<?php echo $rev->id_product ?>)"><?php echo $rev->product_name ?></span></h4>
                  <b><?php echo $rev->name ?></b><br>Message: <?php echo $rev->comments ?>
                <?php endforeach ?>
              <?php } ?>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="label label-info">UNIQUE VISIT </span>&nbsp<span class="label label-danger"><?php echo $viewer ?></span><br>
              <?php if ($list_viewer<>0){ $no=0; ?>
              <?php foreach ($list_viewer as $key => $list): $no++; ?>                                    
                  <b><?php echo $list->value ?></b> view <span onclick="open(<?php echo $list->id_product ?>)"><b><?php echo $list->product_name ?></b></span> using <?php echo $list->browser ?> at <?php echo dates($list->date_modified) ?><br>
                <?php endforeach ?>
              <?php } ?>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="label label-warning">WISHLIST TODAY</span>
              <?php if ($wishlist<>0){ $no=0; ?>
                
                <?php foreach ($wishlist as $key => $wish): $no++; ?>                  
                  <h4><?php echo $no ?>. Product : <span onclick="open(<?php echo $wish->id_product ?>)"><?php echo $wish->product_name ?></span></h4>
                    <?php echo dates($wish->times) ?>
                <?php endforeach ?>
              <?php } ?>
            </a>
          </li>
        </ul>

      </div>
      <!-- End Today -->

      <!-- Start Tasks -->
      <div role="tabpanel" class="tab-pane" id="tasks">

        <div class="sidepanel-m-title">
          To-do List
          <span class="left-icon"><a href="#"><i class="fa fa-pencil"></i></a></span>
          <span class="right-icon"><a href="#"><i class="fa fa-trash"></i></a></span>
        </div>

        <div class="gn-title">TODAY</div>

        <ul class="todo-list">
          <li class="checkbox checkbox-primary">
            <input id="checkboxside1" type="checkbox"><label for="checkboxside1">Add new products</label>
          </li>

          <li class="checkbox checkbox-primary">
            <input id="checkboxside2" type="checkbox"><label for="checkboxside2"><b>May 12, 6:30 pm</b> Meeting with Team</label>
          </li>

          <li class="checkbox checkbox-warning">
            <input id="checkboxside3" type="checkbox"><label for="checkboxside3">Design Facebook page</label>
          </li>

          <li class="checkbox checkbox-info">
            <input id="checkboxside4" type="checkbox"><label for="checkboxside4">Send Invoice to customers</label>
          </li>

          <li class="checkbox checkbox-danger">
            <input id="checkboxside5" type="checkbox"><label for="checkboxside5">Meeting with developer team</label>
          </li>
        </ul>

        <div class="gn-title">TOMORROW</div>
        <ul class="todo-list">
          <li class="checkbox checkbox-warning">
            <input id="checkboxside6" type="checkbox"><label for="checkboxside6">Redesign our company blog</label>
          </li>

          <li class="checkbox checkbox-success">
            <input id="checkboxside7" type="checkbox"><label for="checkboxside7">Finish client work</label>
          </li>

          <li class="checkbox checkbox-info">
            <input id="checkboxside8" type="checkbox"><label for="checkboxside8">Call Johnny from Developer Team</label>
          </li>

        </ul>
      </div>    
      <!-- End Tasks -->

      <!-- Start Chat -->
      <div role="tabpanel" class="tab-pane" id="chat">

        <div class="sidepanel-m-title">
          Friend List
          <span class="left-icon"><a href="#"><i class="fa fa-pencil"></i></a></span>
          <span class="right-icon"><a href="#"><i class="fa fa-trash"></i></a></span>
        </div>

        <div class="gn-title">ONLINE MEMBERS (3)</div>
        <ul class="group">
          <li class="member"><a href="#"><img src="<?= base_url(); ?>assets/back/img/profileimg.png" alt="img"><b>Allice Mingham</b>Los Angeles</a><span class="status online"></span></li>
          <li class="member"><a href="#"><img src="<?= base_url(); ?>assets/back/img/profileimg2.png" alt="img"><b>James Throwing</b>Las Vegas</a><span class="status busy"></span></li>
          <li class="member"><a href="#"><img src="<?= base_url(); ?>assets/back/img/profileimg3.png" alt="img"><b>Fred Stonefield</b>New York</a><span class="status away"></span></li>
          <li class="member"><a href="#"><img src="<?= base_url(); ?>assets/back/img/profileimg4.png" alt="img"><b>Chris M. Johnson</b>California</a><span class="status online"></span></li>
        </ul>

        <div class="gn-title">OFFLINE MEMBERS (8)</div>
        <ul class="group">
          <li class="member"><a href="#"><img src="img/profileimg5.png" alt="img"><b>Allice Mingham</b>Los Angeles</a><span class="status offline"></span></li>
          <li class="member"><a href="#"><img src="img/profileimg6.png" alt="img"><b>James Throwing</b>Las Vegas</a><span class="status offline"></span></li>
        </ul>

        <form class="search">
          <input type="text" class="form-control" placeholder="Search a Friend...">
        </form>
      </div>
      <!-- End Chat -->

    </div>

  </div>

  <script type="text/javascript">
    function open(id) {
      alert('is');
    }
  </script>