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
                                <div class="col-md-3 col-sm-3 col-xs-12">
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
                                <div class="col-md-1 col-sm-1 col-xs-12 text-right">
                                    <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#modalGeninfo">Edit</button>
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
    
    <!--Edit Modal-->
    
    <!--Modal General info-->
    <div class="modal fade" id="modalGeninfo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">General Information</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Patient Name</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" class="form-control" value="Prasad Gote">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>DOB</label>
                            <div class="input-group form-group">
                                <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container fg-line">
                                    <input type='text' name='dob' id="dob" class="form-control date-picker" placeholder="DOB" value="27/11/1990">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Age</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" class="form-control" value="49yrs">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Patient Category</label>
                            <div class="form-group">
                                <select class="selectpicker">
                                    <option selected>Child below 5 yrs.</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Date of Registration</label>
                            <div class="input-group form-group">
                                <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container fg-line">
                                    <input type='text' name='dob' id="dob" class="form-control date-picker" placeholder="DOB" value="18/11/2018">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>State</label>
                            <div class="form-group">
                                <select class="selectpicker">
                                    <option selected>Utttar Pradesh</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>District</label>
                            <div class="form-group">
                                <select class="selectpicker">
                                    <option selected>Gaziabad</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>City</label>
                            <div class="form-group">
                                <select class="selectpicker">
                                    <option selected>Gaziabad</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Area</label>
                            <div class="form-group">
                                <select class="selectpicker">
                                    <option selected>Gaziabad</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Location</label>
                            <div class="form-group">
                                <select class="selectpicker">
                                    <option selected>Gaziabad</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalMedicalcondition" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Medical Condition</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Symptom 1</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" class="form-control" value="Symptom">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Symptom 2</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" class="form-control" value="Symptom">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Select Diagnosed Disease</label>
                            <div class="form-group">
                                <select class="selectpicker">
                                    <option selected>Maleria</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>MEDICINE NAME</th>
                                <th>FREQUENCY</th>
                                <th>DAYS</th>
                                <th>BEFORE OR AFTER MEAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option selected>OMECAP CAP(B15)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option selected>Once a day</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="text" class="form-control" value="3">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="radio radio-inline m-t-15">
                                            <input type="radio" name="aftermeal" value="No" checked="checked">
                                            <i class="input-helper"></i>
                                            Before
                                        </label>
                                        <label class="radio radio-inline m-t-15">
                                            <input type="radio" name="aftermeal" value="Yes">
                                            <i class="input-helper"></i>
                                            After
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option selected>OMECAP CAP(B15)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option selected>Once a day</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="text" class="form-control" value="3">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="radio radio-inline m-t-15">
                                            <input type="radio" name="aftermeal" value="No" checked="checked">
                                            <i class="input-helper"></i>
                                            Before
                                        </label>
                                        <label class="radio radio-inline m-t-15">
                                            <input type="radio" name="aftermeal" value="Yes">
                                            <i class="input-helper"></i>
                                            After
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option selected>OMECAP CAP(B15)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option selected>Once a day</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="text" class="form-control" value="3">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="radio radio-inline m-t-15">
                                            <input type="radio" name="aftermeal" value="No" checked="checked">
                                            <i class="input-helper"></i>
                                            Before
                                        </label>
                                        <label class="radio radio-inline m-t-15">
                                            <input type="radio" name="aftermeal" value="Yes">
                                            <i class="input-helper"></i>
                                            After
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option selected>OMECAP CAP(B15)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option selected>Once a day</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="text" class="form-control" value="3">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="radio radio-inline m-t-15">
                                            <input type="radio" name="aftermeal" value="No" checked="checked">
                                            <i class="input-helper"></i>
                                            Before
                                        </label>
                                        <label class="radio radio-inline m-t-15">
                                            <input type="radio" name="aftermeal" value="Yes">
                                            <i class="input-helper"></i>
                                            After
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--Modal Vital information-->
    <div class="modal fade" id="modalVitalinfo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Vital Information</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Height</label>
                                <div class="fg-line">
                                    <input type="text" class="form-control" value="174cm">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Weight</label>
                                <div class="fg-line">
                                    <input type="text" class="form-control" value="75Kg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Bp</label>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="text" class="form-control" value="120">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input type="text" class="form-control" value="80">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Temperature</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" class="form-control" value="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Respiration</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" class="form-control" value="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Vaccination record-->
    <div class="modal fade" id="modalVaccinationRecord" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Vaccination Record</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="checkbox m-b-15">
                                    <label>
                                        <input name="vaccination[]" value="dpt" type="checkbox" checked="">
                                        <i class="input-helper"></i>
                                        DPT
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="checkbox m-b-15">
                                    <label>
                                        <input name="vaccination[]" value="bcg" type="checkbox" checked="">
                                        <i class="input-helper"></i>
                                        BCG
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="checkbox m-b-15">
                                    <label>
                                        <input name="vaccination[]" value="measles" type="checkbox">
                                        <i class="input-helper"></i>
                                        Measles
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="checkbox m-b-15">
                                    <label>
                                        <input name="vaccination[]" value="opv" type="checkbox">
                                        <i class="input-helper"></i>
                                        OPV
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="checkbox m-b-15">
                                    <label>
                                        <input name="vaccination[]" value="hepatitis" type="checkbox">
                                        <i class="input-helper"></i>
                                        Hepatitis B
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="checkbox m-b-15">
                                    <label>
                                        <input name="vaccination[]" value="ttt" type="checkbox">
                                        <i class="input-helper"></i>
                                        TTT
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" name="other" class="form-control required" placeholder="Other">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Test by mhu-->
    <div class="modal fade" id="modalTestMhu" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Test Conducted By MHU</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-group m-l-15 m-r-15" data-collapse-color="cyan" id="accordionTest" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel1" aria-expanded="false" class="collapsed">
                                        Complete Blood Count (CBC)/ Homogram (Hgm)        </a>
                                </h4>
                            </div>
                            <div id="panel1" class="m-t-15 collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>CBB/ Hgm</label>
                                                <div class="fg-line">
                                                    <input name="test[1][1]" type="text" class="form-control" value=""> <!--1-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Hb </label>
                                                <div class="fg-line">
                                                    <input name="test[1][2]" type="text" class="form-control" value=""> <!--2-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>TLC</label>
                                                <div class="fg-line">
                                                    <input name="test[1][3]" type="text" class="form-control" value=""> <!--3-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>DLC</label>
                                                <div class="fg-line">
                                                    <input name="test[1][4]" type="text" class="form-control" value=""> <!--4-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>PCV</label>
                                                <div class="fg-line">
                                                    <input name="test[1][5]" type="text" class="form-control" value=""> <!--5-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>RBC count </label>
                                                <div class="fg-line">
                                                    <input name="test[1][6]" type="text" class="form-control" value=""> <!--6-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Platelet count</label>
                                                <div class="fg-line">
                                                    <input name="test[1][7]" type="text" class="form-control" value=""> <!--7-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>MCV/MCH/MCHC</label>
                                                <div class="fg-line">
                                                    <input name="test[1][8]" type="text" class="form-control" value=""> <!--8-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>ESR</label>
                                                <div class="fg-line">
                                                    <input name="test[1][9]" type="text" class="form-control" value=""> <!--9-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>AEC</label>
                                                <div class="fg-line">
                                                    <input name="test[1][10]" type="text" class="form-control" value=""> <!--10-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel2" aria-expanded="false" class="collapsed">
                                        Liver Function Test (LFT)        </a>
                                </h4>
                            </div>
                            <div id="panel2" class="m-t-15 collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>D Bil</label>
                                                <div class="fg-line">
                                                    <input name="test[2][11]" type="text" class="form-control" value=""> <!--11-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>ID Bil</label>
                                                <div class="fg-line">
                                                    <input name="test[2][12]" type="text" class="form-control" value=""> <!--12-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>T - Bil</label>
                                                <div class="fg-line">
                                                    <input name="test[2][13]" type="text" class="form-control" value=""> <!--13-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>T-Prot</label>
                                                <div class="fg-line">
                                                    <input name="test[2][14]" type="text" class="form-control" value=""> <!--14-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>A/G Rat</label>
                                                <div class="fg-line">
                                                    <input name="test[2][15]" type="text" class="form-control" value=""> <!--15-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>ALT</label>
                                                <div class="fg-line">
                                                    <input name="test[2][16]" type="text" class="form-control" value=""> <!--16-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>AST</label>
                                                <div class="fg-line">
                                                    <input name="test[2][17]" type="text" class="form-control" value=""> <!--17-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>ALP</label>
                                                <div class="fg-line">
                                                    <input name="test[2][18]" type="text" class="form-control" value=""> <!--18-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label> Comp. LFT</label>
                                                <div class="fg-line">
                                                    <input name="test[2][19]" type="text" class="form-control" value=""> <!--19-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>GGT</label>
                                                <div class="fg-line">
                                                    <input name="test[2][20]" type="text" class="form-control" value=""> <!--20-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Alb</label>
                                                <div class="fg-line">
                                                    <input name="test[2][21]" type="text" class="form-control" value=""> <!--21-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel3" aria-expanded="false" class="collapsed">
                                        Kidney Function Test        </a>
                                </h4>
                            </div>
                            <div id="panel3" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Urea</label>
                                                <div class="fg-line">
                                                    <input name="test[3][22]" type="text" class="form-control" value=""> <!--22-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Creat.</label>
                                                <div class="fg-line">
                                                    <input name="test[3][23]" type="text" class="form-control" value=""> <!--23-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Uric Acid</label>
                                                <div class="fg-line">
                                                    <input name="test[3][24]" type="text" class="form-control" value=""> <!--24-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Electrolyte (Na, K. Cl)</label>
                                                <div class="fg-line">
                                                    <input name="test[3][25]" type="text" class="form-control" value=""> <!--25-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>T Prot</label>
                                                <div class="fg-line">
                                                    <input name="test[3][26]" type="text" class="form-control" value=""> <!--26-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>A1b</label>
                                                <div class="fg-line">
                                                    <input name="test[3][27]" type="text" class="form-control" value=""> <!--27-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>A1b/Cr Ratio</label>
                                                <div class="fg-line">
                                                    <input name="test[3][28]" type="text" class="form-control" value=""> <!--28-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Micro Albumin</label>
                                                <div class="fg-line">
                                                    <input name="test[3][29]" type="text" class="form-control" value=""> <!--29-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Comp.KFT</label>
                                                <div class="fg-line">
                                                    <input name="test[3][30]" type="text" class="form-control" value=""> <!--30-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel4" aria-expanded="false" class="collapsed">
                                        Lipid Profile        </a>
                                </h4>
                            </div>
                            <div id="panel4" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Cholesterol</label>
                                                <div class="fg-line">
                                                    <input name="test[4][31]" type="text" class="form-control" value=""> <!--31-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>TAG</label>
                                                <div class="fg-line">
                                                    <input name="test[4][32]" type="text" class="form-control" value=""> <!--32-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>HDL</label>
                                                <div class="fg-line">
                                                    <input name="test[4][33]" type="text" class="form-control" value=""> <!--33-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Complete Lipid Profile (TCHOL, TAG, HDL, LDL, VLDL)</label>
                                                <div class="fg-line">
                                                    <input name="test[4][34]" type="text" class="form-control" value=""> <!--34-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel5" aria-expanded="false" class="collapsed">
                                        Glucose Profile (BSR)        </a>
                                </h4>
                            </div>
                            <div id="panel5" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>FBG</label>
                                                <div class="fg-line">
                                                    <input name="test[5][35]" type="text" class="form-control" value=""> <!--35-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>2 Hr</label>
                                                <div class="fg-line">
                                                    <input name="test[5][36]" type="text" class="form-control" value=""> <!--36-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Random</label>
                                                <div class="fg-line">
                                                    <input name="test[5][37]" type="text" class="form-control" value=""> <!--37-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>GTT (0,1,2,3 Hrs)</label>
                                                <div class="fg-line">
                                                    <input name="test[5][38]" type="text" class="form-control" value=""> <!--38-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>HbA1c</label>
                                                <div class="fg-line">
                                                    <input name="test[5][39]" type="text" class="form-control" value=""> <!--39-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Urinary Micro Albumin</label>
                                                <div class="fg-line">
                                                    <input name="test[5][40]" type="text" class="form-control" value=""> <!--40-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Insulin F/PP</label>
                                                <div class="fg-line">
                                                    <input name="test[5][41]" type="text" class="form-control" value=""> <!--41-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel6" aria-expanded="false" class="collapsed">
                                        WIDAL        </a>
                                </h4>
                            </div>
                            <div id="panel6" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>WIDAL</label>
                                                <div class="fg-line">
                                                    <input name="test[6][42]" type="text" class="form-control" value=""> <!--42-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel7" aria-expanded="false" class="collapsed">
                                        TYPHIDOT        </a>
                                </h4>
                            </div>
                            <div id="panel7" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>TYPHIDOT</label>
                                                <div class="fg-line">
                                                    <input name="test[7][43]" type="text" class="form-control" value=""> <!--43-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel8" aria-expanded="false" class="collapsed">
                                        Malaria Serology        </a>
                                </h4>
                            </div>
                            <div id="panel8" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Malaria Serology</label>
                                                <div class="fg-line">
                                                    <input name="test[8][44]" type="text" class="form-control" value=""> <!--44-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel9" aria-expanded="false" class="collapsed">
                                        RA Factor        </a>
                                </h4>
                            </div>
                            <div id="panel9" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>RA Factor</label>
                                                <div class="fg-line">
                                                    <input name="test[9][45]" type="text" class="form-control" value=""> <!--45-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel10" aria-expanded="false" class="collapsed">
                                        HBSAG (Hepatitis B AG)        </a>
                                </h4>
                            </div>
                            <div id="panel10" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>HBSAG (Hepatitis B AG)</label>
                                                <div class="fg-line">
                                                    <input name="test[10][46]" type="text" class="form-control" value=""> <!--46-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel11" aria-expanded="false" class="collapsed">
                                        Urine Examination        </a>
                                </h4>
                            </div>
                            <div id="panel11" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Routine &amp; Microsocopic</label>
                                                <div class="fg-line">
                                                    <input name="test[11][47]" type="text" class="form-control" value=""> <!--47-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Protein</label>
                                                <div class="fg-line">
                                                    <input name="test[11][48]" type="text" class="form-control" value=""> <!--48-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Sugar</label>
                                                <div class="fg-line">
                                                    <input name="test[11][49]" type="text" class="form-control" value=""> <!--49-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>                 <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Ketone Bodies</label>
                                                <div class="fg-line">
                                                    <input name="test[11][50]" type="text" class="form-control" value=""> <!--50-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Bile salt/ bile Pigments</label>
                                                <div class="fg-line">
                                                    <input name="test[11][51]" type="text" class="form-control" value=""> <!--51-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Urine Pregnancy Test</label>
                                                <div class="fg-line">
                                                    <input name="test[11][52]" type="text" class="form-control" value=""> <!--52-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel12" aria-expanded="false" class="collapsed">
                                        CRP        </a>
                                </h4>
                            </div>
                            <div id="panel12" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>CRP</label>
                                                <div class="fg-line">
                                                    <input name="test[12][53]" type="text" class="form-control" value=""> <!--53-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel13" aria-expanded="false" class="collapsed">
                                        Anti HCV        </a>
                                </h4>
                            </div>
                            <div id="panel13" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Anti HCV</label>
                                                <div class="fg-line">
                                                    <input name="test[13][54]" type="text" class="form-control" value=""> <!--54-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel14" aria-expanded="false" class="collapsed">
                                        HIV        </a>
                                </h4>
                            </div>
                            <div id="panel14" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>HIV</label>
                                                <div class="fg-line">
                                                    <input name="test[14][55]" type="text" class="form-control" value=""> <!--55-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel15" aria-expanded="false" class="collapsed">
                                        VDRL        </a>
                                </h4>
                            </div>
                            <div id="panel15" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>VDRL</label>
                                                <div class="fg-line">
                                                    <input name="test[15][56]" type="text" class="form-control" value=""> <!--56-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel16" aria-expanded="false" class="collapsed">
                                        GCT        </a>
                                </h4>
                            </div>
                            <div id="panel16" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>GCT</label>
                                                <div class="fg-line">
                                                    <input name="test[16][57]" type="text" class="form-control" value=""> <!--57-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                        <div class="panel panel-collapse">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionTest" href="#panel17" aria-expanded="false" class="collapsed">
                                        ABO RH (Blood Group)        </a>
                                </h4>
                            </div>
                            <div id="panel17" class="collapse m-t-15" role="tabpanel" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="row">            
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>ABO RH (Blood Group)</label>
                                                <div class="fg-line">
                                                    <input name="test[17][58]" type="text" class="form-control" value=""> <!--58-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
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

