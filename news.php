<?php include 'config.php'; ?>
<?php
    $ENTRIES_PER_PAGE = 10;

    function getElementsByClassName($document, $classname) {
        $finder = new DomXPath($document);
        return $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
    }
       
    function getArticleProperties($article) {
        global $SITE_URL;
        
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
                                            : ($SITE_URL . $src); 
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
    
    function getPageLink($paginated_nodes, $link, $link_text) {
        $new_node = $paginated_nodes->createElement("div");
        $new_node->setAttribute("class", "news-backlink");
        $backlink = $paginated_nodes->createElement("a", $link_text);
        $backlink->setAttribute("class", "underline");
        $backlink->setAttribute("href", $link);
        $new_node->appendChild($backlink);
        return $new_node;
    }
    
    function getPaginatedEntries($document, $page) {
        global $ENTRIES_PER_PAGE;
        
        $nodes = getElementsByClassName($document, "newscollection");
        $paginated_nodes = new DOMDocument('1.0', 'UTF-8');
        
        $page_nulled = $page - 1;
        $nodes_start = $page_nulled * $ENTRIES_PER_PAGE;
        $nodes_length = ($ENTRIES_PER_PAGE * $page < $nodes->count())
                            ? ($ENTRIES_PER_PAGE * $page)
                            : ($nodes->count());
        
        for ($i = $nodes_start; $i < $nodes_length; $i++) {
            $new_node = $nodes->item($i)->cloneNode(true);
            $imported_node = $paginated_nodes->importNode($new_node, true);
            
            if ($imported_node) {
                $paginated_nodes->appendChild($imported_node);
            }
        }
        
        if ($ENTRIES_PER_PAGE * $page < $nodes->count()) {
            $previous_articles = getPageLink($paginated_nodes, "news?page=".($page + 1), "<- Show previous articles");
            $paginated_nodes->appendChild($previous_articles);
        }
        
        if ($page !== 1) {
            $newer_articles = getPageLink($paginated_nodes, "news?page=".($page - 1), "Show newer articles ->");
            $paginated_nodes->appendChild($newer_articles);
        }
        
        
        return $paginated_nodes;
    }

    $document = new DOMDocument();
    @$document->loadHTMLFile($COMPONENTS_PATH . "newsentries.html");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
    if($page === null) {
        $page = 1;
    }
    
    $single_entry = $id !== null;
    $current_article = null;
    
    if($single_entry) {
        $current_article = $document->getElementById($id);
        $article_properties = getArticleProperties($current_article);
        
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
        $paginated_doc = getPaginatedEntries($document, $page);
    }
    
    ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
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
                    echo $paginated_doc->saveHTML();
                }
            ?>
        </div>



        <span class="anchor" id="newslettersignup"></span>
        <?php include($COMPONENTS_PATH . 'newsletter.php'); ?>
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>
