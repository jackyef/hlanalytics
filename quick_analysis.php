<?php
	
	include('/templates/header.php');
	include('/templates/sidebar.php');
	include('/templates/top-nav.php');
	
?>

      <!-- page content -->
	  
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
				<h3>
                    Quick Analysis - Indonesia News
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                <small>
                    <?php if(!isset($_GET['startDate'])){ 
						echo "(from the past 7 days)";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};?>
                </small>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
		  <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
						<a class="fb-like" data-href="http://headlineanalytics.azurewebsites.net" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
						</a>&nbsp;
						<a class="twitter-share-button"
						  href="https://twitter.com/intent/tweet?text=Find%20interesting%20data%20about%20news%20headlines!">
						  </a>
						<a class="g-plusone" data-size="medium" data-href="http://headlineanalytics.azurewebsites.net">
						</a>
			</div>
		  </div>
          <div class="clearfix"></div>
          <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Top 10 Keywords<small>click on the bars for more information</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <canvas id="mybarChart"></canvas>
                </div>
              </div>
            </div>
          
		  <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Sources <small>click on the pie chart for more information</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
          </div>
		  
          <div class="clearfix"></div>
		  <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Top 10 2-Words Phrases<small>click in chart for more information</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <canvas id="mybarChart2"></canvas>
                </div>
              </div>
            </div>
			<div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
				<div class="x_title">
				<h2>Summary and More</h2>
				
                  <div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div id="top-3-words"></div>
					<div id="top-3-2-phrases"></div>
					<div id="top-2-3-phrases"></div>
					<br>
					<a href="detailed_statistics.php
						<?php if(!isset($_GET['startDate'])){ 
						echo "";
						} else {
						echo '?startDate='.$_GET['startDate'] . '&endDate='.$_GET['endDate'];
						};?>" >Click here for more detailed information.</a> <br/><br/>
					Or, you can also generate data for your own preferred period of time: <br>
					<form action="quick_analysis.php" method="GET">
						From 
						<input required type="text" placeholder="Pick a date" id="example1" name="startDate" 
						value="<?php if(!isset($_GET['startDate'])){ 
							echo date('d-m-Y', strtotime('-7 days'));
							} else {
							echo ($_GET['startDate']);
							};?>">
						to 
						<input required type="text" placeholder="Pick a date" id="example2" name="endDate"
						value="<?php if(!isset($_GET['endDate'])){ 
							echo date('d-m-Y');
							} else {
							echo ($_GET['endDate']);
							};?>"> 
						<input type="submit" value="Generate"/>
					</form>
				</div>
              </div>
            </div>
        </div>
		<div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Top 10 3-Words Phrases<small>click in chart for more information</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
					<li><a class=""><i class="fa"></i></a>
                    </li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <canvas id="mybarChart3"></canvas>
                </div>
              </div>
            </div>
		</div>	
        <?php include('templates/footer.php'); ?>

  

  <script src="js/bootstrap.min.js"></script>
  <script src="js/moment/moment.min.js"></script>
  <script src="js/chartjs/chart.min.js"></script>
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/pace/pace.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <?php include('/functions/get_analysis_data.php'); ?>
  <?php include('/functions/get_source_data.php'); ?>
  <script>
    //Chart.defaults.global.legend = {
    //  enabled: true
    //};
	<?php
		$startDate = null;
		$endDate = null;
		if(isset($_GET['startDate'])){ 
					$startDate = date('Y-m-d', strtotime($_GET['startDate']));
				};
		if(isset($_GET['endDate'])){ 
					$endDate = date('Y-m-d', strtotime($_GET['endDate']));
				};
	?>
    // Bar chart
	var json = <?php get_analysis_data($startDate, $endDate, null, 10); ?>;
				
	var data_term = json.term;
	var data_count = json.count;
	
    var ctx = document.getElementById("mybarChart");
    var mybarChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: data_term,
        datasets: [{
          label: '# of occurences',
          backgroundColor: "#26B99A",
          data: data_count
        }]
      },

      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
	//top 3 words
    var ctx = document.getElementById("top-3-words");
	ctx.innerHTML = "It looks like the media have been mentioning the words <b>'" + json.term[0] + "'</b>, <b>'"+json.term[1]+"'</b>, and <b>'" +json.term[2] +"'</b> a lot in this period of time!";

    // Pie chart
	var json = <?php get_source_data($startDate, $endDate, 20); ?>;
	var data_term = json.term;
	var data_count = json.count;
	var data_term2 = new Array();
	var total = 0;
		for(i = 0; i < json.term.length; i++){
			total += data_count[i];
		}
		for(i = 0; i < json.term.length; i++){
			data_term2[i] = json.term[i] + " (" +(json.count[i]/total*100).toFixed(1).toString()+"%)";
		}
    var ctx = document.getElementById("pieChart");
    var data = {
      datasets: [{
        data: data_count,
        backgroundColor: [
          "#455C73",
          "#9B59B6",
          "#BDC3C7",
          "#26B99A",
          "#3498DB",
          "#949853",
          "#539453",
          "#945353"
        ],
        label: data_term2 // for legend
      }],
      labels: data_term2
    };

    var pieChart = new Chart(ctx, {
      data: data,
      type: 'pie',
      otpions: {
        legend: false
      }
    });

	// Bar chart2
	var json = <?php get_analysis_data($startDate, $endDate, 2, 10); ?>;
	var data_term = json.term;
	var data_count = json.count;
	
    var ctx = document.getElementById("mybarChart2");
    var mybarChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: data_term,
        datasets: [{
          label: '# of occurences',
          backgroundColor: "#26B99A",
          data: data_count
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
	
	var ctx = document.getElementById("top-3-2-phrases");
	ctx.innerHTML = "They also have been all over about <b>'" + json.term[0] + "'</b>, <b>'"+json.term[1]+"'</b>, and <b>'" +json.term[2] +"'</b>!";

	
	 // Bar chart3
	var json = <?php get_analysis_data($startDate, $endDate, 3, 10); ?>;
	var data_term = json.term;
	var data_count = json.count;
	
    var ctx = document.getElementById("mybarChart3");
    var mybarChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: data_term,
        datasets: [{
          label: '# of occurences',
          backgroundColor: "#26B99A",
          data: data_count
        }]
      },
	  options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
		//top 3 word phrases
	var ctx = document.getElementById("top-2-3-phrases");
	ctx.innerHTML = "The topics <b>'" + json.term[0] + "'</b> and <b>'" +json.term[1] +"'</b> seem to be quite popular, too.";

	// When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd-mm-yyyy"
                });  
				$('#example2').datepicker({
                    format: "dd-mm-yyyy"
                });  
            
            });
			
  </script>

</body>

</html>
