<script type="text/javascript" src="./js/twitterfetcher.js"></script>
<div id="parser" style="display:none"></div>
<div class="bs-example">
    <h2 id="feedback"><?php echo $COMMENT_TITLE; ?></h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->

        <!-- Wrapper for carousel items -->
        <div class="carousel-inner"> </div>
        <div class="carousel-num"></div>

        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>

    </div>
</div>

<script>
    
    $(document).ready(function () {
        $('#myCarousel').carousel({
            interval: false
        });
        
        var container = $(".carousel-inner"),
        status = 200,
        index = 1,
        url = "<?php echo $COMMENT_IMAGES_URL ?>";
        
        container.addClass("static");
        
        while(status !== 404) {
            var http = new XMLHttpRequest(),
            fileurl = url + "statement-" + index + ".jpg";
            http.open('HEAD', fileurl, false);
            http.send();
            status = http.status;
            if (status !== 404) {
                var div = $('<div class="item' + ((index === 1) ? ' active' : '') + '"></div>'),
                divInner = $('<div class="carousel-content"></div>');
                div.append(divInner.html('<img src="' + fileurl + '" width=464>'));
                
                container.append(div);
            }
            
            index++;
        }
        

        $('.carousel-num').html('<span class="slideNr">1</span>/' + $('.item').length);

        var current = 1;

        $('#myCarousel').on('slide.bs.carousel', function (e) {
            var num_items = $('.item').length;

            if (e.direction == "left")
                current = (current >= num_items) ? (1) : (current + 1);
            else if (e.direction == "right")
                current = (current <= 1) ? (num_items) : (current - 1);

            $('.slideNr').html(current);
        });
    });




</script>