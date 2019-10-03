<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php
        include($COMPONENTS_PATH . 'head_graphvis.php');
        
        $id = (isset($_GET['id'])) ? ($_GET['id']) : ('');
        $protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https:' : 'http:';
        $url = $protocol . $HEADSTART_URL . "server/services/getLatestRevision.php?vis_id=$id";    
        ?>

        <!-- ##################################################################################### -->
        <!-- Please include these both scripts -->
        <script src="lib/graphVis/OKMapsGraphVis/gvfapi.js"></script>
        <script src="lib/graphVis/OKMapsGraphVis/OKMapsdataconverter.js"></script>
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
    <body>
    <!-- ##################################################################################### -->
    <!-- Please define your Iframe and include gvf.html as source file-->
    <div id="iframecontainer">
        <div class="graphVisIFrame" style="width: 100%; height: 100%; position: absolute; border:1px solid red;",>
            <iframe src="lib/graphVis/OKMapsGraphVis/gvf.html" style="width: 100%; height: 100%"></iframe>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------- -->

    <script>


            // ##################################################################################### 
            window.gvfapi = new GVFApi();
            // the event "initready" is fired once the appplication is ready  
            gvfapi.registerEvent("initready", function (d) {

                // define the url of logging server 
                var serverConfig = {
                    loggingServerUrl : "YOUR_LOGGING_SERVER_URL"
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

                var jqxhr = $.getJSON( filename, function(okmapNewdataToRender) {

                    okmapNewdataToRender.data = JSON.parse(okmapNewdataToRender.data);

                    // ##################################################################################### 
                    // Render the graphVis with new data as following
                    gvfapi.sendOKMapDataToGvf(okmapNewdataToRender);
                    //---------------------------------------------------------------------------------------
                })
    </script>


    </body>
</html>