<script type="text/javascript">
    $(document).ready(function () {
        $(window).resize(function(){
            <?php if (!isset($_GET['embed']) || $_GET['embed'] === 'false'): ?>
                div_height = calcDivHeight();

                $(".overflow-vis").css("min-height", div_height + "px")
                $("#visualization").css("min-height", div_height + "px")
            <?php endif ?>
        });

        $(window).trigger("resize");
    })

</script>
