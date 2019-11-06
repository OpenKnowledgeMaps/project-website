<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html>
    <head>
        <base href="<?php echo $SITE_URL ?>">
        
        <?php
        include($COMPONENTS_PATH . 'head_graphvis.php');

        $vis_id = (isset($_GET['vis_id'])) ? ($_GET['vis_id']) : ('');
        $doc_id = (isset($_GET['doc_id'])) ? ($_GET['doc_id']) : ('');
        $search_term = (isset($_GET['search_term'])) ? ($_GET['search_term']) : ('');
        $protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https:' : 'http:';
        $url = $protocol . $HEADSTART_URL . "server/services/getLatestRevision.php?vis_id=$vis_id";
        
        $conceptgraph_title = "This concept graph is based on the knowledge map for "
                . "<a href=\"map/$vis_id\" target=\"_blank\">$search_term</a>";
        ?>

        <!-- ##################################################################################### -->
        <!-- Please include these both scripts -->
        <script src="lib/OKMapsGraphVis/gvfapi.js"></script>
        <script src="lib/OKMapsGraphVis/OKMapsdataconverter.js"></script>
        <!-- ------------------------------------------------------------------------------------- -->

        <style>
            html, body {
                height: 100%;
                margin: 0px;
                background-color: lightgray;
                min-width: 475px;
            }

            #iframecontainer {
                margin-top:10px; 
                position:relative;
                height: calc(100% - 73px);
                width: calc(100% - 2px);
            }

            .graphVisIFrame > iframe {
                width: 100%;
                height: 100%;
                position: absolute;
                border: 1px solid red;
            }
            .graphVisIFrame {
                width: 100%;
                height: 100%;
            }

            p {
                line-height: 8px;
                vertical-align: middle;
                padding-left: 10px;
            }
        </style>

    </head>
    <body class="conceptgraph-page">
        <?php include ($COMPONENTS_PATH . "browser_unsupported_banner_graphvis.php"); ?>
        <!-- ##################################################################################### -->
        <!-- Please define your Iframe and include gvf.html as source file-->
        <h2 class="conceptgraph-title">
            <?php echo $conceptgraph_title ?>
        </h2>
        <div id="iframecontainer">
            <div class="graphVisIFrame" style="width: 100%; height: 100%; position: absolute; border:1px solid red;">
                <iframe src="lib/OKMapsGraphVis/gvf.html" style="width: 100%; height: 100%"></iframe>
            </div>
        </div>

        <footer>
            <ul>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="imprint">Impressum - Legal Notice</a></li>
                <li><a href="index">back to Open Knowledge Maps</a></li>
            </ul>
        </footer>
        <!-- ------------------------------------------------------------------------------------- -->

        <script>


            // ##################################################################################### 
            window.gvfapi = new GVFApi();
            // the event "initready" is fired once the appplication is ready  
            gvfapi.registerEvent("initready", function (d) {

                // define the url of logging server 
                var serverConfig = {
                    loggingServerUrl: "<?php if (isset($GRAPHVIS_LOGGING_SERVER)) {
            echo $GRAPHVIS_LOGGING_SERVER;
        } ?>"
                }
                // the application is ready send your server-configuration to the logging-service 
                gvfapi.sendLoggingServerConfig(serverConfig);
            });
            //---------------------------------------------------------------------------------------

            var filename = encodeURI('<?php echo $url ?>&context=true');

            gvfapi.registerEvent("initready", function (d) {
                let okmapsData = {
                    data: [],
                    nodeType: "Document"
                }
                gvfapi.sendLoggingServerConfig("config");
            });

            var jqxhr = $.getJSON(filename, function (okmapNewdataToRender) {

                okmapNewdataToRender.data = JSON.parse(okmapNewdataToRender.data);

                let start_id = '<?php echo $doc_id ?>';

                if (start_id !== '') {
                    okmapNewdataToRender.startingNodeId = start_id;
                }

                // ##################################################################################### 
                // Render the graphVis with new data as following
                gvfapi.sendOKMapDataToGvf(okmapNewdataToRender);
                //---------------------------------------------------------------------------------------
            })
        </script>


    </body>
</html>