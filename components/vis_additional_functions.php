<script type="text/javascript">
    $.fn.followTo = function (pos, top_pos, left_pos, left_offset) {
        var $this = this,
            $window = $(window);

        $window.scroll(function (e) {
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
        });
    };

    $(document).ready(function () {
        $(window).resize(function(){
            <?php if (!isset($_GET['embed']) || $_GET['embed'] === 'false'): ?>
                div_height = calcDivHeight();

                $(".overflow-vis").css("min-height", div_height + "px")
                $("#visualization").css("min-height", div_height + "px")

                var absolute_left = $("#visualization").offset().left;
                var offset = 0;
                $("#modals").css("left",  absolute_left + offset)
                $("#modals").followTo(initial_height, $("#modals").position().top, absolute_left, offset);
            <?php endif ?>
        });

        $(window).trigger("resize");
    })

</script>
