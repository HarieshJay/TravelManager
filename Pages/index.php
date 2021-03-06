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

.display-1 {
    font-size: 140px;
}

.p2-content {
    z-index: 50;
    color: white;
    position: absolute;
    height: 100%;
    width: 100%;
    /* padding: 100%; */

    jumbotron {
        background-image: url("http://paperlief.com/images/dark-forest-background-wallpaper-3.jpg");
        background-size: cover;
    }




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
                <h1 class="display-3 text-right">Plan Better.</h1>
            </div>
        </div>

    </div>

    <div class="p2-content w-100 h-100 vertical-center">
        <div class="container h-100 pt-4 pb-4">
            <div class="row align-items-center h-100">
                <div class="col-11 mx-auto">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card mb-3 shadow-lg" id="card1">
                                <img class="card-img-top" src="images/plane.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title text-dark display-4">Explore.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4" id="card2">
                            <div class="card mb-3 ">
                                <img class="card-img-top" src="images/japan.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title text-dark display-4">Learn.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4" id="card3">
                            <div class="card mb-3">
                                <img class="card-img-top" src="images/relax.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title text-dark display-4">Recover.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    var fadeout = false;
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

            if ($(window).scrollTop() > $(".p2-content").offset().top - 10 && fadeout) {
                $("#card1").fadeIn(300, function() {
                        $("#card2").fadeIn(400, function() {
                            $("#card3").fadeIn(400);
                        })
                    }


                )



                ;
                fadeout = false;


            } else if (!fadeout && $(window).scrollTop() < $(".p2-content").offset().top) {
                $("#card3").fadeOut(300, function() {
                        $("#card2").fadeOut(400, function() {
                            $("#card1").fadeOut(400);
                        })
                    }


                )
                fadeout = true;
            }



        }, 100);




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