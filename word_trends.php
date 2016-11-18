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
                    Word Trends - Indonesia News
                </h3>
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
              <div class="x_panel">
				<form action="word_trends.php" method="GET">
					<input required type="text" name="keyword" placeholder="enter a keyword" value="<?php if(isset($_GET['keyword'])) echo $_GET['keyword']; ?>" />
					from 
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
            <div class="clearfix"></div>
			<div class="row">
            <div class="col-md-7 col-sm-7 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>
				  <?php if(isset($_GET['keyword'])){
					echo "Trend of '".$_GET['keyword']."'";
					echo "<small>";
					echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
					echo "</small>";
				  } else {
					echo "You haven't entered any keyword yet.";
				  }?>
				  </h2>
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
                  <canvas id="lineChart"></canvas>
                </div>
              </div>
            </div>
			<div class="col-md-5 col-sm-5 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Associated Terms<small> </small></h2>
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
                <div class="x_content" >
                  <p class="text-muted font-13 m-b-30">
				  <?php if(isset($_GET['keyword'])){ ?>
                    Below are the terms that are most frequently associated with '<?php echo $_GET['keyword']; ?>' <?php if(!isset($_GET['startDate'])){ 
						echo "<b>from the past 7 days";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};
						
						echo "</b>."?>
                  <?php } else { ?>
						You haven't entered any keyword yet.
				  <?php } ?>
				  </p>
				  
                  <table id="datatable8" class="table table-striped table-bordered">
                    
                  </table>
                </div>
              </div>
            </div> 
		</div>
          <div class="clearfix"></div>
		  <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>News Headlines Table<small> </small></h2>
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
                <div class="x_content" >
                  <p class="text-muted font-13 m-b-30">
				  <?php if(isset($_GET['keyword'])){ ?>
                    Below are the news headlines that contains '<?php echo $_GET['keyword']; ?>' <?php if(!isset($_GET['startDate'])){ 
						echo "<b>from the past 7 days";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};
						
						echo "</b>."?>
						Click on the headline to see the news. 
						You can also search for a keyword using the search field!
                  <?php } else { ?>
						You haven't entered any keyword yet.
				  <?php } ?>
				  </p>
				  
                  <table id="datatable7" class="table table-striped table-bordered">
                    
                  </table>
                </div>
              </div>
            </div>  
		  </div>
		<div class="clearfix"></div>
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
  
   <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>
  <?php include('/functions/get_analysis_data.php'); ?>
  <?php include('/functions/get_source_data.php'); ?>
  <?php include('/functions/get_headlines.php'); ?>
  <script>
    //Chart.defaults.global.legend = {
    //  enabled: true
    //};
	<?php
		$keyword = null;
		$startDate = null;
		$endDate = null;
		if(isset($_GET['keyword'])){ 
					$keyword = $_GET['keyword'];
				};
		if(isset($_GET['startDate'])){ 
					$startDate = date('Y-m-d', strtotime($_GET['startDate']));
				};
		if(isset($_GET['endDate'])){ 
					$endDate = date('Y-m-d', strtotime($_GET['endDate']));
				};
	?>
    // Line chart
	<?php if($keyword != null){ ?>
	var json = <?php get_trend_data($keyword, $startDate, $endDate); ?>;
	var data_count = json.count;
	var data_date = new Array();
	var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
					"Aug", "Sep", "Oct", "Nov", "Dec"];
	for(i = 0; i<json.date.length ; i++){
		var originalDate = new Date(json.date[i]);
		var date = originalDate.getDate();
		var monthIndex = originalDate.getMonth();
		var year = originalDate.getFullYear();
		data_date[i] = date + ' ' + monthNames[monthIndex] + ' ' + year;
	}
	
    var ctx = document.getElementById("lineChart");
    var lineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: data_date,
        datasets: [{
          label: "Occurences",
          backgroundColor: "rgba(38, 185, 154, 0.31)",
          borderColor: "rgba(38, 185, 154, 0.7)",
          pointBorderColor: "rgba(38, 185, 154, 0.7)",
          pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointBorderWidth: 1,
          data: data_count
        }]
      }
    });
	<?php } ?>
	<?php if($keyword != null) { ?>
	var raw8 = <?php get_apriori_frequent_items($keyword, $startDate, $endDate); ?>;
	var dataset8 = new Array();
	for(i = 0; i < raw8.term.length; i++){
		dataset8[i] = [
		raw8.term[i], 
		raw8.count[i]];
	}
	
	$(document).ready(function() {
		$('#datatable8').dataTable({
			data: dataset8,
			columns: [
					{title: "Term" },
					{title: "Occurences"}
			],
			"order": [[1, "desc"]],
			bFilter: false
		});
	  });	
	  <?php } ?>
	  
	<?php if($keyword != null) { ?>
	var raw7 = <?php get_headlines_containing($startDate, $endDate, $keyword); ?>;
	var dataset7 = new Array();
	for(i = 0; i < raw7.length; i++){
		var headline = JSON.stringify(raw7[i].headline).toString().replace(/['"#%]/g, '');
		dataset7[i] = [
		'<a target="_blank" href="http://www.google.com/search?q='+headline+' '+raw7[i].source+' news&tbm=nws">'+
		raw7[i].headline +'</a>', 
		raw7[i].source, 
		raw7[i].date];
	}
	$(document).ready(function() {
		$('#datatable7').dataTable({
			data: dataset7,
			columns: [
					{title: "Headline" },
					{title: "Source"},
					{title: "Date Published"}
			],
			"order": [[2, "desc"]],
			bFilter: true
		});
	  });	
	  <?php } ?>
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
