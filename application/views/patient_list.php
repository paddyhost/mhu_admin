<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MHU | Patient List</title>
        <?php $this->load->view('common_css');?>
    </head>
    <body>
       <?php $this->load->view('header');?>
        <section id="main" data-layout="layout-1">
           <?php //$this->load->view('sidebar');?>
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Patient List</h2>
                    </div>
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <table id="data-table-command" class="table table-striped">
                            <thead>
                                <tr>
                                    <th data-column-id="unique_id" data-type="reg_no" data-width="200px">Unique ID.</th><!--registration_no-->
                                    <th data-column-id="regitrationdate" data-width="200px">Registration Date</th>
                                    <th data-column-id="fname" data-order="name">Name</th>
                                    <th data-column-id="patient_category" data-formatter="patient_category">Patient Category</th>
                                    <th data-column-id="mobile">Mobile</th>
                                    <th data-column-id="gender" data-width="100px">Gender</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false" data-width="80px"></th>
                                    <th data-column-id="command-edit" data-formatter="command-edit" data-sortable="false" data-width="80px"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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
        <!--Modal edit patient-->
        <div class="modal fade" id="modaleditPatient" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title pull-left">Edit Patient</h4>
                        <a class="pull-right close" href="javascript:void(0)" data-dismiss="modal">&times;</a>
                    </div>
                    <div class="modal-body p-b-15">
                        <div class="form-wizard-basic fw-container" id="form_registration">
                            <ul class="tab-nav text-center">
                                <li class="active"><a href="#general_info" url="/patient/postGeneralInfo" app-url="/api/v1_1/addPatient" data-toggle="tab">General Information</a></li>
                                <li><a href="#vital_info" url="/patient/postVitalInfo" app-url="/api/v1_1/addVital" data-toggle="tab">Vital Information</a></li>
                                <li><a href="#medical" url="/patient/postMedical" app-url="/api/v1_1/addMedicalcondition" data-toggle="tab">Medical Condition</a></li>
                                <li><a href="#vaccination" url="/patient/postVaccination" app-url="/api/v1_1/addvaccination" data-toggle="tab">Vaccination Records</a></li>
                                <li><a href="#test_mhu"  url="/patient/postTest" app-url="/api/v1_1/addMHUTest" data-toggle="tab">Test By MHU</a></li>
                                <li><a href="#test_outside" url="/patient/postTestAdvice" app-url="/api/v1_1/addPatient" data-toggle="tab">Test Adviced From Outside</a></li>
                            </ul>

                            <div class="tab-content p-b-0">
                                <div class="tab-pane fade active in" id="general_info">
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
                                                        <option></option>
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
                                                            <input type="text" class="form-control" placeholder="Age">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="hidden" name="state" id="state" value="">
                                                    <select name="state_id" id="state_id" class="selectpicker" title="Select State">
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>District</label>
                                                    <input type="hidden" name="district" id="district" value="">
                                                    <select name="district_id" id="district_id" class="selectpicker" title="Select District">
                                                        <option value="Ghaziabad">Ghaziabad</option>
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
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Area</label>
                                                    <input type="hidden" name="area" id="area" value="">
                                                    <select name="area_id" id="area_id" class="selectpicker" title="Select Area">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <input type="hidden" name="location" id="location" value="">
                                                    <select name="location_id" id="location_id" class="selectpicker" title="Select Location" data-live-search="true">
                                                        <option></option>
                                                    </select>
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
                                            <label class="m-l-15 m-r-15 m-b-15">Chief Conmplaint</label>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-1"></i></span>
                                                    <div class="fg-line">
                                                        <input name="chiefcomplaints1" id="chiefcomplaints1" class="form-control" placeholder="" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-2"></i></span>
                                                    <div class="fg-line">
                                                        <input name="chiefcomplaints2" id="chiefcomplaints2" class="form-control" placeholder="" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-3"></i></span>
                                                    <div class="fg-line">
                                                        <input name="chiefcomplaints3" id="chiefcomplaints3" class="form-control" placeholder="" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-15">
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
                                        </div>
                                        <div class="row m-t-15">
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
                                        </div>
                                        <div class="row m-t-15">
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
                                        </div>
                                        <div class="row">
                                            <label class="m-l-15 m-r-15 m-b-15">Select Diagnosed disease</label>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <select name='diseases_master_id' id="diagnosed_diseases" class="selectpicker"  title="Select patient category">
                                                        <option value="">other's</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 other_div" style="display:none">
                                                <div class="fg-line">
                                                    <input type="text" name="disease" id="disease" class="form-control" placeholder="Others Details">
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
                                                    <tr>
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
                                                    </tr>
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
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel1" aria-expanded="true">
                                                                Complete Blood Count (CBC)/ Homogram (Hgm)        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel1" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel2" aria-expanded="true">
                                                                Liver Function Test (LFT)        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel2" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel3" aria-expanded="true">
                                                                Kidney Function Test        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel3" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel4" aria-expanded="true">
                                                                Lipid Profile        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel4" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel5" aria-expanded="true">
                                                                Glucose Profile (BSR)        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel5" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel6" aria-expanded="true">
                                                                WIDAL        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel6" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel7" aria-expanded="true">
                                                                TYPHIDOT        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel7" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel8" aria-expanded="true">
                                                                Malaria Serology        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel8" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel9" aria-expanded="true">
                                                                RA Factor        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel9" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel10" aria-expanded="true">
                                                                HBSAG (Hepatitis B AG)        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel10" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel11" aria-expanded="true">
                                                                Urine Examination        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel11" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel12" aria-expanded="true">
                                                                CRP        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel12" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel13" aria-expanded="true">
                                                                Anti HCV        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel13" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel14" aria-expanded="true">
                                                                HIV        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel14" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel15" aria-expanded="true">
                                                                VDRL        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel15" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel16" aria-expanded="true">
                                                                GCT        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel16" class="collapse m-t-15" role="tabpanel">
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
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#panel17" aria-expanded="true">
                                                                ABO RH (Blood Group)        </a>
                                                        </h4>
                                                    </div>
                                                    <div id="panel17" class="collapse m-t-15" role="tabpanel">
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
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="test_outside">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Test Name</label>
                                                    <div class="fg-line">
                                                        <input name="test_name" id="test_name" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Referred</label>
                                                    <div class="fg-line">
                                                        <input type="text" name="referred" id="referred" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
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
            </div>
        </div>
        
        <!--Modal prescription-->
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
                                <select name="name" id="name" class="selectpicker" title="Select Medicine" data-live-search="true">
                                    <option value="">Select</option>
                                    
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

        <?php $this->load->view('common_js');?>
      
        <!-- Data Table -->
        <script type="text/javascript">
            $(document).ready(function(){
                //Command Buttons
                var category = {'PW':'Pregnant women', 'LW':'Lactating women','C':'Child below 5 yrs.', 'S':'Senior above 60yrs', 'O':'other', '':'NA'}
                var bgrid = $("#data-table-command").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    ajax: true,
                    post: function ()
                    {
                        return {
                         id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
                     };
                },
                url: "/admin/getPatientList",


                    formatters: {
                        "commands": function(column, row) {
                            return '<a href="patientcard/'+row.id+'" class="btn btn-info btn-xs waves-effect command-view" data-row-id="' + row.id + '">View</button> ';
                        },
                        "command-edit": function(column, row) {
                            return '<a href="javascript:void(0)" class="btn btn-default btn-xs waves-effect command-edit" data-row-id="' + row.id + '">Edit</button> ';
                        },
                        "patient_category": function(column, row) {
                            return category[row.patient_category]
                        },

                    }
                }).on("loaded.rs.jquery.bootgrid", function ()
                {
                    bgrid.find(".btn_student_pin").on("click", function () {
                    }).end().find(".command-view").on("click", function () {
                        
                    }).end().find(".command-edit").on("click",function(){
                        $("#modaleditPatient").modal({
                           backdrop: 'static',
                           keyboard: false  
                        }).show();
                    });
                });
            });
        </script>
    </body>
  </html>

