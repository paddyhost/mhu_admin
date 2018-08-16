<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RMP / Patient Card</title>
    <?php $this->load->view('common_css'); ?>
</head>
<body>
    <?php $this->load->view('header'); ?>
    <section id="main" data-layout="layout-1">
        <?php //$this->load->view('sidebar'); ?>
        <section id="content">
            <div class="container">
                <div class="block-header">
                    <h2>Patient History</h2>
                </div>
                <?php if (!empty($patient)): ?>
                    <?php // print_r($patient); ?>
                    <div class="card m-b-20">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <h4>Patient Name : <?php echo ucwords($patient->fname . ' ' . $patient->lanme); ?></h4>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <h4>Reg. No. <?php echo (!empty($patient->registration_no)? $patient->registration_no : 'NA')?></h4>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select class="selectpicker" title="Select Visit" id="loadvisitinfo">
                                        <?php if (!empty($visit)): ?>
                                            <?php foreach ($visit as $key => $value): ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $key + 1 ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No visit available</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body card-padding row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-calendar-alt zmdi-hc-fw"></i>&nbsp;&nbsp;DOB</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($patient->dob)? date('d-M-Y',  strtotime($patient->dob)) : 'NA')?></p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-time zmdi-hc-fw"></i>&nbsp;&nbsp;Age</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">
                                        <?php if(!empty($patient->dob)){
                                            $d1 = new DateTime(date('Y-m-d'));
                                            $d2 = new DateTime(date('Y-m-d',  strtotime($patient->dob)));
                                            $diff = $d2->diff($d1);
                                            echo $diff->y.' Yrs.';
                                        }else {
                                            echo 'NA';
                                        };?></p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-account-box-o zmdi-hc-fw"></i>&nbsp;&nbsp;Patient Category</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">
                                        <?php 
                                            $patient_category = ['PW'=>'Pregnant Women', 'LW'=>'Lactating Women', 'C'=>'Child below 5 yrs.', 'S'=>'Senor above 60 yrs.', NULL => 'NA' ,'O'=>'other'];
                                            echo (!empty($patient->patient_category)? $patient_category[$patient->patient_category] : 'NA');
                                        ?>
                                    </p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i>&nbsp;&nbsp;Date of Registration</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($patient->regitrationdate)? $patient->regitrationdate : 'NA')?></p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-pin-drop zmdi-hc-fw"></i>&nbsp;&nbsp;Name of Cluster/ Address</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($patient->address)? $patient->address.'&nbsp' : 'NA')?>
                                        <?php echo (!empty($patient->location)? $patient->location.'&nbsp' : 'NA');?>
                                        <?php echo (!empty($patient->area)? $patient->area.'&nbsp' : 'NA');?>
                                        <?php echo (!empty($patient->city)? $patient->city.'&nbsp' : 'NA');?>
                                        <?php echo (!empty($patient->district)? $patient->district.'&nbsp' : 'NA');?>
                                        <?php echo (!empty($patient->state)? $patient->state : 'NA');?>
                                        <!--Plot No.12, N-8, New Swami Vivekanand Hsg., Society, Cidco, Aurangabad-->
                                    </p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-smartphone-ring zmdi-hc-fw"></i>&nbsp;&nbsp;Mobile</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($patient->mobile)? $patient->mobile : 'NA')?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-l-0 m-r-0" id="loadinfo">
                        <p style="text-align: center">Please select from the drop down list to view detail information.</p>
                        <?php // $this->load->view('patientinfo');?>
                    </div> 
                <?php else: ?>
                    <h4>No records available</h4>
                <?php endif; ?>
            </div>
        </section>
    </section>
    <?php $this->load->view('footer'); ?>
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="preloader pls-blue">
            <svg class="pl-circular" viewBox="25 25 50 50">
            <circle class="plc-path" cx="50" cy="50" r="20" />
            </svg>

            <p>Please wait...</p>
        </div>
    </div>
    <?php $this->load->view('common_js'); ?>
    <!-- Data Table -->
    <script type="text/javascript">
        $(document).ready(function () {
            //Command Buttons
            $("#data-table-command").bootgrid({
                css: {
                    icon: 'zmdi icon',
                    iconColumns: 'zmdi-view-module',
                    iconDown: 'zmdi-expand-more',
                    iconRefresh: 'zmdi-refresh',
                    iconUp: 'zmdi-expand-less'
                },
                formatters: {
                    "commands": function (column, row) {
                        return "<button type=\"button\" class=\"btn btn-primary btn-xs waves-effect\" data-row-id=\"" + row.id + "\">View</button> ";
                    }
                }
            });
        });

            $(document).on('change','#loadvisitinfo',function(){
                var id= $(this).val();
                if(id){
                    var url = '/admin/getpatientbyvisit' ;
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        async: false,
                        type: 'POST',
                        data: {id:id},
                        success: function (response) {
                            $('#loadinfo').empty().html(response.view);
                        }
                    });
                }
                
            });
    </script>
</body>
</html>

