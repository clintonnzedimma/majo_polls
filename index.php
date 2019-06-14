<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Majo/Engine/Env/ftf.php';
include ROOT.'/Engine/Controllers/index_ctrl.php'; 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Pacesetters Polls</title>
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
				<p>Pacesetters<br>
				</p>
			</header>

		<!-- Signup Form -->
				<?php if (isset($_POST['login']) && !empty($errors)): ?>
				<p style="color: #ff4040">
					<?php foreach ($errors as $error): ?>
					<span style="font-size: 14px">
						<i class="fa fa-exclamation-triangle" style="margin-right: 4px; font-size: 16px"></i>
						<?=$error?>
					</span> 
						<br>						
					<?php endforeach ?>
				</p>	
				<?php endif ?>

			<form id="signup-form" method="post">
				<input type="text" name="mat_no" value="<?php postConst('mat_no')?>" placeholder="Matriculation Number" />
				<input type="password" name="pwd" placeholder="Password" />
				<input type="submit" name="login" value="Login" />
			</form>

			<div class="">
				<a href="result-categories.php" style="border-bottom:  none; !important;"> VIEW POLL RESULTS</a>
			</div>

		<!-- Footer -->
			<footer id="footer">
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


	</body>
</html>
