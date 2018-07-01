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
            var top_pos = $("#modals").position().top;

            $(".close").click(function(){
                $("#modals").css("top", $("#modals").position().top - $('#desktop-warning').outerHeight());
                top_pos = $("#modals").position().top;
                $("#modals").followTo(div_height, top_pos, absolute_left, 0);
            });
        <?php endif ?>
        
        $(window).resize(function(){
            <?php if (!isset($_GET['embed']) || $_GET['embed'] === 'false'): ?>
                div_height = calcDivHeight();

                $(".overflow-vis").css("min-height", div_height + "px")
                $("#visualization").css("min-height", div_height + "px")
                
                absolute_left = $("#visualization").offset().left;

                $("#modals").css("position", "fixed");
                $("#modals").css("left",  absolute_left + offset);
                $("#modals").followTo(div_height, top_pos, absolute_left, offset);
            <?php endif ?>
        });

        $(window).trigger("resize");
    })

</script>
