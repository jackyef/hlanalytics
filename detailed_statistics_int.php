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
                    Detailed Statistics - International News
                    
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
			<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel alert alert-info">
					<span class="fa fa-info-circle"></span> NEW! You can click on the items in the tables to search for the keyword on the internet
			</div>
		  </div>
          <div class="clearfix"></div>
          <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Keywords Table<small> </small></h2>
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
                    Below are the complete data for keywords occurences in news headlines <?php if(!isset($_GET['startDate'])){ 
						echo "<b>from the past 7 days";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};
						
						echo "</b>."?>
                  </p>
                  <table id="datatable" class="table table-striped table-bordered">
                    
                  </table>
                </div>
              </div>
            </div>  
			
			<div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>2-Words Phrases Table<small> </small></h2>
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
						Below are the complete data for 2-words phrases occurences in news headlines <?php if(!isset($_GET['startDate'])){ 
						echo "<b>from the past 7 days";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};
						
						echo "</b>."?>
				  </p>
                  <table id="datatable2" class="table table-striped table-bordered">
                    
                  </table>
                </div>
              </div>
            </div>  
		  </div>
		  
		  <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>3-Words Phrases Table<small> </small></h2>
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
                    Below are the complete data for 3-words phrases occurences in news headlines <?php if(!isset($_GET['startDate'])){ 
						echo "<b>from the past 7 days";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};
						
						echo "</b>."?>
                  </p>
                  <table id="datatable3" class="table table-striped table-bordered">
                    
                  </table>
                </div>
              </div>
            </div>  
			
			<div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>4-Words Phrases Table<small> </small></h2>
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
						Below are the complete data for 4-words phrases occurences in news headlines <?php if(!isset($_GET['startDate'])){ 
						echo "<b>from the past 7 days";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};
						
						echo "</b>."?>
				  </p>
                  <table id="datatable4" class="table table-striped table-bordered">
                    
                  </table>
                </div>
              </div>
            </div>  
		  </div>
		  
		  <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>5-Words Phrases Table<small> </small></h2>
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
                    Below are the complete data for 5-words phrases occurences in news headlines <?php if(!isset($_GET['startDate'])){ 
						echo "<b>from the past 7 days";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};
						
						echo "</b>."?>
                  </p>
                  <table id="datatable5" class="table table-striped table-bordered">
                    
                  </table>
                </div>
              </div>
            </div>  
			
			<div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Sources of News<small> </small></h2>
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
						Below are the data for number of news from each sources <?php if(!isset($_GET['startDate'])){ 
						echo "<b>from the past 7 days";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};
						
						echo "</b>."?>
				  </p>
                  <table id="datatable6" class="table table-striped table-bordered">
                    <tfoot>
						<tr>
							<th>Total:</th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
                  </table>
                </div>
              </div>
            </div>  
		  </div>
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
                    Below are the complete data every news headlines <?php if(!isset($_GET['startDate'])){ 
						echo "<b>from the past 7 days";
						} else {
						echo 'from '. date('d F Y', strtotime($_GET['startDate'])) . ' to '. date('d F Y', strtotime($_GET['endDate']));
						};
						
						echo "</b>."?>
						You can also search for a keyword using the search field!
                  </p>
                  <table id="datatable7" class="table table-striped table-bordered">
                    
                  </table>
                </div>
              </div>
            </div>  
		  </div>
		<div class="clearfix"></div>
		  <div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
				<div class="x_title">
				<h2>More</h2>
				
                  <div class="clearfix"></div>
				</div>
				<div class="x_content">
					You can generate data for your own preferred period of time: <br>
					<form action="detailed_statistics_int.php" method="GET">
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

        <?php include('templates/footer.php'); ?>

        <script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>


        <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
  <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

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
		<script src="js/bootstrap-datepicker.js"></script>
		  <?php include('/functions/get_analysis_data.php'); ?>
		  <?php include('/functions/get_source_data.php'); ?>
		  <?php include('/functions/get_headlines.php'); ?>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
		
		<?php
		$startDate = null;
		$endDate = null;
		if(isset($_GET['startDate'])){ 
					$startDate = date('Y-m-d', strtotime($_GET['startDate']));
				} 
		if(isset($_GET['endDate'])){ 
					$endDate = date('Y-m-d', strtotime($_GET['endDate']));
				}
		?>
        <script type="text/javascript">
		
		//1 word
		var raw = <?php get_analysis_data_int($startDate, $endDate, 1, 10000); ?>;
        var dataset = new Array();
		for(i = 0; i < raw.term.length; i++){
			dataset[i] = [
			'<a target="_blank" href="http://www.google.com/search?q=news+about+'+raw.term[i]+'&tbm=nws">'+
			raw.term[i] +'</a>', 
			raw.count[i]];
		}
		
		//2 word phrases
		var raw2 = <?php get_analysis_data_int($startDate, $endDate, 2, 10000); ?>;
        var dataset2 = new Array();
		for(i = 0; i < raw2.term.length; i++){
			dataset2[i] = [
			'<a target="_blank" href="http://www.google.com/search?q=news+about+'+raw2.term[i]+'&tbm=nws">'+
			raw2.term[i] +'</a>', 
			raw2.count[i]];
		}
		
		//3 word phrases
		var raw3 = <?php get_analysis_data_int($startDate, $endDate, 3, 10000); ?>;
        var dataset3 = new Array();
		for(i = 0; i < raw3.term.length; i++){
			dataset3[i] = [
			'<a target="_blank" href="http://www.google.com/search?q=news+about+'+raw3.term[i]+'&tbm=nws">'+
			raw3.term[i] +'</a>', 
			raw3.count[i]];
		}
		
		//4 word phrases
		var raw4 = <?php get_analysis_data_int($startDate, $endDate, 4, 10000); ?>;
        var dataset4 = new Array();
		for(i = 0; i < raw4.term.length; i++){
			dataset4[i] = [
			'<a target="_blank" href="http://www.google.com/search?q=news+about+'+raw4.term[i]+'&tbm=nws">'+
			raw4.term[i] +'</a>', 
			raw4.count[i]];
		}
		
		//5 word phrases
		var raw5 = <?php get_analysis_data_int($startDate, $endDate, 5, 10000); ?>;
        var dataset5 = new Array();
		for(i = 0; i < raw5.term.length; i++){
			dataset5[i] = [
			'<a target="_blank" href="http://www.google.com/search?q=news+about+'+raw5.term[i]+'&tbm=nws">'+
			raw5.term[i] +'</a>', 
			raw5.count[i]];
		}
		
		//sources data
		var raw6 = <?php get_source_data_int($startDate, $endDate, 10000); ?>;
        var dataset6 = new Array();
		var total = 0;
		for(i = 0; i < raw6.term.length; i++){
			total += raw6.count[i];
		}
		for(i = 0; i < raw6.term.length; i++){
			dataset6[i] = [raw6.term[i], raw6.count[i], (raw6.count[i]/total*100).toFixed(3)];
		}
		
		//headlines data
		var raw7 = <?php get_headlines_int($startDate, $endDate); ?>;
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
            $('#datatable').dataTable({
				data: dataset,
				columns: [
						{title: "Term" },
						{title: "Occurences"}
				],
				"order": [[1, "desc"]],
				bFilter: false
			});
			$('#datatable2').dataTable({
				data: dataset2,
				columns: [
						{title: "Term" },
						{title: "Occurences"}
				],
				"order": [[1, "desc"]],
				bFilter: false
			});
			$('#datatable3').dataTable({
				data: dataset3,
				columns: [
						{title: "Term" },
						{title: "Occurences"}
				],
				"order": [[1, "desc"]],
				bFilter: false
			});
			$('#datatable4').dataTable({
				data: dataset4,
				columns: [
						{title: "Term" },
						{title: "Occurences"}
				],
				"order": [[1, "desc"]],
				bFilter: false
			});
			$('#datatable5').dataTable({
				data: dataset5,
				columns: [
						{title: "Term" },
						{title: "Occurences"}
				],
				"order": [[1, "desc"]],
				bFilter: false
			});
			$('#datatable6').dataTable({
				data: dataset6,
				columns: [
						{title: "Source" },
						{title: "Number of News"},
						{title: "Percentage of Total (%)"}
				],
				"order": [[1, "desc"]],
				bFilter: false,
				"fnFooterCallback": function (nRow, aasData, iStart, iEnd, aiDisplay) {
					var columnas = [1]; //the columns you wish to add            
					for (var j in columnas) {
						var columnaActual = columnas[j];
						var total = 0;
						for (var i = iStart; i < iEnd; i++) {
							total = total + parseFloat(aasData[aiDisplay[i]][columnaActual]);
						}
						$($(nRow).children().get(columnaActual)).html(total);
					};
				}
			});
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
