<div class="builtwith"><!--This is the beta version of Open Knowledge Maps. -->Created on <?php echo (new DateTime($context->timestamp))->format('j M Y \a\t H:i') ?> 
    with <a href="http://github.com/pkraker/Headstart" target="_blank">Headstart</a> and <?php echo $credit ?> 
</div>
<div class="cite-map">
    <p>Please cite this map as follows:
    <div class="citation">
        <?php echo 
    "Open Knowledge Maps (" . (new DateTime($context->timestamp))->format('Y') . "). Overview of research on " . mb_strimwidth($query, 0, 100, "[..]") .". " 
    . "Retrieved from " . '<a href="' . $canonical_url . '">' . $canonical_url . '</a>'
    .  "/ [" . date ("d M Y") . "]."; 
        ?>
    </div>
</div>
<!--<div id="faulty-map">Not what you expected? 
<a href="faq#faq-faulty-map" target="_blank">Check out our FAQs.</a>
</div>-->

