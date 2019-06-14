<?php
include $_SERVER['DOCUMENT_ROOT'].'/Majo/Engine/Env/ftf.php';
include ROOT.'/Engine/Controllers/Vote/index_ctrl.php'; 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Ma.Jo Polls</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css" type="text/css" >
		<link rel="stylesheet" href="../assets/css/sweetalert2.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<style type="text/css">
			@media screen and (max-width: 480px) {
			html, body {
			    min-width: 320px;
			}

		}
		.swal2-modal .swal2-styled	{
			    background-color: #1cb495 !important;
    			border-left-color: #1cb495 !important;
    			border-right-color: #1cb495 !important;
    			border: 0;
    			border-radius: 3px;
    			padding-top: 3px !important;
    			padding-bottom: 13px !important;
    			padding-right: 40px !important;
    			padding-left: 40px !important;
    			color: #fff !important;
    			font-weight: 700;

		}		
		</style>

		<!-- Header -->
			<header id="header" align='center'>
				Welcome <h3 style="font-weight: 700"><?=$u->get('full_name')?> </h3>
				<?php if (Vote_Factory::userHasCompletedVoting($u)): ?>	
					<div align="center">
						You have voted already. Thank you very much
				<?php endif ?>	

			</header>
<?php if (!Vote_Factory::userHasCompletedVoting($u)): ?>

		<!-- Wrapper -->
			<div id="wrapper">

				<form id="positions">
					<ul>


	

<?php foreach ($categories as $category): ?>
						<li id="cat-<?=$category['id']?>"> <span id="cat-<?=$category['id']?>-check" class="fa fa-check" style="color: #1fc2a2; display: none;"></span> <?=ucwords($category['name'])?> </li>

						<!-- Candidates -->
						<div id="cat-<?=$category['id']?>-contestants" class="positions">


								<?php foreach (Vote_Factory::getContestantsArrayByCategoryId($category['id']) as $contestant): ?>
							<header>
								<p></p>
								<span class="exit" style="color: white;"><i class="fa fa-times"></i></span>		
							</header>								
							<section class="candidates">
								<header>
									<!-- <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
									<h1><?=$contestant['name']?></h1>
									<!-- <p>Senior Psychonautics Engineer</p> -->
								</header>
								
								<footer>
									<ul class="icons">
<!-- 										<span style="display: none;">
											<input type="radio" id="cat-<?=$category['id']?>_null" name="cat-<?=$category['id']?>" checked="checked" value='0'/>
											<label for="cat-<?=$category['id']?>_null">Vote</label>
										</span>
 -->
										<input type="radio" id="cat-<?=$category['id']?>_<?=
										$contestant['name']?>" name="cat-<?=$category['id']?>" value="<?=$contestant['id']?>" />
										<label for="cat-<?=$category['id']?>_<?=$contestant['name']?>">Vote</label>
									</ul>
								</footer>
							</section>										
									
								<?php endforeach ?>

						</div>


							
<?php endforeach ?>




					<input type="button" name="submit" value="Cast Votes">

					</ul>

				</form>
			

				<!-- Footer -->


			</div>

<?php endif ?>


					<footer id="footer" style="margin-bottom: 10% !important;">
						<p>
							<ul class="copyright">
								<li>&copy; 2019</li><li>Powered by: <a href="http://flimbit.com.ng">Flimbit</a></li>
							</ul>
						</p>
					</footer>


		<!-- Scripts -->
		<script src="../assets/js/legacy.js"></script>
		<script src="../assets/js/jquery/jquery-3.2.1.min.js"></script>
		<script src="../assets/js/vuejs/vue.min.js"></script>
		<script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>		
		<script src="../assets/js/sweetalert2.min.js"></script>
		<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
				
				$(document).ready(function(){
<?php foreach ($categories as $category): ?>
					
					$('#cat-<?=$category['id']?>-contestants').hide();

					$('#cat-<?=$category['id']?>').click(function(){
						$('#cat-<?=$category['id']?>-contestants').show();
					});

					$("input[name=cat-<?=$category['id']?>]").on('click', function(){
						if ($(this).prop("checked") == true) {
							$("#cat-<?=$category['id']?>-check").show();
						}
					});						


<?php endforeach ?>

					$('#president-candidates').hide();
					$('#presidents').click(function(){
						$('#president-candidates').show();
					});		

					$('.exit').click(function(){
						$('.positions').hide();
					});
				});



		$("input[type=button]").on("click", function () {
			var votes = [
				null,
<?php foreach ($categories as $category): ?>
	$("input[name=cat-<?=$category['id']?>]:checked").val()<?php if ($category['id'] != '715') echo  ", \n";  ?>

<?php endforeach ?>	

			];
			/*console.log(votes);*/

				for (i in votes) {
					if(i>0) {
						/*console.log(votes[i]);*/
						if (votes[i] == null) {
							swal("Please vote in all categories","","warning");
							break;
						} 
					}
				}

			var nullVotesCount = 0;
			for (i in votes) {
				if (i>0) {
					if (votes[i] == null) {
						nullVotesCount++;
					}
				}
			}	

			if (nullVotesCount == 0) {
				var asyncData = {
					votes_data: votes
				}
				$.post(
				"../Engine/Async/vote_ajax.php",
				asyncData,
				function (response, status){	
					if (status) {
						console.log(response);
						if (response == 15) {
							swal("Voting successful","Thank you!","success");
							window.location.reload();
						}
						if (response == 1) {
							swal("You have voted already","Thank you!","info");
							window.location.reload();
						}
					}
				});
			}


				var asyncData = {
					votes_data: votes
				}
				$.get(
				"../Engine/Async/vote_ajax.php",
				asyncData,
				function (response, status){	

				});

		});	

			</script>

	</body>
</html>