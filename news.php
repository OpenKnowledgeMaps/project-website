<?php include 'config.php'; ?>
<?php
    function getElementsByClassName($document, $classname) {
        $finder = new DomXPath($document);
        return $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
    }
    
    function getArticleProperties($article) {
        global $SITE_URL;
        $protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https:' : 'http:';
        
        $property_array = array();
        
        $date = trim($article->getElementsByTagName("time")->item(0)->getAttribute("datetime"));
        $date_array = explode("-", $date);
        
        $property_array["year"] = $date_array[0];
        $property_array["month"] = $date_array[1];
        $property_array["day"] = $date_array[2];

        $property_array["title"] = trim($article->getElementsByTagName("h3")->item(0)->textContent);
        
        $images = $article->getElementsByTagName("img");
        if($images->length > 0) {
            $src = $images->item(0)->getAttribute("src");
            $property_array["image"] = (substr($src, 0, 4) === "http")
                                            ? ($src)
                                            : ($protocol . $SITE_URL . $src); 
        } else {
            $property_array["image"] = "";
        }
        
        $property_array["description"] = trim($article->getElementsByTagName("p")->item(0)->textContent);
        
        return $property_array;
    }

    function addLinksToTitles($document) {
        $nodes = getElementsByClassName($document, "newscollection");

        foreach($nodes as $article) {

            $cur_id = $article->getAttribute("id");
            $property_array = getArticleProperties($article);
            
            $new_link = $document->createElement("a");
            $new_link->setAttribute("href", "news/"
                    . $property_array["year"] . "/" 
                    . $property_array["month"] . "/"
                    . $property_array["day"] . "/" 
                    . $cur_id);
            $new_link->setAttribute("class", "newstitle-link");
            
            $title = $article->getElementsByTagName("h3")->item(0);
            $title->parentNode->replaceChild($new_link, $title);
            $new_link->appendChild($title);

        }
    }

    $document = new DOMDocument();
    @$document->loadHTMLFile($COMPONENTS_PATH . "newsentries.html");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $year = filter_input(INPUT_GET, 'year', FILTER_SANITIZE_NUMBER_INT);
    $month = filter_input(INPUT_GET, 'month', FILTER_SANITIZE_NUMBER_INT);
    $day = filter_input(INPUT_GET, 'day', FILTER_SANITIZE_NUMBER_INT);
  
    $current_article = $document->getElementById($id);
    $single_entry = ($id !== null && $current_article !== null);
    
    if($single_entry) {
        $current_article = $document->getElementById($id);
        $article_properties = getArticleProperties($current_article);
        if($year === null || $month === null || $day === null) {
            try {
                @header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "/"
                        . $article_properties["year"] . "/" . $article_properties["month"]
                        . "/" . $article_properties["day"] . "/" . $id);
            } catch (Exception $e) {
                error_log("Failed rewriting header of single news article. Please remove newlines at the end of your config.php.");
            }
        }
        
        $backlink_div = $document->createElement("div");
        $backlink_div->setAttribute("class", "news-backlink");
        $backlink = $document->createElement("a", "Show all news items");
        $backlink->setAttribute("class", "underline");
        $backlink->setAttribute("href", "news");
        $backlink_div->appendChild($backlink);
        $current_article->appendChild($backlink_div);
        
        $override_labels = array(
            "title" => htmlspecialchars($article_properties["title"], ENT_QUOTES) . " - Open Knowledge Maps"
            , "description" => htmlspecialchars($article_properties["description"], ENT_QUOTES)
        );
        
        if($article_properties["image"] !== "") {
            $override_labels["twitter-type"] = "summary_large_image";
            $override_labels["twitter-image"] = $article_properties["image"];
            $override_labels["fb-image"] = $article_properties["image"];
        }
    } else {
        addLinksToTitles($document);
    }
    
    ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <script>
            //Replace old-style hash news entry designations
            let article_id = location.hash.replace('#', '');
            if(article_id !== '') {
                location.replace(location.protocol + '//' 
                            + location.host + location.pathname 
                            + '?id=' + article_id);
            }
        </script>
        
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "News - Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>
    </head>
    <body class="updates">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="news"> 
            <div class="background2">
                <div class="team">
                    <?php if($single_entry): ?>
                    <a href="news" class="newstitle-link">
                    <?php endif ?>
                    <h2 style="color: #2d3e52;">News</h2>
                    <?php if($single_entry): ?>
                    </a>
                    <?php endif ?>
                    <p>You can <a target="_blank" class="underline" href="http://eepurl.com/dvQeGP">sign up for our Newsletter</a> 
                        to receive regular updates. You can also 
                        <a class="underline" href="https://twitter.com/ok_maps" target="_blank">follow us on Twitter</a> and <a class="underline" href="https://facebook.com/OKMaps" target="_blank">Facebook</a>.
                    </p>
                </div>
            </div>
            <?php
            
                if($single_entry) {
                    echo $document->saveHTML($current_article);
                    
                } else {
                    echo $document->saveHTML();
                }
            ?>
        </div>



        <span class="anchor" id="newslettersignup"></span>
        <?php include($COMPONENTS_PATH . 'newsletter.php'); ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>
