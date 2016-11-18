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
                <h1> Welcome to Headline Analytics! </h1>
				This simple web-app regularly fetches data from Indonesia online medias, takes the headlines of the news, and analyzes it to find interesting trends!
				<br>
				As of <b>version 0.3</b>, this web-app now also fetches data from some <b><u>international media</u></b>!
				<br><br>
				<blockquote >
				<q style="font-size:14px">I have been trying to put a lot of work on this web-app for the last few days. It has been a fun and enjoyable experience. I learned a lot while building this web-app.
				Unfortunately, I REALLY have to get started to work on my final project proposal. So, my time for this web-app will probably be cut down by a decent amount. 
				Expect less rapid updates in the future, but keep those suggestions coming! I will get my hands on them whenever I find time to do so. Your suggestions will really help me 
				to further improve this web-app. Thanks!</q>
				<footer> <a href="http://instagram.com/_u/jackyef_">Jacky</a>, 24 April 2016</footer>
				</blockquote>
				<ul>
					<li><span class="badge bg-blue">What's new? (v0.6)</span> on 24 April 2016
						<ul>
							<li>Fixed a bug which made the routine data fetch would sometimes fail. </li>
							<li>This project is pretty much finished. Unless there are major bugs or a major feature to add, expect only a few updates</li>
						</ul>
					</li>
					<br>
					<li><span class="badge bg-green">What's next?</span>
						<ul>
							<li>Find a text analysis algorithm which will be useful for this context</li>
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
