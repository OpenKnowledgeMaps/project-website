<div class="topheader"></div>    
<?php include ($COMPONENTS_PATH . "covis_banner_small.php"); ?>
<?php //include ($COMPONENTS_PATH . "donation_banner.php"); ?>
<?php include ($COMPONENTS_PATH . "browser_unsupported_banner.php"); ?>

<div class="search-box">
        <div class="background2">
            <div class="team">
                <h2>Map a research topic <sup style="color:white;">beta</sup></h2>
                <p>Get an overview - Find papers - Identify relevant concepts</p>
            </div>

        <?php include($SEARCH_FLOW_PATH . 'inc/search-form.php') ?>

        </div>
    <p style="text-align:center; margin-top: 30px;"><a class="newsletter2" href="about">What is Open Knowledge Maps?</a><p>
</div>
<script>
    //TODO: Introduce a more dynamic solution here, integrate in search-flow
    if(base_down) {
        disableItem("base");
        makeDefault("pubmed");
    }

    if(pubmed_down) {
        disableItem("pubmed");
        makeDefault("base");
    }

    if(lib_from_param === "pubmed") {
        makeDefault("pubmed");
        removeDefault("base");
    }

    if(lib_from_param === "base") {
        makeDefault("base");
        removeDefault("pubmed");
    }
</script>