<!DOCTYPE html>

<html>

<head>
	<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
	<title></title>
	<script type="text/javascript"
			src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		
</head>

	<body>
		<div id="epicmemes" class="contentslider">
			<div class="cs_wrapper">
				<div class="cs_slider">
<?php $x=0; while ($x<999){?>
<div class="cs_article"></div>
<?php $x++; }?>

			<?php 	/*
					<div class="cs_article">
						<h2>title</h2>
						<img src="url" alt="title" />
					</div>
					*/
			?>
			
					

				</div>
			</div>
		</div>
		<script>
  			$(".cs_slider").load("scrapers/gimmeten.php");
		</script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.ennui.contentslider.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#epicmemes').ContentSlider({
					width : '900px',
					height : '600px',
					speed : 400,
					easing : 'easeOutQuad',
					textResize : true
				});
			});

		</script>

	</body>

</html>