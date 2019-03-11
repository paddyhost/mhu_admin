<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RMP / Patient Card</title>
    <?php $this->load->view('common_css'); ?>
    <style>
    .error{
        outline: 0;
        border-width: 0 0 1px;
        border-color: red
    }
    .error_sel{
        border-bottom: 1px solid red;
    }
    </style>
</head>
<body>
    <?php $this->load->view('header'); ?>
    <section id="main" data-layout="layout-1">
        <?php //$this->load->view('sidebar'); ?>
        <section id="content">
            <!-- <div class="container"> -->

    <div class="card">
        <div class="card-body card-padding" style="padding: 10px 16px">
            <div class="row">
                <h4 style="text-align:center; color:red">The selected CSV file is not in correct format </h4>
            </div>
            
        </div><!--/card-body-->
    </div><!--question setting-->

    <!-- </div> -->
</section>
</section>
</body>

<?php $this->load->view('common_js'); ?>
<?php $this->load->view('footer'); ?>
<script src="/assets/js/import_patient.js" type="text/javascript"></script>      