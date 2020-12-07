<form id="searchform" action="#" method="POST" class="mittig2" target="_blank">
    <div style="text-align: left;">
        <p class="library">
            <label class="radio-inline"><input type="radio" name="optradio" value="pubmed" <?php if ($default_lib == "pubmed") echo 'checked="checked"'; ?> <?php if ($PUBMED_DOWN == true) echo 'disabled'; ?>>
                <span class="bold"<?php if ($PUBMED_DOWN == true) echo 'greyed_out'; ?>">PubMed</span> <span class="<?php if ($PUBMED_DOWN == true) echo 'greyed_out'; ?>">(life sciences)</span>
                <?php if ($PUBMED_DOWN == true) echo ' <span class="error-message"> Undergoing downtime - please try again later!</span>'; ?>
                <!--<a href="#" data-toggle="popover" title="PubMed" data-content="Comprises more 
                                        than 26 million citations for biomedical literature from MEDLINE, life science 
                                        journals, and online books. Citations may include links to full-text content from 
                                        PubMed Central and publisher web sites."><i class="fa fa-info-circle source-info" aria-hidden="true"></i></a>--></label>

        <?php if($DOAJ_FALLBACK): ?>
            <label class="radio-inline"><input type="radio" name="optradio" value="doaj" <?php if ($default_lib == "doaj") echo 'checked="checked"'; ?>>
            <span class="bold">DOAJ</span> (all disciplines, only open access)</label>
        <?php endif; ?>

            <label class="radio-inline"><input type="radio" name="optradio" value="base" 
                <?php if ($default_lib == "base") echo 'checked="checked"'; ?> <?php if ($BASE_DOWN == true) echo 'disabled'; ?>
            >
                <span class="bold <?php if ($BASE_DOWN == true) echo 'greyed_out'; ?>">BASE</span> <span class="<?php if ($BASE_DOWN == true) echo 'greyed_out'; ?>">(all disciplines)</span>
                <?php if ($BASE_DOWN == true) echo ' <span class="error-message"> Undergoing downtime - please try again later!</span>'; ?>
                    <!--<a href="#" data-toggle="popover" title="Bielefeld Academic Search Engine 
                                          (BASE)" data-content="Provides access to over 100 million documents from 
                                          more than 5,200 content sources in all disciplines."><i class="fa fa-info-circle source-info" aria-hidden="true"></i></a>--></label>
        </p>

        <!--<p class="library">
            <span class="library-choice">Refine your search:</span></p>-->
        <div id="filter-container"></div>

        <!--<label for="q">Search term:</label> -->
        <!--<div class="bg-div">-->

            <span id="base-language-selector-container" style="display:none"></span>
                <input type="text" name="q" size="89" required class="text-field" 
                    id="searchterm" placeholder="Enter your search term" spellcheck="true" 
                    value="<?php echo (isset($search_query)?($search_query):("")) ?>">
                <button type="submit" class="submit-btn">GO</button>

        <!--</div>-->
        <!--<div class="filter-btn" style="display: inline-block"><a href="#" id="submit-btn" class="frontend-btn">Submit</a></div>-->
    </div>
        <p class="try-out-maps">Try out: 
            <span class="map-examples base">
                <a class="underline" target="_blank" href="./map/530133cf1768e6606f63c641a1a96768">digital education</a>
                <a class="underline" target="_blank" href="./map/b56644312705917c3426967928bf2477">"climate change" AND impact</a> 
            </span>
            <span class="map-examples pubmed" style="display:none">
                <a class="underline" target="_blank" href="./map/9c13731dc8cd3de25b4eb29cd8c55244">covid-19</a> 
                <a class="underline" target="_blank" href="./map/96a8f56b533aac696e9f3ea67713ed0a">"climate change"</a>
            </span>
        </p>
</form>

<script src="./js/search_form.js"></script>