
<script>
	(function(w,d,s,g,js,fs){
		g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
		js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
		js.src='https://apis.google.com/js/platform.js';
		fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
	}(window,document,'script'));
</script>
<script>

gapi.analytics.ready(function() {

  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '202777923432-i3po3l44mo4t39gvqnpccrv2brjf7urk.apps.googleusercontent.com'
  });
  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector-container'
  });
  viewSelector.execute();
  var dataChart = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-container',
      type: 'LINE',
      options: {
        width: '100%'
      }
    }
  });
  viewSelector.on('change', function(ids) {
    dataChart.set({query: {ids: ids}}).execute();
  });

});
</script>


<script>

gapi.analytics.ready(function() {
  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '202777923432-i3po3l44mo4t39gvqnpccrv2brjf7urk.apps.googleusercontent.com'
  });
  var viewSelector1 = new gapi.analytics.ViewSelector({
    container: 'view-selector-1-container'
  });
  var viewSelector2 = new gapi.analytics.ViewSelector({
    container: 'view-selector-2-container'
  });
  viewSelector1.execute();
  //viewSelector2.execute();
  var dataChart1 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:country',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 6,
      sort: '-ga:sessions'
    },
    chart: {
      container: 'chart-1-container',
      type: 'PIE',
      options: {
        width: '100%',
        pieHole: 4/9
      }
    }
  });

  var dataChart2 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:country',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 6,
      sort: '-ga:sessions'
    },
    chart: {
      container: 'chart-2-container',
      type: 'PIE',
      options: {
        width: '100%',
        pieHole: 4/9
      }
    }
  });

  viewSelector1.on('change', function(ids) {
    dataChart1.set({query: {ids: ids}}).execute();
  });

  viewSelector2.on('change', function(ids) {
    dataChart2.set({query: {ids: ids}}).execute();
  });

});
</script>

<script type="text/javascript">
	gapi.analytics.ready(function() {
	  gapi.analytics.auth.authorize({
	    container: 'embed-api-auth-container',
	    clientid: '202777923432-i3po3l44mo4t39gvqnpccrv2brjf7urk.apps.googleusercontent.com'
	  });
	  gapi.analytics.createComponent('MyComponent', {
		  execute: function() {
		    alert('I have been executed!');
		  }
		});
	  var myComponentInstance = new gapi.analytics.ext.MyComponent();
	  //myComponentInstance.execute();
    });

</script>

<style type="text/css">
  #ga_chart_container {
    width: 100%; 
    text-align: center; 
    height: auto; 
    float:left; 
    margin:0 auto; 
    margin-bottom:20px
  }

  #ga_chart_container #ga-chart {
    width: 900px; 
    height: 500px; 
    margin:0 auto;
  }
</style>
<div class="container-widget">

  <!-- Start Top Stats -->
  <div class="col-md-12">
    <ul class="topstats clearfix">
      <li class="arrow"></li>
      <li class="col-xs-6 col-lg-2">
        <span class="title"><i class="fa fa-dot-circle-o"></i> <a href="<?php echo site_url('admin/cms/post') ?>">Artikel</a></span>
        <h3><?php echo $artikel ?></h3>

      </li>
      <li class="col-xs-6 col-lg-2">
        <span class="title"><i class="fa fa-calendar-o"></i><a href="<?php echo site_url('course') ?>">Course</a></span>
        <h3><?php echo $course ?></h3>

      </li>
      <li class="col-xs-6 col-lg-2">
        <span class="title"><i class="fa fa-shopping-cart"></i> <a href="<?php echo site_url('admin/silabus') ?>">Silabus</a></span>
        <h3><?php echo $silabus ?></h3>
      </li>
      <li class="col-xs-6 col-lg-2">
        <span class="title"><i class="fa fa-users"></i><a href="<?php echo site_url('admin/school') ?>"> Sekolah</a></span>
        <h3><?php echo $school ?></h3>
      </li>
      <li class="col-xs-6 col-lg-2">
        <span class="title"><i class="fa fa-eye"></i><a href="">Guru</a></span>
        <h3 class="color-up"><?php echo $guru ?></h3>

      </li>
      <li class="col-xs-6 col-lg-2">
        <span class="title"><i class="fa fa-clock-o"></i><a href="">Murid</a></span>
        <h3 class="color-down"><?php echo $siswa ?></h3>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12 col-lg-12">
    <div class="panel panel-widget">
      <div class="panel-title">
        Course Favourite
        <ul class="panel-tools panel-tools-hover">
          <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
          <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
          <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <table id="example0" class="table display">
          <thead>
            <tr class="text-center">
              <th>Course</th>
              <th>Date Create</th>
              <th>Enroll Count</th>
              <th>Total Silabus</th>              
              <th>Silabus | Total Enroll | AVG Time</th>                            
            </tr>
          </thead>
          <tbody>
           <?php if ($course_fav<>0){ $no=0; ?>
          <?php foreach ($course_fav as $key => $value){ $no++; ?>
                <?php 
                  $id = $value->id_course;
                  $silabus=$this->silabus->get_all_order_with('no_urut','ASC','id_course',$id);
                ?>
                <tr>
                  <td><?php echo $value->title ?></td>
                  <td><?php echo $value->last_update ?></td>
                  <td ><span class='btn-xs btn-success' onclick="enroll('<?php echo $id ?>')"><?php echo $value->total_enroll ?> User </span></td>
                  <td><?php echo $this->silabus->total_silabus($value->id_course) ?> Silabus</td>    
                  <td>
                    <?php                       
                      foreach ($silabus as $key => $syl) {
                        $id_silabus=$syl->id_silabus;
                        echo "<span class='btn-xs btn-primary'>#".$syl->no_urut." ".$syl->title_silabus."</span> | <span class='btn-xs btn-success' onclick=enroll('".$id_silabus."')>".$this->enroll->total_enrollment($id_silabus)." User </span>&nbsp| <span class='btn btn-xs btn-warning'>".count_time($this->enroll->avg_time_finish($id_silabus))."</span>";
                        echo "<br>";
                      }
                    ?>
                  </td>              
                </tr>   
              <?php } ?>
            <?php } ?>
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
        Visitor {<a href="https://analytics.google.com/analytics/web/#report/defaultid/a99836325w146590540p151366630/" target="_blank" style="color: blue">google analytic</a>}
        <ul class="panel-tools panel-tools-hover">
          <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
          <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
          <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        </ul>
      </div>
      <div class="panel-body">
      	<div id="embed-api-auth-container"></div>
		<div id="chart-container"></div>
		<div id="view-selector-container"></div>
      </div>
    </div>
  </div>
  </div>
  

  <div class="row">
  <div class="col-md-12 col-lg-5">
    <div class="panel panel-widget">
      <div class="panel-title">
        Visitor By Country {Last 30 days}
        <ul class="panel-tools panel-tools-hover">
          <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
          <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
          <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        </ul>
      </div>
      <div class="panel-body">
      	<div id="chart-1-container"></div>
		<div id="chart-2-container"></div>
		<div id="view-selector-1-container"></div>
		<div id="view-selector-2-container"></div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-lg-7">
    <div class="panel panel-widget">
      <div class="panel-title">
        Last Login (User)
        <ul class="panel-tools panel-tools-hover">
          <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
          <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
          <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <table id="example0" class="table display">
          <thead>
            <tr class="text-center">
              <th>Email</th>
              <th>Nama</th>
              <th>Role</th>
              <th>Login Time</th>
            </tr>
          </thead>
          <tbody>
           <?php if ($last_login<>0){ $no=0; ?>
          <?php foreach ($last_login as $key => $value){ $no++; ?>
                <tr>
                  <td><?php echo $value->email ?></td>
                  <td><?php echo $value->nama ?></td>
                  <td><?php echo role($value->role) ?></td>
                  <td><?php echo $value->last_login ?></td>                  
                </tr>   
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-lg-6">
    <div class="panel panel-widget">
      <div class="panel-title">
        Last Login (School)
        <ul class="panel-tools panel-tools-hover">
          <li><a class="icon"><i class="fa fa-refresh"></i></a></li>
          <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
          <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
          <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <table id="example0" class="table display">
          <thead>
            <tr class="text-center">
              <th>Email</th>
              <th>Nama</th>
              <th>Login Time</th>
            </tr>
          </thead>
          <tbody>
           <?php if ($last_login_school<>0){ $no=0; ?>
          <?php foreach ($last_login_school as $key => $value){ $no++; ?>
                <tr>
                  <td><?php echo $value->email ?></td>
                  <td><?php echo $value->school_name ?></td>
                  <td><?php echo $value->last_login ?></td>                  
                </tr>   
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  </div>

  
<?php $this->load->view('template/back/modal') ?>
<?php echo close_bootstrap() ?>
<script>
	$(document).ready(function() {
		$('#example0').DataTable();
	} );
	function enroll(id){
		 $.ajax({
	        url : "<?php echo site_url('admin/course/see_enroll')?>/"+id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data){
	         	$('#modal_overview').html(data);
        		$('#modal-form').modal('show'); 
	        },error: function (jqXHR, textStatus, errorThrown){
	          alert('Error');
	        }
	      });
	}
 
</script>