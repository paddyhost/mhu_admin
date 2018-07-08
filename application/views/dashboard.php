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

