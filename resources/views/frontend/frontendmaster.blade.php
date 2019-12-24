<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">

</head>
<body>
	<div class="header">
		<a href="/"><h2 class="display-1">TechNews</h2></a>
	</div>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
			@yield('blogcontents')
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<h3 style="text-align: center;">Latest Post</h3>
				@yield('latestposts')
			</div>
			<div class="card">
				<h3>Ads here</h3>
				@yield('ads')
			</div>
		</div>
	</div>
</div>

	<div class="footer">
		<h2>Copyright &copy; 2019-2020</h2>
	</div> 



	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>