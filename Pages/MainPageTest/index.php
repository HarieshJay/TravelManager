<!DOCTYPE html>
<html>

<head>
  <title></title>
  <?php require_once '../../Scripts/bootstrap_jquery_links.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <?php include '../../Scripts/nav.php'; ?>
</head>
<style type="text/css">
  html {
    background-color: black;
    overflow-x: hidden;
  }


  #content {
    position: relative;
  }

  #parallax-container {
    display: block;
    height: 1700px; // This height can be adjusted here and below
    width: auto;
  }

  #parallax-container img {
    left: 0;
    top: 0;
    background-position: center !important;
    transform: translateY(0px);
    height: 1700px; // Keep this the same height as above
    width: 100%;
    position: absolute;
    margin-left: auto;
    margin-right: auto;
    



  }

  #page2 {
    width: 100%;
    height: 100%;
    padding: 100%;
    display: block;
    background-color: black;
  }

  #img1 {
    z-index: 1
  }

  #img2 {
    z-index: 2
  }

  #img3 {
    z-index: 3
  }

  #img4 {
    z-index: 4
  }

  #blackOverlay {
    background-color: #000;
    opacity: 0.0;
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 100%;
    z-index: 10;
    left: 0;


  }

</style>

<body>



  <div id="parallax-container">

    <div id="blackOverlay"></div>

    <img src="layer_2.png" id="img1">
    <img src="layer_1.png" id="img2">
    <img src="layer_0.png" id="img3">








  </div>

  <div id="page2"></div>

  <script type="text/javascript">

    window.addEventListener('scroll', () => {
      let parent = document.getElementById('parallax-container');
      let children = parent.getElementsByTagName('img');
      for (let i = 0; i < children.length; i++) {
        children[i].style.transform = 'translateY(-' + (window.pageYOffset * i / children.length) + 'px)';
      }
    }, false)


    $(function () {
      $(window).scroll(function () {
        var currentScrollTop = $(window).scrollTop();
        $('#blackOverlay').css('opacity', currentScrollTop / $('#blackOverlay').height() * 1.5);

      });
    });

  </script>

</body>

</html>