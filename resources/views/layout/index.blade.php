<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Request IT</title>
	<base href="{{ asset('') }}">

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2-bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

	<link rel="stylesheet" type="text/css" href="css/style.css">



</head>
<body>
	@include("layout.header")
	<div class="container">
		<div class="row">
			@include("layout.menu")
			@yield("content")

		</div>
	</div>
	
	@include("layout.footer")



	<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/tablefilter/tablefilter.js"></script>
	<script type="text/javascript" language="javascript" src="vendor/ckeditor/ckeditor.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	

	<script type="text/javascript" src="js/script.js"></script>
	
	@yield("script")
	
	
</body>
</html>