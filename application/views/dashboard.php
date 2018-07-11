<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MHU | Dashboard</title>
        <?php $this->load->view('common_css');?>
    </head>
    <body>
       <?php $this->load->view('header');?>
        <section id="main" data-layout="layout-1">
           <?php //$this->load->view('sidebar');?>
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Dashboard</h2>
                    </div>
                    <div class="mini-charts">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-cyan">
                                    <div class="clearfix">
                                        <div class="chart"><i class="zmdi zmdi-face zmdi-hc-fw c-white" style="font-size: 70px"></i></div>
                                        <div class="count">
                                            <h4 class="c-white">Child Under 19 Years</h4>
                                            <h2>4000</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-lightgreen">
                                    <div class="clearfix">
                                        <div class="chart"><i class="zmdi zmdi-female zmdi-hc-fw c-white" style="font-size: 70px"></i></div>
                                        <div class="count">
                                            <h4 class="c-white">Lactating Women</h4>
                                            <h2>11000</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-orange">
                                    <div class="clearfix">
                                        <div class="chart"><i class="zmdi zmdi-female zmdi-hc-fw c-white" style="font-size: 70px"></i></div>
                                        <div class="count">
                                            <h4 class="c-white">Pregnant Women</h4>
                                            <h2>9550</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-bluegray">
                                    <div class="clearfix">
                                        <div class="chart"><i class="zmdi zmdi-walk zmdi-hc-fw c-white" style="font-size: 70px"></i></div>
                                        <div class="count">
                                            <h4 class="c-white">Senior citizen above 60 years</h4>
                                            <h2>3500</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body card-padding">
                            <div id="bar-chart" class="flot-chart"></div>
                            <div class="flc-bar"></div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <?php $this->load->view('footer');?>
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>

        <?php $this->load->view('common_js');?>
     
    </body>
  </html>

