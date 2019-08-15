<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MHU | New Registration</title>
        <?php $this->load->view('common_css');?>
        <!-- <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
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
       <?php $this->load->view('header');?>
        <section id="main" data-layout="layout-1">
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>New Registration</h2>
                    </div>
                    <div class="card">
                        <div class="card-body card-padding">
                            <div class="row m-l-0 m-r-0" id="uidDiv">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="form-group">
                                        <label>Patient Unique ID</label>
                                        <div class="fg-line">
                                            <input type="text" id="unique_id" name="unique_id" class="form-control">
                                            <input type="hidden" name="visit_master_id" id="visit_master_id" value="0">
                                            
                                            
                                        </div>
                                        <div class="row m-l-0 m-r-0 m-t-15">
                                            <button type="button" data-toggle="tab" id="btnuid" class="proceed1 btn btn-primary">Proceed with UID</button>
                                            <button type="button" data-toggle="tab" id="btnwuid" class="proceed1 btn btn-info m-l-10">Proceed without UID</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <p class="text-muted text-center m-t-20">Note : Enter patient unique id if already registered Or continue without unique id</p>
                            </div>
                            <div class="form-wizard-basic fw-container" style="display: none" id="form_registration">
                                <ul class="tab-nav text-center">
                                    <li><a href="#general_info" url="/patient/postGeneralInfo" app-url="/api/v1_1/addPatient" data-toggle="tab">General Information</a></li>
                                    <li><a href="#vital_info" url="/patient/postVitalInfo" app-url="/api/v1_1/addVital" data-toggle="tab">Vital Information</a></li>
                                    <li><a href="#medical" url="/patient/postMedical" app-url="/api/v1_1/addMedicalcondition" data-toggle="tab">Medical Condition</a></li>
                                    <li><a href="#vaccination" url="/patient/postVaccination" app-url="/api/v1_1/addvaccination" data-toggle="tab">Vaccination Records</a></li>
                                    <li><a href="#test_mhu"  url="/patient/postTest" app-url="/api/v1_1/addMHUTest" data-toggle="tab">Test By MHU</a></li>
                                    <li><a href="#test_outside" url="/patient/postTestAdvice" app-url="/api/v1_1/addPatient" data-toggle="tab">Test Adviced From Outside</a></li>
                                </ul>

                                <div class="tab-content p-b-0">
                                    <div class="tab-pane fade" id="general_info">
                                        <form>
                                            <input type="hidden" name="insert" id="insert" value="1">
                                            <input type="hidden" name="pid" id="pid" value="0">
                                            <input type="hidden" name="registration_no" id="registration_no" value="0">
                                            <div class="row">
                                                <div class="col-md- col-sm-2 col-xs-12">
                                                    <label>Registration Date</label>
                                                    <div class="input-group form-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-calendar"></i></span>
                                                        <div class="dtp-container fg-line">
                                                            <input type='text' name="dor" id="dor" class="form-control date-picker" placeholder="Registration Date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Phase</label>
                                                        <select name="phase" id="phase" class="selectpicker" title="Select Phase">
                                                            <?php $i=1; while ($i<=10):?>
                                                            <option value="<?= $i?>"> Phase <?= $i?></option>
                                                            <?php $i++; endwhile;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Patient Category</label>
                                                    <div class="form-group">
                                                        <select name='patient_category' id="patient_category" class="selectpicker"  title="Select patient category">
                                                            <option value="C">Child under 19 years of age</option>
                                                            <option value="LW">Lactating women</option>
                                                            <option value="PW">Pregnant women</option>
                                                            <option value="S">Senior citizen above 60 years of age</option>
                                                            <option value="O">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>First Name</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control required" placeholder="First name" id="fname" name="fname">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Last Name</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" name='lname' id="lname" class="form-control" placeholder="Last name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <div class="clearfix"></div>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name='gender' value="M">
                                                            <i class="input-helper"></i>
                                                            Male
                                                        </label>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name='gender' value="F">
                                                            <i class="input-helper"></i>
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Mobile Number</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" id="mobile" name='mobile' class="form-control" placeholder="Mobile No.">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 p-l-0">
                                                        <label>DOB</label>
                                                        <div class="input-group form-group">
                                                            <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-calendar"></i></span>
                                                            <div class="dtp-container fg-line">
                                                                <input type='text' name='dob' id="dob" class="form-control date-picker" placeholder="DOB">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 p-r-0">
                                                        <label>Age</label>
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" name="age" class="form-control" placeholder="Age">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <input type="hidden" name="state" id="state" value="">
                                                        <select name="state_id" id="state_id" class="selectpicker" title="Select State">
                                                            <!--<option value="Uttar Pradesh">Uttar Pradesh</option>-->
                                                            <?php foreach ($state as $key => $value):?>
                                                            <option value="<?= $value->id; ?>"> <?= $value->name; ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>District</label>
                                                        <input type="hidden" name="district" id="district" value="">
                                                        <select name="district_id" id="district_id" class="selectpicker" title="Select District">
                                                            <!--<option value="Ghaziabad">Ghaziabad</option>-->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="hidden" name="city" id="city" value="">
                                                        <select name="city_id" id="city_id" class="selectpicker" title="Select City">
                                                            <!--<option></option>-->
                                                        </select>
                                                        <!--<div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" id="city" name="city" class="form-control" placeholder="City">
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Area</label>
                                                        <input type="hidden" name="area" id="area" value="">
                                                        <select name="area_id" id="area_id" class="selectpicker" title="Select Area">
                                                            <!--<option></option>-->
                                                        </select>
                                                        <!--<div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" id="area" name="area" class="form-control" placeholder="Area">
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <input type="hidden" name="location" id="location" value="">
                                                        <select name="location_id" id="location_id" class="selectpicker" title="Select Location" data-live-search="true">
                                                            <!--<option></option>-->
                                                        </select>
                                                        <!--<div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" id="location" name='location' class="form-control" placeholder="Location">
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="vital_info">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Height</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" name="height" id="height" class="form-control" placeholder="Height in cm">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Weight</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" name="weight" id="weight" class="form-control" placeholder="Weight in kg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Bp</label>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 p-l-0">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" name="bloodpresure" id="bloodpresure" class="form-control" placeholder="Bp (Sys)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 p-r-0">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" name="bpto" id="bpto" class="form-control" placeholder="Bp (Dia)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Temperature</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" name="tempreture" id="tempreture" class="form-control" placeholder="Temperature in Fahrenheit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Respiration</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" name="respiration" id="respiration" class="form-control" placeholder="Respiration / min">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="medical">
                                        <form>
                                            <div class="row">
                                                <label class="m-l-15 m-r-15 m-b-15">Symptoms</label> <!--Chief Conmplaint-->
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-1"></i></span>
                                                        <div class="fg-line">
                                                            <input name="chiefcomplaints1" id="chiefcomplaints1" class="form-control" placeholder="Symptom 1" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-2"></i></span>
                                                        <div class="fg-line">
                                                            <input name="chiefcomplaints2" id="chiefcomplaints2" class="form-control" placeholder="Symptom 2" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-3"></i></span>
                                                        <div class="fg-line">
                                                            <input name="chiefcomplaints3" id="chiefcomplaints3" class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <!-- <div class="row m-t-15">
                                                <label class="m-l-15 m-r-15 m-b-15">Brief History</label>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-1"></i></span>
                                                        <div class="fg-line">
                                                            <input name="briefHistory1" id="briefHistory1" class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-2"></i></span>
                                                        <div class="fg-line">
                                                            <input name="briefHistory2" id="briefHistory2" class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-3"></i></span>
                                                        <div class="fg-line">
                                                            <input name="briefHistory3" id="briefHistory3" class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="row m-t-15">
                                                <label class="m-l-15 m-r-15 m-b-15">Previous Records</label>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" name="prev_hospital" class="form-control" placeholder="Previous Hospital">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-1"></i></span>
                                                        <div class="fg-line">
                                                            <input class="form-control" name="prev_doc1" placeholder="Previous Doctor" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-2"></i></span>
                                                        <div class="fg-line">
                                                            <input class="form-control" name="prev_doc2" placeholder="Previous Doctor" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="row m-t-15">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>&nbsp;</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-3"></i></span>
                                                        <div class="fg-line">
                                                            <input class="form-control" name="prev_doc3" placeholder="Previous Doctor" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Previous Investigation</label>
                                                        <div class="clearfix"></div>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="investigation" value="Y">
                                                            <i class="input-helper"></i>
                                                            Yes
                                                        </label>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="investigation" value="N">
                                                            <i class="input-helper"></i>
                                                            No
                                                        </label>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="investigation" value="DN">
                                                            <i class="input-helper"></i>
                                                            Dont Know
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Treatment Taken</label>
                                                        <div class="clearfix"></div>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="tratementtaken" value="Y">
                                                            <i class="input-helper"></i>
                                                            Yes
                                                        </label>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="tratementtaken" value="N">
                                                            <i class="input-helper"></i>
                                                            No
                                                        </label>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="tratementtaken" value="DN">
                                                            <i class="input-helper"></i>
                                                            Dont Know
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row m-t-20" class="row">
                                                <!-- <label class="m-l-15 m-r-15 m-b-15">Select Diagnosed disease</label>                                                 -->
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Select Diagnosed disease</label>
                                                    <div class="form-group">
                                                        <select name='diseases_master_id' id="diagnosed_diseases" class="selectpicker" data-live-search="true"  title="Select Specific diseases">
                                                            <option value="">other's</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 other_div" style="display:none">
                                                    <!-- <div class="fg-line">
                                                        <input type="text" name="disease" id="disease" class="form-control" placeholder="Others Details">
                                                    </div> -->
                                                    <label>Other Diseases</label>
                                                    <div class="form-group">
                                                        <select name='disease' id="other_diseases" class="selectpicker" data-live-search="true"  title="Select General diseases">
                                                            <?php foreach ($other_diseases as $id => $value): ?>
                                                                <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            <hr>
                                            <div class="row m-l-0 m-r-0 m-b-15">
                                                <label>Prescription</label>
                                                <div class="clearfix"></div>
                                                <button type="button" class="btn btn-info btn-icon-text" data-toggle="modal" data-target="#modalPrescription"><i class="zmdi zmdi-plus"></i>Add Prescription</button>
                                                <table id="prescribe_dose_table" class="table table-bordered m-t-15">
                                                    <thead>
                                                    <th>Medicine Name</th>
                                                    <th>Frequency</th>
                                                    <th>Days</th>
                                                    <th>Before or After Meal</th>
                                                    </thead>
                                                    <tbody>
                                                        <!--<tr>
                                                            <td>Abc</td>
                                                            <td>Once a day</td>
                                                            <td>7</td>
                                                            <td>Before Meal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Xyz</td>
                                                            <td>Twise a day</td>
                                                            <td>7</td>
                                                            <td>After Meal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pqr</td>
                                                            <td>Thrise a day</td>
                                                            <td>7</td>
                                                            <td>Before Meal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lmn</td>
                                                            <td>Four times a day</td>
                                                            <td>7</td>
                                                            <td>After Meal</td>
                                                        </tr>-->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="vaccination">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="checkbox m-b-15">
                                                            <label>
                                                                <input name="vaccination[]" value="dpt" type="checkbox">
                                                                <i class="input-helper"></i>
                                                                DPT
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="checkbox m-b-15">
                                                            <label>
                                                                <input name="vaccination[]" value="bcg" type="checkbox">
                                                                <i class="input-helper"></i>
                                                                BCG
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
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
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
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
                                                <div class="col-md-4 col-sm-4 col-xs-12">
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
                                                <div class="col-md-4 col-sm-4 col-xs-12">
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
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <div class="fg-line">
                                                        <input type="text" name="other" class="form-control required" placeholder="Other">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="test_mhu">
                                        <form>
                                        <div class="row">
                                            <div class="panel-group m-l-15 m-r-15" data-collapse-color="cyan" id="accordionTest" role="tablist" aria-multiselectable="true">
                                                <?php echo $test_view; ?>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="test_outside">
                                        <form>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group">
                                                    <label>Test Name</label>
                                                    <div class="fg-line">
                                                        <input name="test_name" id="test_name" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <label>Select Referred cause/disease</label>
                                                <div class="form-group">
                                                    <select name='referred_disease_id' id="referred_disease_id" class="selectpicker" data-live-search="true"  title="Select diseases">
                                                        <?php foreach($referred_disease as $key => $disease_details):?>
                                                            <option value="<?=$disease_details->id;?>"><?=$disease_details->disease_name;?></option>
                                                        <?php endforeach;?>
                                                        <option value="">other's</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="display:none" class="col-md-3 col-sm-3 col-xs-12 referred_div">
                                                <div class="form-group">
                                                    <label>other's</label>
                                                    <div class="fg-line">
                                                        <input type="text" name="referred" id="referred" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <div class="fg-line">
                                                        <input type="text" name="remarks" id="remarks" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row m-l-0 m-r-0 text-right">
                                    <!--<button class="btn btn-default previous">Previous</button>-->
                                    <button class="btn btn-primary next m-l-10">Next</button>
                                    <button class="btn btn-success finish m-l-10" url="/patient/postTestAdvice" >Finish</button>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
        </section>
        <?php $this->load->view('footer');?>
        <!--Modal-->
        <div class="modal fade" id="modalPrescription" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Prescription</h4>
                    </div>
                    <div class="modal-body">
                        <form id="prescribe_dose" name="prescribe_dose">
                            <div class="form-group">
                                <label>Medicine Name</label>
                                <select name="name" id="name" class="selectpicker" title="Select Medicine"  data-live-search="true">
                                    <option value="">Select</option>
                                    <?php foreach ($medicine as $key => $value):?>
                                        <option value="<?= $value->id.'_'.$value->name;?>"><?= $value->name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Frequency</label>
                                <select name="frequency" id="frequency" class="selectpicker" title="Select Frequency" required="">
                                    <option value="">Select</option>
                                    <option value="1">Once a day</option>
                                    <option value="2">Twice a day</option>
                                    <option value="3">Thrice a day</option>
                                    <option value="4">Four times a day</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Days</label>
                                <div class="fg-line">
                                    <input type="text" name="days" id="days" class="form-control required" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="radio radio-inline m-r-20 m-t-15">
                                    <input type="radio" name="aftermeal" value="No" checked="checked">
                                    <i class="input-helper"></i>
                                    Before Meal
                                </label>
                                <label class="radio radio-inline m-r-20 m-t-15">
                                    <input type="radio" name="aftermeal" value="Yes">
                                    <i class="input-helper"></i>
                                    After Meal
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" url="/patient/add_prescribe_struct" id="btn_prescrib_struct">Save changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>
                <p>Please wait...</p>
            </div>
        </div>
        
        <ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
	  <li class="mfb-component__wrap">
	    <a href="/admin/healthcamp" class="mfb-component__button--main" data-mfb-label="Health Camp - Patient Registration">
	      <i class="mfb-component__main-icon--resting ion-plus-round"></i>
	      <i class="mfb-component__main-icon--active ion-close-round"></i>
	    </a>
	  </li>
	</ul>
        
        <?php $this->load->view('common_js');?>
        <script src="/assets/js/new_registration.js"></script>

        <script>
//            $(document).ready(function(){
//               $('#btnuid').click(function(){
//                   if()
//                   $('#uidDiv').hide();
//                   $('#form_registration').show();
//               });
//            });
        </script>
    </body>
  </html>

