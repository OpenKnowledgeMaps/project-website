<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php
        include($COMPONENTS_PATH . 'head_graphvis.php');

        $vis_id = (isset($_GET['vis_id'])) ? ($_GET['vis_id']) : ('');
        $doc_id = (isset($_GET['doc_id'])) ? ($_GET['doc_id']) : ('');
        $protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https:' : 'http:';
        $url = $protocol . $HEADSTART_URL . "server/services/getLatestRevision.php?vis_id=$vis_id";
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
            }

            #iframecontainer {
                margin-top:10px; 
                position:relative;
                height: calc(100% - 35px);
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
        <!-- ##################################################################################### -->
        <!-- Please define your Iframe and include gvf.html as source file-->
        <h2 class="conceptgraph-title">
            This concept Graph is based on 
            <span>)insert title of paper(</span> OR 
            <span>the top 10 papers of the knowledge map for )insert title of map(</span>
        </h2>
        <div id="iframecontainer">
            <div class="graphVisIFrame" style="width: 100%; height: 100%; position: absolute; border:1px solid red;">
                <iframe src="lib/OKMapsGraphVis/gvf.html" style="width: 100%; height: 100%"></iframe>
            </div>
        </div>

        <footer>
            <ul>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Impressum</a></li>
                <li><a href="https://openknowledgemaps.org/">back to Open Knowledge Maps</a></li>
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