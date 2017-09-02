<script type="text/javascript" src="./js/twitterfetcher.js"></script>
<div id="parser" style="display:none"></div>
<div class="bs-example">
    <h2 id="feedback"><?php echo $FEEBDACK_TITLE; ?></h2>
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
    <div class="twitterbutton"><a class="twitter-follow-button"
                                  href="https://twitter.com/OK_Maps" target="_blank"
                                  accesskey=""data-size="large" data-show-count="false">
            Follow @OK_Maps</a></div>
</div>

<script>
    
    var Twitter = {};

    Twitter.callback = function (tweets) {
        var container = $(".carousel-inner"),
                tweets,
                i,
                createItem = function (item, index) {

                    var url = "https://publish.twitter.com/oembed?url=" + encodeURIComponent(item.permalinkURL)
                            + "&callback=?"
                            + "&hide_media=true";

                    $.getJSON(url, function (data) {
                                                
                        var div = $('<div class="item' + ((index === 0) ? ' active' : '') + '"></div>'),
                        divInner = $('<div class="carousel-content"></div>');
                        div.append(divInner.html(data.html));
                        
                        container.append(div);
                    });
                };
        
        container.html("");
        
        for (i = 0; i < tweets.length; i++) {
            createItem(tweets[i], i);
        }

        var total_tweets = tweets.length;

        $('.carousel-num').html('<span class="slideNr">1</span>/' + total_tweets);
    };

    var config_twitter = {
        "id": "<?php echo $TIMELINE_ID; ?>",
        "domId": '',
        "enableLinks": true,
        "showUser": true,
        "showTime": true,
        "dateFunction": '',
        "showRetweet": false,
        "customCallback": Twitter.callback,
        "showInteraction": false,
        dataOnly: true
    };

    twitterFetcher.fetch(config_twitter);

    !function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + "://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, "script", "twitter-wjs");

    $(document).ready(function () {
        $('#myCarousel').carousel({
            interval: false
        });
        
        var container = $(".carousel-inner"),
        status = 200,
        index = 1,
        url = "./img/comments/";
        
        container.addClass("static");
        
        while(status !== 404) {
            var http = new XMLHttpRequest(),
            fileurl = url + "comment-" + index + ".png";
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

        $('.carousel-num').html('<span class="slideNr">1</span>/' + index);

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