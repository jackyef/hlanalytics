<?php
	
	include('/templates/header.php');
	include('/templates/sidebar.php');
	include('/templates/top-nav.php');
?>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
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
              <div class="x_panel">
				<h1>Version history</h1>
				<ul>
					<li>Version 0.6 - (24 April 2016) <span class="badge bg-blue">Current version</span>
						<ul>
							<li>Fixed a bug which made the routine data fetch would sometimes fail. </li>
							<li>This project is pretty much finished. Unless there are major bugs or a major feature to add, expect only a few updates</li>
						</ul>
					</li>
					<li>Version 0.51 - (20 April 2016)
						<ul>
							<li>Minor bug fixes</li>
							<li>This project is pretty much finished. Unless there are major bugs or a major feature to add, expect only a few updates</li>
						</ul>
					</li>
					<li>Version 0.5 - (18 April 2016)
						<ul>
							<li>Added simple apriori-based frequently associated item sets to the "<a href="word_trends.php">Word Trends</a>" page.
							<li>Improved irrelevant words filter</li>
						</ul>
					</li>
					<li>Version 0.4 - (16 April 2016)
						<ul>
							<li>Added a new feature "<a href="word_trends.php">Word Trends</a>"! Try it now!</li>
							<li>Added Tweet and Google+ button</li>
							<li>Added percentage information to the pie chart</li>
							<li>Improved irrelevant words filter</li>
							<li>Revamped some of the layout</li>
						</ul>
					</li>
					<li>Version 0.35 - (15 April 2016)
						<ul>
							<li>Added Facebook social like and share button!</li>
							<li>Added <a href="version_history.php">"Version History" page</a>! (The list is getting pretty long)</li>
							<li>Added a feature to allow user to click on keyword (on Detailed Statistics page) to search for keyword on the internet</li>
							<li>Revamped some of the layout</li>
							<li>Always some more bugs fixing</li>
						</ul>
					</li>
					<li>Version 0.3 - (14 April 2016) 
						<ul>
							<li>Added International Media analysis!</li>
							<li>Added quick summary to the Quick Analysis page!</li>
							<li>Improved irrelevant words filter</li>
							<li>Some more bugs fixing</li>
						</ul>
					</li>
					<li>Version 0.2 - (13 April 2016)
						<ul>
							<li>Added more detailed data to Detailed Statistics page</li>
							<li>Added Detailed Statistics by date</li>
							<li>Added <a href="about.php">"About" page</a></li>
							<li>Put version history in the <a href="about.php">"About" page</a></li>
							<li>Some bugs fixing</li>
						</ul>
					</li>
					<li>Version 0.1 - (10 April 2016)
						<ul>
							<li>Added a function to count occurences of every n-length words in news' headlines from a given period of time</li>
							<li>Added some data to Detailed Statistics page</li>
							<li>Started using Gentelella template (it rocks!)</li>
							<li>Started using Chart.js 2.0 for charting</li>
							<li>Added Quick Analysis page for 1 keyword and 2 keywords trend</li>
						</ul>
					</li>
					<li>What's next:
						<ul>
							<li>More complex text analysis algorithm</li>
							<li>Play around with Association Rule Learning algorithm</li>
							<li><strike>Allow graphing of a particular keywords' trend over time</strike></li>
							<li><strike>Quick summary in Quick Analysis page</strike></li>
							<li><strike>Create a category for international news</strike></li>
						</ul>
					</li>
				</ul>
				<br>
				Any suggestions? I'd love to hear them! You can contact me from any of my social networks account, or by email. You can find them at the top right of this page. 
              </div>
            </div>
        </div>
		
          <div class="clearfix"></div>
		
        <?php include('templates/footer.php'); ?>
		<script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>

</body>

</html>
