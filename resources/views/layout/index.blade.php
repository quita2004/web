<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>Request IT</title>


	<base href="{{ asset('') }}">

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2-bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"  />

	<link rel="stylesheet" type="text/css" href="css/style.css">



</head>
<body>
	@include("layout.header")
	<div class="container-fluid">
		<div class="row">
			<div class="menu">
				@include("layout.menu")
			</div>
			<div class="content">
				@yield("content")
			</div>
			

		</div>
	</div>
	
	@include("layout.footer")



	<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/tablefilter/tablefilter.js"></script>
	<script type="text/javascript" src="vendor/ckeditor/ckeditor.js" ></script>
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	

	
	
	@yield("script")
	
	
</body>
</html>