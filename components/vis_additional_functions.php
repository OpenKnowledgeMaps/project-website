<script type="text/javascript">
    $.fn.followTo = function (pos, top_pos, left_pos, left_offset) {
        var $this = this,
            $window = $(window);
        
        setPosition = function() {
             if ($window.scrollTop() > pos - top_pos) {
                $this.css({
                    position: 'absolute',
                    top: pos,
                    left: left_offset
                });
            } else {
                $this.css({
                    position: 'fixed',
                    top: top_pos,
                    left: left_pos + left_offset
                });
            }
        }
        $window.scroll(setPosition);
        setPosition();
    };
    
    $(document).ready(function () {
        <?php if (!isset($_GET['embed']) || $_GET['embed'] === 'false'): ?>
            var absolute_left = $("#visualization").offset().left;
            var offset = 0;

            $(".close").click(function(){
                $("#modals").css("top", $("#modals").position().top - $('#desktop-warning').outerHeight());
                $("#modals").followTo(div_height, $("#modals").position().top, absolute_left, 0);
            });
        <?php endif ?>
        
        $(window).resize(function(){
            <?php if (!isset($_GET['embed']) || $_GET['embed'] === 'false'): ?>
                let previous_div_height = div_height;
                div_height = calcDivHeight();
                
                let ratio = previous_div_height/div_height;

                $(".overflow-vis").css("min-height", div_height + "px")
                $("#visualization").css("min-height", div_height + "px")
                
                absolute_left = $("#visualization").offset().left;

                //console.log("div_height: " + div_height + "\ntop_position: " + $("#modals").position().top);
                $("#modals").css("position", "fixed");
                /*if(($(window).scrollTop() > div_height - $("#modals").position().top) && $("#modals").position().top > 0) {
                    //$("#modals").css("top",  div_height - $(window).scrollTop() + ($("#headstart-chart").position().top - $("#visualization").position().top));
                    //$("#modals").css("top",  div_height - $("#headstart-chart").position().top);
                } else {
                     //$("#modals").css("top",  $(window).scrollTop())
                }*/
                $("#modals").css("left",  absolute_left + offset);
                $("#modals").followTo(div_height, $("#modals").position().top, absolute_left, offset);
            <?php endif ?>
        });

        $(window).trigger("resize");
    })

</script>
