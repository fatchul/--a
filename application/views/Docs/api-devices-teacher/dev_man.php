
<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>

     <!-- Swagger -->
    <link href="<?= base_url('asset/api-docs/css/typography.css')?>" media='screen' rel='stylesheet' type='text/css'/>
    <link href="<?= base_url('asset/api-docs/css/screen.css')?>" media='screen' rel='stylesheet' type='text/css'/>
    <link href="<?= base_url('asset/api-docs/css/reset.css')?>" media='print' rel='stylesheet' type='text/css'/>
    <link href="<?= base_url('asset/api-docs/css/print.css')?>" media='print' rel='stylesheet' type='text/css'/>
    <link href="<?= base_url('asset/api-docs/css/3/theme-flattop.css')?>" media='print' rel='stylesheet' type='text/css'/> 

    

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Arkana Documentations</title>

    <style>
      
      .total-wrapper > header,
      .editor.pane,
      .ui-splitbar,
      [tooltip-popup],
      .jump-to-yaml {
          display: none !important;
      }

      .preview.pane {
          position: fixed;
          left: 0 !important;
          top: 0 !important;
          right: 0 !important;
          width: 100% !important;
          height: 100% !important;
      }

      .endpoints {
          width: 58em;
          max-height: 100% !important;
          padding-left: 0px
      }

      .footer {
          padding-left: 1em !important
      }

      .footer > h4 {
          margin-bottom: 0px !important;
          font-size: 1em !important
      }

      .well > .swagger-ui-wrap > .container > ul {
          margin-bottom: 0px !important;
          padding-left: 1em !important
      }

      .container > .authorize-wrapper {
          margin-bottom: 0px !important;
          margin-top: 0px !important
      }


     ul > li > .toggleEndpointList {
          border: 2px solid #999999;
          background-color: transparent;
          color: #333;
          line-height: 15px;
          font-weight: 600;
          text-shadow: none;
          padding: 0px 14px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 11px;
          cursor: pointer;
      }

      ul > li > .collapseResource {
          border: 2px solid #999999;
          background-color: transparent;
          color: #333;
          line-height: 15px;
          font-weight: 600;
          text-shadow: none;
          padding: 0px 14px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 11px;
          cursor: pointer;
      }

      ul > li > .expandResource {
          border: 2px solid #999999;
          background-color: transparent;
          color: #333;
          line-height: 15px;
          font-weight: 600;
          text-shadow: none;
          padding: 0px 14px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 11px;
          cursor: pointer;
      }

       
      .swagger-section .swagger-ui-wrap ul#resources li.resource div.heading ul.options li a:hover,
      .swagger-section .swagger-ui-wrap ul#resources li.resource div.heading ul.options li a:active,
      .swagger-section .swagger-ui-wrap ul#resources li.resource div.heading ul.options li a.active {
          border: 2px solid #f37e00;
          background-color: #f37e00;
          color: #fff;
          line-height: 15px;
          font-weight: 600;
          text-shadow: none;
          padding: 0px 14px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 11px;
          cursor: pointer;
      }

      .notice {
          padding: 0px;
          background-color: inherit;
          border-left: 0px
      }

      .signature-container >.snippet > .snippet_json > pre {
        display: inline-block;
      }


    </style>

<!-- section start
============================================= -->
    <section id="content" class="section swagger-section" style="padding-bottom: 0px">
      <div class="section content-wrap" style="padding: 40px">
        <div class="container clearfix">
          <div class="row">
            <div class="container">
   
<!-- Post Content
============================================= -->
                <div class="nobottommargin clearfix">

                  <div class="swagger-ui-wrap">
                      <form id='api_selector'>
                          <div class='input'>

                              <input placeholder="api token" id="input_apiKey" name="apiKey" type="hidden" value="<?=$token?>"/>
                          
                          </div>
                          <div id='auth_container'></div>
                      </form>
                  </div>

                  <div class="row" style="margin-top: 0px"></div>
                  

<!-- Title Start
============================================= -->
                  <div class="col-sm-12">
                      <div class="row" align="center" style="margin-bottom: 3em">
                          
                          <h1 style="margin-bottom: 0px">Arkademy API Library</h1>
                          <div id="message-bar" class="swagger-ui-wrap" data-sw-translate>&nbsp;</div>

                      </div>
                  </div>
<!-- Title End
============================================= -->

                  <div class="clearfix"></div>
<!-- Tab Start
============================================= -->
                  <div  class="row col-sm-12">
                    <div class="col-xs-3"> 
                     <!--  <ul class="nav nav-tabs tabs-left tabs-left sideways"> -->
                      <ul class="sidenav nav nav-pills nav-stacked">

                        <li><a href="<?= base_url('g/device/api/docs')?>">All</a></li>
                        <li class="active"><a href="<?= base_url('g/device/dev_man')?>">Device Management</a></li>
                        <li><a href="<?= base_url('g/device/misc')?>">Miscellanous</a></li>
                        <li><a href="<?= base_url('g/device/gpio')?>">GPIO</a></li>
                        <li><a href="<?= base_url('g/device/adc')?>">ADC</a></li>
                        <li><a href="<?= base_url('g/device/spi')?>">SPI</a></li>
                        <li><a href="<?= base_url('g/device/uart')?>">UART</a></li>
                        <li><a href="<?= base_url('g/device/i2c')?>">I2C</a></li>
                        <li><a href="<?= base_url('g/device/pwm')?>">PWM</a></li>
                        <li><a href="<?= base_url('g/device/dht')?>">DHT</a></li>
                      
                      </ul>
                    </div>
<!-- Tab Content 
============================================ -->
                    <div class="col-xs-9">
                        <div class="row">

                            <h3 style="margin-bottom: 0px">Device Management</h3>
                            <h5 class="text-muted">Get, Add or Delete current permitted devices</h5>
                            <hr width="10%" align="left" style="border-color: #f37e00;border-width: 5px">
                            <div class="well">  
                                <div id="swagui-devices" class="swagger-ui-wrap">
                                </div>
                            </div>
                            <!-- <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p> -->
                            

                        </div>
                    </div>
<!-- Tab Content End 
======================================== -->
                  </div>
<!-- Tab End 
======================================== -->

                  <div class="clearfix" style="margin-bottom: 5em"></div>
                
                </div>
            </div>
          </div>
        </div>
    </section>

      <!-- JS -->
    <script src='<?= base_url()?>/asset/api-docs/lib/object-assign-pollyfill.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/jquery-1.8.0.min.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/jquery.slideto.min.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/jquery.wiggle.min.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/jquery.ba-bbq.min.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/handlebars-4.0.5.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/lodash.min.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/backbone-min.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/swagger-ui.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/highlight.9.1.0.pack.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/highlight.9.1.0.pack_extended.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/jsoneditor.min.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/marked.js' type='text/javascript'></script>
    <script src='<?= base_url()?>/asset/api-docs/lib/swagger-oauth.js' type='text/javascript'></script>

        <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="<?= base_url()?>asset/js/canvas/jquery.js"></script>
    <script type="text/javascript" src="<?= base_url()?>asset/js/canvas/plugins.js"></script>


    <script type="text/javascript">
      
      $(function () {
        var swaggerUi;

        hljs.configure({
          highlightSizeThreshold: 5000
        });

        // Pre load translate...
        if(window.SwaggerTranslator) {
          window.SwaggerTranslator.translate();
        }

        function log() {
          if ('console' in window) {
            console.log.apply(console, arguments);
          }
        }

        function addAuthorization(){
            var key = $('#input_apiKey')[0].value;
            if(key && key.trim() != "") {
               swaggerUi.api.clientAuthorizations.add("auth_name", new window.SwaggerClient.ApiKeyAuthorization("Authorization", "Bearer " + key, "header"));

            }
          }

        

        function getConfigDevice(params){
          return {
              url: 'http://api.arkademy.com:3000/v0/docs/arkana'+params.tag,
              dom_id: params.domid,
              supportedSubmitMethods: ['get', 'post', 'put', 'delete', 'patch'],
              onComplete: function(swaggerApi, swaggerUi){
                if(typeof initOAuth == "function") {
                  initOAuth({
                    clientId: "your-client-id",
                    clientSecret: "your-client-secret-if-required",
                    realm: "your-realms",
                    appName: "your-app-name",
                    scopeSeparator: " ",
                    additionalQueryStringParams: {}
                  });
                }

                if(window.SwaggerTranslator) {
                  window.SwaggerTranslator.translate();
                }
                addAuthorization();
              },
              onFailure: function(data) {
                log("Unable to Load SwaggerUI");
              },
              validatorUrl: null,
              docExpansion: "none",
              jsonEditor: false,
              defaultModelRendering: 'schema',
              showRequestHeaders: true
            };
        }

        
        swaggerUi = new SwaggerUi(getConfigDevice({tag:'/device/part/device',domid:'swagui-devices'}));
        swaggerUi.load();  
        addAuthorization();
        
        });
        
    
    </script>