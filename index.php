<?php
	// This is the index page.
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Bootstrap MaxCDN -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/foursquareSearch/css/style.css">
		<style>
      html{
        background-image: url(/foursquareSearch/images/home.jpg);
        background-size: cover;
				background-repeat: no-repeat;
      }
    </style>
	</head>
	<body>
	<div class="container home">
			<form class="form-horizontal" action="nearby_search_foursquare_api.php" method="get">

				<div class="form-group">
					<label class="control-label col-sm-2" for="keyword">Keyword:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="keyword" name="keyword" placeholder="e.x. chicken">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="name">City Name:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="name" placeholder="e.x. Hooville, LA">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="radius">Radius:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="radius" name="radius" placeholder="e.x. 123">
					</div>
				</div>

				<div class="col-sm-12" style="text-align:right;">
					<button type="submit" class="btn btn-default" style="margin-bottom: 10px;">Submit</button> <!-- button to submit form -->
				</div>

			</form>

	</div>
	<!-- Scripts that shouldnt effect page load go right before the closing body tag -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
