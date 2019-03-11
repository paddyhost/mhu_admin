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
        <div class="card-body card-padding" style="padding: 10px 16px; overflow-x: scroll;">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 p-0">
                    <label class="col-md-4 col-sm-4 col-xs-12 m-t-5 text-right">Add No of Rows.</label>
                    <div class="col-md-2 col-sm-2 col-xs-12 p-0">
                        <div class="form-group fg-line"  style="margin-bottom: 10px; ">
                            <input type="text" class="form-control input-mask " name="patient_num_rows" id="patient_num_rows" data-mask="00" placeholder="">
                        </div>   
                    </div>
                    <label class="col-md-2 col-sm-2 col-xs-12 m-t-5 text-right">Phase.</label>
                    <div class="col-md-2 col-sm-2 col-xs-12 p-0">
                        <div class="form-group fg-line"  style="margin-bottom: 10px; ">
                            <input type="text" class="form-control input-mask " name="patient_num_rows_phase" id="patient_num_rows_phase" data-mask="00" placeholder="">
                        </div>   
                    </div>
                    <div class="actions pull-right m-r-15">    
                        <button name ="patient_add_rows" id="patient_add_rows" load-url="<?php echo site_url("patient/ajax_add_multiple_patient") ?>" class="btn bgm-green waves-effect" ><span class="go-btn">Add</span></button>
                    </div>
                </div>
            </div>
            <form id="patient_add_multiple_form" method="post">
                <table class="table m-t-15 patient_multiple_table table-striped" style="margin-bottom: 10px; width: 3500px; max-width: 2500px;"> 
                    <thead> 
                        <tr> 
                            <th>Reg. Date</th> 
                            <th>Name</th> 
                            <th>DOB</th>
                            <th>Age</th> 
                            <th>Gender</th> 
                            <th>Category</th> 
                            <th>Mobile</th>
                            <th>State</th>
                            <th>District</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>Location</th>
                            <th>Symptom 1</th>
                            <th>Symptom 2</th>
                            <th>Disease</th>
                            <th>Patient ID</th>
                            <th>Phase</th>
                            <th style="text-align: right;">action</th>                                            
                        </tr> 
                    </thead> 
                    <tbody id="patient_multiple"> 
                        <?php
                        $data = array();
                        $data["total_rows"] = 1;
                        if ($csv_upload != "") {
                            $csv = array_map('str_getcsv', file(base_url("assets/patient_csv") . "/" . $csv_upload));

                            for ($i = 1; $i < count($csv); $i++) {
                                $data['unique_id'] = $csv[$i][0];
                                $data['regitrationdate'] = $csv[$i][1];
                                $data['fname'] = $csv[$i][2];
                                $data['dob'] = $csv[$i][3];
                                $data['age'] = $csv[$i][4];
                                $data['gender'] = $csv[$i][5];
                                $data['patient_category'] = $csv[$i][6];
                                $data['mobile'] = $csv[$i][7];
                                $data['state'] = $csv[$i][8];
                                $data['district'] = $csv[$i][9];
                                $data['city'] = $csv[$i][10];
                                $data['area'] = $csv[$i][11];
                                $data['location'] = $csv[$i][12];
                                $data['sympyom1'] = $csv[$i][13];
                                $data['sympyom2'] = $csv[$i][14];
                                $data['disease_diagnosed'] = $csv[$i][15];
                                $data['pid'] = $csv[$i][16];
                                $data['phase'] = $csv[$i][17];
                                $data['i'] = $i;
                                
                                $this->load->view('ajax_add_multiple_patient', $data);
                            }
                        } else {
                                $this->load->view('ajax_add_multiple_patient', $data);
                        }
                        ?> 
                    </tbody> 
                </table> 
                <div class="cleafix"></div>
                <?php if ($this->uri->segment(3) == "") {
                    ?>
                    <div class="row p-15" style="overflow: hidden"> 
                        <a class="btn btn-success waves-effect pull-right" load-url="<?php echo site_url("patient/insert_multiple") ?>" id="insert_multiple">Submit</a>
                        <button class="pull-right m-r-10 btn btn-default waves-effect" id="sam_clear_button" type="reset" >Clear</button>
                    </div>  
                <?php } else {
                    ?>
                    <div class="row p-15" style="overflow: hidden"> 
                        <button type="button" class="btn btn-success waves-effect pull-right"
                                load-url="<?php echo site_url("patient/insert_multiple") ?>" 
                                id="insert_multiple">Submit</button>
                    </div>
                <?php } ?>
            </form>
        </div><!--/card-body-->
    </div><!--question setting-->

    <!-- </div> -->
</section>
</section>
</body>
<?php $this->load->view('footer'); ?>
<?php $this->load->view('common_js'); ?>
<script src="/assets/js/import_patient.js" type="text/javascript"></script>      