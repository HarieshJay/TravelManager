<!DOCTYPE html>
<html>

<head>
    <title></title>

    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <meta name="viewport" content="width=1280, initial-scale=1">


    <?php 
         require_once '../Scripts/bootstrap_jquery_links.php'; 
         require_once '../Scripts/nav.php';
         
         
         ?>




</head>


<style type="text/css">
html {
    background-color: black;
    overflow-x: hidden;
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



#blackOverlay {
    background-color: #000;
    opacity: 0.0;
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 100%;
    z-index: 4;
    left: 0;
    top: 0;


}

nav {
    z-index: 0;
}

.p1-content {
    z-index: 2;
    /* z-index: 3 */
    /* Set z-index to 3 if you want text above the mountains */
    color: white;
    white-space: normal;
    overflow: hidden;

}

.p2-content {
    z-index: 50;
    color: white;
    position: absolute;
    height: 100%;
    width: 100%;
    /* padding: 100%; */


}
</style>

<body>





    <div id="parallax-container">

        <div id="blackOverlay"></div>

        <img src="images/layer_2.png" id="img1">
        <img src="images/layer_1.png" id="img2">
        <img src="images/layer_0.png" id="img3">


        <div class="mt-5 pt-5 position-sticky p1-content">
            <div class="container">
                <h1 class="display-1 text-right">Travel Manager</h1>
                <h1 class="text-right">Assistant to keep track of all your travel needs.</h4>
            </div>
        </div>

    </div>

    <div class="p2-content">
        <h1>hello</h1>
    </div>

    <script type="text/javascript">
    var siteWidth = 1280;
    var scale = screen.width / siteWidth

    document.querySelector('meta[name="viewport"]').setAttribute('content', 'width=' + siteWidth +
        ', initial-scale=' + scale + '');

    var height = 0;
    isScrolling = false;

    window.addEventListener('scroll', () => {
        let parent = document.getElementById('parallax-container');
        let children = parent.getElementsByTagName('img');
        for (let i = 0; i < children.length; i++) {
            children[i].style.transform = 'translateY(-' + (window.pageYOffset * i / children.length) + 'px)';



        }

        var currentScrollTop = $(window).scrollTop();
        $('#blackOverlay').css('opacity', currentScrollTop / 800);
    }, false)


    $.fn.scrollEnd = function(callback, timeout) {
        $(this).scroll(function() {
            var $this = $(this);
            if ($this.data('scrollTimeout')) {
                clearTimeout($this.data('scrollTimeout'));
            }
            $this.data('scrollTimeout', setTimeout(callback, timeout));
        });
    };


    $(function() {


        $(window).scrollEnd(function() {


            if ($(window).scrollTop() > 0 && $(window).scrollTop() < 150 && !isScrolling) {
                scroll(".p2-content");

            } else if ($(window).scrollTop() < $(".p2-content").offset().top && $(window).scrollTop() >
                $(".p2-content").offset().top - 150 && !isScrolling) {
                scroll("html");

            }



        }, 70);




    });






    function scroll(location) {
        isScrolling = true;
        $('html, body').animate({
            scrollTop: $(location).offset().top
        }, 2000, function() {
            isScrolling = false;
        });

        height = $(window).scrollTop();



    }


    function darken() {
        // var currentScrollTop = $(window).scrollTop();
        // $('#blackOverlay').css('opacity', currentScrollTop / 800);

    }
    </script>


</body>

</html>