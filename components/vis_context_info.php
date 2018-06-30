<div class="builtwith">Created on <?php echo (new DateTime($context->timestamp))->format('j M Y \a\t H:i') ?> 
    with <a href="http://github.com/pkraker/Headstart" target="_blank">Headstart</a> and <?php echo $credit ?>
</div>
<div class="cite-map">
    <p>Please cite this map as follows:
    <div class="citation">
        <?php echo 
    "Open Knowledge Maps (" . (new DateTime($context->timestamp))->format('Y') . "). Overview of research on " . mb_strimwidth($query, 0, 100, "[..]") .". " 
    . "Retrieved from " . '<a href="https://openknowledgemaps.org/map/' . $id . '">https://openknowledgemaps.org/map/' . $id . '</a>'
    .  "/ [" . date ("d M Y") . "]."; 
        ?>
    </div>
</div>
<div id="faulty-map">Not what you expected? <a href="faq#faq-faulty-map" target="_blank">Check out our FAQs.</a>
</div>

