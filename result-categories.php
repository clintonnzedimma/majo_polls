<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Majo/Engine/Env/ftf.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Result by Categories</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" type="text/css" >
		<link rel="stylesheet" href="assets/css/sweetalert2.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />

	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1>Ma.Jo Polls</h1>
				<p>Categories<br>
				</p>
			</header>	

			<div class="categories">
				<ul>
					<?php foreach (Vote_Factory::categoryAssoc() as $category): ?>
						<li> <a href="poll.php?id=<?=$category['id']?>"><?=ucwords($category['name'])?></a> </li>	
					<?php endforeach ?>
				</ul>
			</div>

<!-- 			<div class="" style="margin-bottom: 8%;">
				<a href="index.php" style="border-bottom:  none !important;">LOGIN</a>
			</div>					
 -->
		<!-- Footer -->
			<footer id="footer" style="margin-top: 5% !important;">
<!-- 				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
				</ul> -->
				<ul class="copyright">
					<li>&copy; 2019</li><li>Powered by: <a href="http://flimbit.com.ng">Flimbit</a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/legacy.js"></script>
			<script src="assets/js/jquery/jquery-3.2.1.min.js"></script>
			<script src="assets/js/vuejs/vue.min.js"></script>
			<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
			<script src="assets/js/sweetalert2.min.js"></script>

			<script type="text/javascript">
				
			</script>


	</body>
</html>
