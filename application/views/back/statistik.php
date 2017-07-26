<div class="container-widget">
<div class="row">
  <div class="col-md-12 col-lg-12">
    <div class="panel panel-widget">
      <div class="panel-title">
        Login Logout Plesk <span class="label label-warning"><?php echo count($login_time) ?></span>
        <ul class="panel-tools">
          <li><a class="icon search-tool"><i class="fa fa-search"></i></a></li>
          <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
          <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        </ul>
      </div>

      <div class="panel-search">
        <form>
          <input type="text" class="form-control" placeholder="Search...">
          <i class="fa fa-search icon"></i>
        </form>
      </div>


      <div class="panel-body table-responsive">

        <table class="table table-hover table-striped">
          <thead>
            <tr>
              
              <td>User ID</td>
              <td>User</td>
              <td>Login Time</td>
              <td>Logout Time</td>
              <td>Duration</td>
              <td>IP address</td>
              <td>Browser</td>
            </tr>
          </thead>
          <tbody>
            <?php if ($login_time <> 0): ?>
              <?php foreach ($login_time as $key => $value): ?>
                <tr>            
                  <td><b><?php echo $value->id_user ?></b></td>
                  <td><?php echo $value->email ?></td>
                  <td><?php echo $value->login_time ?></td>
                  <td><?php echo $value->logout_time ?></td>
                  <td><?php echo count_time(selisih_waktu($value->logout_time,$value->login_time)) ?></td>
                  <td><?php echo $value->ip_address ?></td>
                  <td><?php echo $value->browser ?></td>
                </tr>            
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-lg-12">
    <div class="panel panel-widget">
      <div class="panel-title">
        Stil Login <span class="label label-success"><?php echo count($still_login) ?> User(s)</span>
        <ul class="panel-tools">
          <li><a class="icon search-tool"><i class="fa fa-search"></i></a></li>
          <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
          <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        </ul>
      </div>

      <div class="panel-search">
        <form>
          <input type="text" class="form-control" placeholder="Search...">
          <i class="fa fa-search icon"></i>
        </form>
      </div>
      <div class="panel-body table-responsive">

        <table class="table table-hover table-striped">
          <thead>
            <tr>
              
              <td>Session ID</td>
              <td>User ID</td>
              <td>Login Time</td>              
              <td>Browser</td>
              <td>Ip address</td>
              <td>Kill</td>
            </tr>
          </thead>
          <tbody>
            <?php if ($still_login <> 0): ?>
              <?php foreach ($still_login as $key => $value): ?>
                <tr>            
                  <td><b><?php echo $value->id ?></b></td>
                  <td><?php echo $value->email ?></td>
                  <td><?php echo $value->timestamp ?></td>
                  <td><?php echo $value->browser ?></td>
                  <td><?php echo $value->ip_address ?></td>
                  <td><a href="<?= base_url() ?>preferences/kill/<?php echo $value->id ?>" class="btn-xs btn-danger">Kill</a></td>                  
                </tr>            
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
</div>