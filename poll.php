<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Majo/Engine/Env/ftf.php';
include ROOT.'/Engine/Controllers/poll_ctrl.php'; 
?>

<?php if (isset($_GET['id']) && Vote_Factory::categoryIdExists($_GET['id'])): ?>
	

<!DOCTYPE HTML>
<html>
	<head>
		<title>Poll - <?=ucwords(Vote_Factory::getCategoryById('name', $id))?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" type="text/css" >
		<link rel="stylesheet" href="assets/css/sweetalert2.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />

	</head>
	<body class="is-preload">

		<style type="text/css">
			.main-wrapper {
				background: #fff;
				width: 100%;
				padding-bottom: 4px;
				padding-top: 5px;
				display: block;
			}

			.list-wrapper {
				background: #fff;
				width: 100%;	
				color: #292929;	
				margin-bottom: 2%;
				padding: 10px;		
			}

			@media screen and (max-width: 480px) {
				.main-wrapper canvas {
					height: 720px !important;
				}

			}			
		</style>
		<!-- Header -->
<!-- 			<header id="header">
				<h1>Ma.Jo Polls</h1>
				<p>Categories<br>
				</p>
			</header>	 -->

			<p class="advice">
				<h3>For best experience on mobile device, please rotate your phone</h3>
			</p>

			<div class="list-wrapper">
				<h3 style="color:#17262a">Results for <i style="color:#2b464d"> <?=ucwords(Vote_Factory::getCategoryById('name', $id))?> </i></h3>
				<ul>
					<?php foreach ($contestants as $contestant): ?>
						<?php 
							$num_of_votes = Vote_Factory::countVotesOfContestant($contestant['category_id'], $contestant['id']);
							$percentage = 100 *(Vote_Factory::countVotesOfContestant($contestant['category_id'], $contestant['id'] )/Vote_Factory::countTotalVotesOfCategory($contestant['category_id'])); 
						?>
						<li><b style="color: #303030"><?=$contestant['name']?></b> - <?=$num_of_votes?> votes, <?=$percentage?>% </li>
					<?php endforeach ?>
					
				</ul>

				<p style="color: #282923" align="center">Total number of votes: <b style="color: #1e2a2d"><?=Vote_Factory::countTotalVotesOfCategory($id)?></b> </p>
			</div>

<!-- 			<div class="main-wrapper">
				<canvas id='barChart' align="left">
				</canvas>
				<p style="color: #282923" align="center">Total number of votes: <b style="color: #1e2a2d"><?=Vote_Factory::countTotalVotesOfCategory($id)?></b> </p>
			</div> -->
<!-- 			<div class="" style="margin-bottom: 8%;">
				<a href="index.php" style="border-bottom:  none !important;">LOGIN</a>
			</div>					
 -->
		<!-- Footer -->
			<footer id="footer">
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
			<script src="assets//js/chart/Chart.min.js"></script>

			<script type="text/javascript">
			const CHART = $("#barChart");
			var Chart_Container = new Chart(CHART, {
				type: 'bar',
				//data below
			data: {
				labels: [
				<?php 
				$loopCount = 0;
				foreach ($contestants as $contestant) {
					$loopCount ++;
					echo "'".$contestant['name']."'";
					if ($loopCount != count($contestants)) {
						echo ", ";
					}
				}
				?>
				], //contestants
				datasets: [ 
					{
						label: 'Votes (%)',
						backgroundColor: "rgba(28, 182, 150, 0.4)",
						borderColor: "rgba(28, 182, 150, 0.8)",
						fill:true,
						borderWidth:1.5,
						data: [
				<?php 
				$loopCount = 0;
				foreach ($contestants as $contestant) {
					$loopCount ++;
					echo "'". 100 *(Vote_Factory::countVotesOfContestant($contestant['category_id'], $contestant['id'] )/Vote_Factory::countTotalVotesOfCategory($contestant['category_id']))."'";
					if ($loopCount != count($contestants)) {
						echo ", ";
					}
				}
				?>
						], ///number of votes
						
					}				
				]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: '<?=ucwords(Vote_Factory::getCategoryById('name', $id))?>'
				},

				layout : {
					padding : {
						top:30
					}
				},
				tooltips: {
					mode: 'index',
					intersect: false,
					callbacks :  {
							label: function (tooltipItem, data) {
								var label = data.datasets[tooltipItem.datasetIndex].label || '';
								if (label) {
									label += ': ';
							}
								label+=tooltipItem.yLabel.toLocaleString();
								return label; 
						}
						}
					
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						barPercentage:0.2,
						scaleLabel: {
							display: true,
							labelString: 'NOMINEES',
							fontColor:'#15bd9c'
						},
						ticks: {
						fontColor:'#999999',
						fontFamily:' "Baskerville Old Face"',
						fontSize:'13'
					}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'VOTES (%)',
							fontColor:'#ec489c',
						},
						ticks: {
						min: 0,
						max: 100,
						stepSize: 10, 
						callback: function(value, index, values) {
							if(parseInt(value)>=1000) {
							return currencySign+value.toLocaleString();
						} else if (parseInt(value)<=-1000) {
							return '- '+currencySign+Math.abs(value).toLocaleString();
						} else {
							return value;
					}
					},
						fontColor:'#4b4b4b',
						fontFamily: 'Verdana',
					}
					}]
				}
			}							
		});



				
			</script>


	</body>
</html>
<?php endif ?>