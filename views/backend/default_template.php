<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <?php echo $_title; ?>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/alert/jquery.alerts.css" rel="stylesheet" />

        <?php echo $_meta; ?>
        <?php echo $_styles; ?>
        <?php echo $_scripts; ?>

        <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
        <!--[if lt IE 9]>
        <script src="assets/plugins/excanvas.min.js"></script>
        <script src="assets/plugins/respond.min.js"></script>  
        <![endif]-->   
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <!-- END CORE PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        
        <script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/alert/jquery.alerts.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/alert/elements.js"></script>

        <!-- END GLOBAL MANDATORY STYLES -->

<!--	<link rel="shortcut icon" href="<?php //echo base_url();      ?>favicon.ico" />-->
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <!-- BEGIN HEADER -->   
        <?php echo $header; ?>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->   
        <div class="page-container row-fluid">
            <!-- BEGIN SIDEBAR -->
            <?php echo $siderbar; ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->
            <div class="page-content">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div id="portlet-config" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button"></button>
                        <h3>portlet Settings</h3>
                    </div>
                    <div class="modal-body">
                        <p>Here will be a configuration form</p>
                    </div>
                </div>
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN STYLE CUSTOMIZER -->
<!--                             <div class="color-panel hidden-phone"> -->
<!--                                 <div class="color-mode-icons icon-color"></div> -->
<!--                                 <div class="color-mode-icons icon-color-close"></div> -->
<!--                                 <div class="color-mode"> -->
<!--                                     <p>THEME COLOR</p> -->
<!--                                     <ul class="inline"> -->
<!--                                         <li class="color-black current color-default" data-style="default"></li> -->
<!--                                         <li class="color-blue" data-style="blue"></li> -->
<!--                                         <li class="color-brown" data-style="brown"></li> -->
<!--                                         <li class="color-purple" data-style="purple"></li> -->
<!--                                         <li class="color-grey" data-style="grey"></li> -->
<!--                                         <li class="color-white color-light" data-style="light"></li> -->
<!--                                     </ul> -->
<!--                                     <label> -->
<!--                                         <span>Layout</span> -->
<!--                                         <select class="layout-option m-wrap small"> -->
<!--                                             <option value="fluid" selected>Fluid</option> -->
<!--                                             <option value="boxed">Boxed</option> -->
<!--                                         </select> -->
<!--                                     </label> -->
<!--                                     <label> -->
<!--                                         <span>Header</span> -->
<!--                                         <select class="header-option m-wrap small"> -->
<!--                                             <option value="fixed" selected>Fixed</option> -->
<!--                                             <option value="default">Default</option> -->
<!--                                         </select> -->
<!--                                     </label> -->
<!--                                     <label> -->
<!--                                         <span>Sidebar</span> -->
<!--                                         <select class="sidebar-option m-wrap small"> -->
<!--                                             <option value="fixed">Fixed</option> -->
<!--                                             <option value="default" selected>Default</option> -->
<!--                                         </select> -->
<!--                                     </label> -->
<!--                                     <label> -->
<!--                                         <span>Footer</span> -->
<!--                                         <select class="footer-option m-wrap small"> -->
<!--                                             <option value="fixed">Fixed</option> -->
<!--                                             <option value="default" selected>Default</option> -->
<!--                                         </select> -->
<!--                                     </label> -->
<!--                                 </div> -->
<!--                             </div> -->
                            <!-- END BEGIN STYLE CUSTOMIZER --> 
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <h3 class="page-title">
                                <?php echo $desption; ?> <small><?php echo $title; ?></small>
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <i class="icon-home"></i>
                                    <a href="<?php echo base_url().$this->uri->segment(1)?>"><?php echo strtoupper($this->uri->segment(1))?></a> 
                                    <i class="icon-angle-right"></i>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().$this->uri->segment(1)."/".$this->uri->segment(2)?>"><?php echo strtoupper($this->uri->segment(2))?></a>
                                    <i class="icon-angle"></i>
                                </li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <?php echo $content ?>
                    <!-- END PAGE CONTENT-->
                </div>
                <!-- END PAGE CONTAINER--> 
            </div>
            <!-- END PAGE -->    
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->   
        <script>
            jQuery(document).ready(function() {
                App.init();
            });
        function appen_error(array)
        {
            $('div.control-group').removeClass( "error" );
            $('span.help-block').html('');
            $.each(array, function(i,item){ 
                 $("[name="+i+"]").parent().parent().addClass('control-group error');
                 $("[name="+i+"]").next().html(item);
            });
        }   
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>