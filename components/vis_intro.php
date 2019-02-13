<?php if (!isset($_GET['embed']) || $_GET['embed'] === 'false'): ?>
<script>
            var intro = {
            title: "What's this?",
                    body: '<div style="max-width: 1000px; width: 100%;"><div id="whatsthis-page">            <p class="wtp">This <b><span style="color:#e55137">beta</span> version of Open Knowledge Maps</b> presents you with a topical overview of research on                <b><?php echo $query; ?></b> based on 100 papers taken from <b><?php echo $service_name ?></b>.                 <?php echo $description; ?></p>                <p class="wtp">We use text similarity to create a knowledge map. The algorithm groups those papers together                 that have many words in common. Knowledge maps provide an instant overview of a topic by showing the main areas at a glance, and papers related to each area. This makes it possible to easily identify useful, pertinent information. Please <a target="_blank" class="underline" href="faq">check out our FAQs</a> for more information.</p> <p><a target="_blank" class="underline" href="http://eepurl.com/dvQeGP">Sign-up for our newsletter</a> to receive occasional updates on our latest improvements.</p>            <p><b>We need your feedback!</b><br><a target="_blank" class="underline" href="about">Open Knowledge Maps</a> is a non-profit organisation run by a group of dedicated volunteers. In order to improve our free service, we need your support. Please send us your feedback to <a style="text-decoration: underline;" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a></p>        </div></div>'
            }
</script>
<?php else: ?>

<script>
            var intro = {
            title: "What's this?",
                    body: '<div style="max-width: 1000px; width: 100%;"><div id="whatsthis-page">            \n\
            <p class="wtp">This map was created by <strong><a href="https://openknowledgemaps.org" target="_blank" class="underline">Open Knowledge Maps</a></strong>. It presents you with a topical overview of research on                <strong><?php echo $query; ?></strong>. The map is based on 100 papers on the topic retrieved from <?php echo $service_name ?>. <?php echo $description; ?></p>\n\
<p class="intro_underline">This map was created on <?php echo (new DateTime($context->timestamp))->format("j M Y \a\t H:i") ?> with <a href="http://github.com/pkraker/Headstart" target="_blank">Headstart</a> and <?php echo $credit ?></p>      <h3>Cite this map</h3><p>Please cite this map as follows: <?php echo "Open Knowledge Maps (" . (new DateTime($context->timestamp))->format('Y') . "). Overview of research on " . mb_strimwidth($query, 0, 100, "[..]") .". " . "Retrieved from " . '<a class="underline" target="_blank" href="' . $canonical_url . '">' . $canonical_url . '</a>'.  "/ [" . date ("d M Y") . "]."; ?>     \n\
<h3>Get in touch</h3><p>For more information and to view this map on Open Knowledge Maps, please <strong><a href="<?php echo $canonical_url; ?>" target="_blank" class="underline">click here</a></strong>. If you have questions or feedback, please send an e-mail to <a class="underline" href="mailto:info@openknowledgemaps.org">info@openknowledgemaps.org</a>.</p> \n\
<a href="<?php echo $canonical_url; ?>" target="_blank"><img style="border: 2px solid #f6f6f6;" src="./img/benefits-OKM/benefits-all3.png"></img>\n\
            <div style="text-align: center; margin: 0px 0px !important; background-color: #f6f6f6;"><img src="./img/okmaps-logo-round.png" style="height:30px; padding:0px;"></div></a></div></div>'
                }
</script>

<?php endif; ?>