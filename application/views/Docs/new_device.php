<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Arkana" />
<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<!--     <link rel="icon" type="image/png" href="<?= base_url()?>/asset/api-docs/images/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url()?>/asset/api-docs/images/favicon-16x16.png" sizes="16x16" /> -->
     <!-- root -->

     <!-- Swagger -->
   <link href="<?= base_url('asset/api-docs/css/typography.css')?>" media='screen' rel='stylesheet' type='text/css'/>
    <link href="<?= base_url('asset/api-docs/css/screen.css')?>" media='screen' rel='stylesheet' type='text/css'/>
    <link href="<?= base_url('asset/api-docs/css/reset.css')?>" media='print' rel='stylesheet' type='text/css'/>
    <link href="<?= base_url('asset/api-docs/css/print.css')?>" media='print' rel='stylesheet' type='text/css'/>
    <link href="<?= base_url('asset/api-docs/css/3/theme-flattop.css')?>" media='print' rel='stylesheet' type='text/css'/> 
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/canvas/style.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/canvas/dark.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/font-icons.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/canvas/animate.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/magnific-popup.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/canvas/responsive.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/tabs.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/tabs2.css')?>" type="text/css" />

    

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
          width: 800px;
          max-height: 100% !important
      }

    </style>

  </head>

  <body class="swagger-section">
  <!-- <div id='header'> -->
      <section id="content">
          <div class="content-wrap">
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

                  <div class="row" style="margin-top: 3em"></div>
                  <div id="message-bar" class="swagger-ui-wrap" data-sw-translate>&nbsp;</div>

<!-- Title Start
============================================= -->
                  <div class="col-sm-12">
                      <div class="row" align="center" style="margin-bottom: 8em">

                          <h1>Arkademy API Library</h1>
                          <hr width="10%" style="border-color: #f37e00;border-width: 5px">

                      </div>
                  </div>
<!-- Title End
============================================= -->

                  <div class="clearfix"></div>
<!-- Tab Start
============================================= -->
                  <div  class="row col-sm-12">
                    <div class="col-xs-3"> 
                      <ul class="nav nav-tabs tabs-left tabs-left sideways">

                        <li class="active"><a href="#tab1" data-toggle="tab">New Device</a></li>
                        <li><a href="#tab2" data-toggle="tab">Device Management</a></li>
                        <li><a href="#tab3" data-toggle="tab">Miscellanous</a></li>
                        <li><a href="#tab4" data-toggle="tab">GPIO</a></li>
                        <li><a href="#tab5" data-toggle="tab">ADC</a></li>
                        <li><a href="#tab6" data-toggle="tab">SPI</a></li>
                        <li><a href="#tab7" data-toggle="tab">UART</a></li>
                        <li><a href="#tab8" data-toggle="tab">I2C</a></li>
                        <li><a href="#tab9" data-toggle="tab">PWM</a></li>
                        <li><a href="#tab10" data-toggle="tab">DHT</a></li>
                      
                      </ul>
                    </div>
<!-- Tab Content 
============================================ -->
                    <div class="col-xs-9">
                      <div class="tab-content">


                        <div class="tab-pane active" id="tab1">
                            <div class="row">
                                <h3 style="margin-bottom: 0px">New Device Registration</h3>
                                <h5 class="text-muted">Register Your New Device</h5>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="col-lg-3">
                                    <div id="swagui-register-device" style=";max-height: 40em" class="swagger-ui-wrap"></div>
                                    <br>
                                </div>        
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="row">
                                <h3>Device Management</h3>
                                <p><strong>Get, Add or Delete current permitted devices</strong></p>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="row">  
                                    <div id="swagui-devices" style="max-height: 40em" class="swagger-ui-wrap">
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="row">
                                <h3>MISCELLANOUS</h3>
                                <h5><strong>functions for generic or overall purposes</strong></h5>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="row">
                                  <div id="swagui-misc" style="max-height: 40em" class="swagger-ui-wrap"></div>
                                  <br>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <div class="row">
                                <h3>GPIO</h3>
                                <h5>functions for generic Input/Output of devices</h5>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="row">
                                    <div id="swagui-gpio" class="swagger-ui-wrap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab5">
                            <div class="row">
                                <h3>ADC</h3>
                                <h5>functions for generic Input/Output of devices</h5>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="row">
                                    <div id="swagui-adc" class="swagger-ui-wrap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab6">
                            <div class="row">
                                <h3>SPI</h3>
                                <h5>functions for generic Input/Output of devices</h5>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="row">
                                    <div id="swagui-spi" class="swagger-ui-wrap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab7">
                            <div class="row">
                                <h3>UART</h3>
                                <h5>functions for generic Input/Output of devices</h5>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="row">
                                    <div id="swagui-uart" class="swagger-ui-wrap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab8">
                            <div class="row">
                                <h3>I2C</h3>
                                <h5>functions for generic Input/Output of devices</h5>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="row">
                                    <div id="swagui-i2c" class="swagger-ui-wrap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab9">
                            <div class="row">
                                <h3>PWM</h3>
                                <h5>functions for generic Input/Output of devices</h5>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="row">
                                    <div id="swagui-pwm" class="swagger-ui-wrap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab10">
                            <div class="row">
                                <h3>DHT</h3>
                                <h5>functions for generic Input/Output of devices</h5>
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus. </p>
                                <hr width="100%" style="margin-bottom: 0px">
                                <div class="row">
                                    <div id="swagui-dht" class="swagger-ui-wrap"></div>
                                </div>
                            </div>
                        </div>


                      </div>
                    </div>
<!-- Tab Content End 
======================================== -->
                  </div>
<!-- Tab End 
======================================== -->

                  <div class="clearfix"></div>
                
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

        

        function getConfigDevice(params){
          return {
              url: 'http://13.228.33.195:3000/v0/docs/arkana'+params.tag,
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
              },
              onFailure: function(data) {
                log("Unable to Load SwaggerUI");
              },
              validatorUrl: null,
              docExpansion: "none",
              jsonEditor: false,
              defaultModelRendering: 'schema',
              showRequestHeaders: false
            };
        }

        function registerAuthListener(params){
          $(document).ready(function(){
            var key = $('#input_apiKey')[0].value;
            if(key && key.trim() != "") {
              params.swagobj.api.clientAuthorizations.add("auth_name", new SwaggerClient.ApiKeyAuthorization("Authorization", 'Bearer '+key, "header"));
            }
          });
          $('#input_apiKey').change(function() {
            var key = $('#input_apiKey')[0].value;
            if(key && key.trim() != "") {
              params.swagobj.api.clientAuthorizations.add("auth_name", new SwaggerClient.ApiKeyAuthorization("Authorization", 'Bearer '+key, "header"));
            }
          })
        }

        // window.swagui_all = new SwaggerUi(getConfigDevice({tag:'',domid:'swagui-all'}));
        // registerAuthListener({swagobj:swagui_all});
        // window.swagui_all.load();

        $(document).ready(function(){
          window.swagui_register_device = new SwaggerUi(getConfigDevice({tag:'/device/part/register',domid:'swagui-register-device'}));
          registerAuthListener({swagobj:swagui_register_device});
          window.swagui_register_device.load();

          window.swagui_device = new SwaggerUi(getConfigDevice({tag:'/device/part/device',domid:'swagui-devices'}));
          registerAuthListener({swagobj:swagui_device});
          window.swagui_device.load();

          
          window.swagui_misc = new SwaggerUi(getConfigDevice({tag:'/IO/part/misc',domid:'swagui-misc'}));
          registerAuthListener({swagobj:swagui_misc});
          window.swagui_misc.load();

          window.swagui_gpio = new SwaggerUi(getConfigDevice({tag:'/IO/part/gpio',domid:'swagui-gpio'}));
          registerAuthListener({swagobj:swagui_gpio});
          window.swagui_gpio.load();

          window.swagui_adc = new SwaggerUi(getConfigDevice({tag:'/IO/part/adc',domid:'swagui-adc'}));
          registerAuthListener({swagobj:swagui_adc});
          window.swagui_adc.load();

          window.swagui_spi = new SwaggerUi(getConfigDevice({tag:'/IO/part/spi',domid:'swagui-spi'}));
          registerAuthListener({swagobj:swagui_spi});
          window.swagui_spi.load();

          window.swagui_uart = new SwaggerUi(getConfigDevice({tag:'/IO/part/uart',domid:'swagui-uart'}));
          registerAuthListener({swagobj:swagui_uart});
          window.swagui_uart.load();
          
          window.swagui_i2c = new SwaggerUi(getConfigDevice({tag:'/IO/part/i2c',domid:'swagui-i2c'}));
          registerAuthListener({swagobj:swagui_i2c});
          window.swagui_i2c.load();

          window.swagui_pwm = new SwaggerUi(getConfigDevice({tag:'/IO/part/pwm',domid:'swagui-pwm'}));
          registerAuthListener({swagobj:swagui_pwm});
          window.swagui_pwm.load();

          window.swagui_dht = new SwaggerUi(getConfigDevice({tag:'/IO/part/dht',domid:'swagui-dht'}));
          registerAuthListener({swagobj:swagui_dht});
          window.swagui_dht.load();
        });
        
    });
    </script>
  </body>
</html>
