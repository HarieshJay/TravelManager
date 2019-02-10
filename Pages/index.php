<?php require_once '../Scripts/bootstrap_jquery_links.php'; ?>

<!DOCTYPE html>
<html class="h-100">
<head>


	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="../Scripts/JavaScript/jquery.background-video.js"></script>
    <link rel="stylesheet" type="text/css" href="../Scripts/JavaScript/jquery.background-video.css">
	
	

	

	<style type="text/css">
		html { background-image: url(../Images/background.jpg);
  				background-size: cover;
  				background-attachment: fixed;
  				background-position: center;
  				background-repeat: no-repeat;
  				background-size: cover;
  				overflow-y: hidden; }
	</style>


	
</head>
<body class="h-100 align-middle">

	<?php include '../Scripts/nav.php'; ?>

	<div class="element-with-video-bg jquery-background-video-wrapper">
		<video class="my-background-video jquery-background-video" loop autoplay muted playsinline poster="path/to/your/poster.jpg">
			<source src="../Images/night.mp4" type="video/mp4">
			
		</video>
	</div>



	
	<div class="mt-5 pt-5 position-sticky" >
		<div class="container">
			<h1 class="display-1 text-center">Travel Manager</h1>
			<h1 class="text-center">Assistant to keep track of all your travel needs.</h4>
		</div>
	</div>


<script type="text/javascript">
	
$('.my-background-video').bgVideo({
	fullScreen: false, // Sets the video to be fixed to the full window - your <video> and it's container should be direct descendents of the <body> tag
	fadeIn: 500000, // Milliseconds to fade video in/out (0 for no fade)
	pauseAfter: 120, // Seconds to play before pausing (0 for forever)
	fadeOnPause: false, // For all (including manual) pauses
	fadeOnEnd: true, // When we've reached the pauseAfter time
	showPausePlay: true, // Show pause/play button
	pausePlayXPos: 'right', // left|right|center
	pausePlayYPos: 'top', // top|bottom|center
	pausePlayXOffset: '15px', // pixels or percent from side - ignored if positioned center
	pausePlayYOffset: '15px' // pixels or percent from top/bottom - ignored if positioned center
});


</script>








</body>
</html> 