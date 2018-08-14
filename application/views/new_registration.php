<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MHU | New Registration</title>
        <?php $this->load->view('common_css');?>
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
                                            <input type="hidden" name="registration_no" id="registration_no">
                                            <input type="hidden" name="pid" id="pid">
                                            <input type="hidden" name="visit_master_id" id="visit_master_id">
                                            
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
                                    <li><a href="#medical" url="/api/v1_1/addMedicalcondition" data-toggle="tab">Medical Condition</a></li>
                                    <li><a href="#vaccination" url="/api/v1_1/addvaccination" data-toggle="tab">Vaccination Records</a></li>
                                    <li><a href="#test_mhu" url="/api/v1_1/addMHUTest" data-toggle="tab">Test By MHU</a></li>
                                    <li><a href="#test_outside" url="/api/v1_1/addPatient" data-toggle="tab">Test Adviced From Outside</a></li>
                                </ul>

                                <div class="tab-content p-b-0">
                                    <div class="tab-pane fade" id="general_info">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Registration Date</label>
                                                    <div class="input-group form-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-calendar"></i></span>
                                                        <div class="dtp-container fg-line">
                                                            <input type='text' name="dor" id="dor" class="form-control date-picker" placeholder="Registration Date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Patient Category</label>
                                                    <div class="form-group">
                                                        <select name='patient_category' class="selectpicker"  title="Select patient category">
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
                                                            <input type="text" name='lname' class="form-control" placeholder="Last name">
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
                                                            <input type="text" name='mobile' class="form-control" placeholder="Mobile No.">
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
                                                                <input type='text' name='dob' class="form-control date-picker" placeholder="DOB">
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
                                                        <select name="state" class="selectpicker" title="Select State">
                                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>District</label>
                                                        <select name="district" class="selectpicker" title="Select District">
                                                            <option value="Ghaziabad">Ghaziabad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <!--<select name="city" class="selectpicker" title="Select City">
                                                            <option></option>
                                                        </select>-->
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" name="city" class="form-control" placeholder="City">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Area</label>
                                                        <!--<select name="city" class="selectpicker" title="Select Area">
                                                            <option></option>
                                                        </select>-->
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" name="area" class="form-control" placeholder="Area">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <!--<select name="lcoation" class="selectpicker" title="Select Location">
                                                            <option></option>
                                                        </select>-->
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" name='location' class="form-control" placeholder="Location">
                                                            </div>
                                                        </div>
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
                                                        <input type="text" class="form-control" placeholder="Previous Hospital">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-1"></i></span>
                                                    <div class="fg-line">
                                                        <input class="form-control" placeholder="Previous Doctor" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-2"></i></span>
                                                    <div class="fg-line">
                                                        <input class="form-control" placeholder="Previous Doctor" type="text">
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
                                                        <input class="form-control" placeholder="Previous Doctor" type="text">
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
                                        </form>
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
                                    </div>
                                    <div class="tab-pane fade" id="vaccination">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <div class="checkbox m-b-15">
                                                        <label>
                                                            <input value="DPT" type="checkbox">
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
                                                            <input value="BCG" type="checkbox">
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
                                                            <input value="measles" type="checkbox">
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
                                                            <input value="OPV" type="checkbox">
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
                                                            <input value="heap-b" type="checkbox">
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
                                                            <input value="TT" type="checkbox">
                                                            <i class="input-helper"></i>
                                                            TT
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control required" placeholder="Other">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="test_mhu">
                                        <div class="row">
                                            <div class="panel-group m-l-15 m-r-15" data-collapse-color="cyan" id="accordionTest" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordionTest" href="#cbc" aria-expanded="true">
                                                                Complete Blood Count / Hemogram
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="cbc" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>CBB / Hgm Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>CBB / Hgm Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>HB Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>HB Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>TLC Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>TLC Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>DLC Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>DLC Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>PCV Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>PCV Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>RBC Count Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>RBC Count Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Platelet Count Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Platelet Count Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>MCV / MCH / MCHC Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>MCV / MCH / MCHC Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ESR Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ESR Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>AEC Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>AEC Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#lft" aria-expanded="false">
                                                                Liver Function Test (LFT)
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="lft" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>D Bil Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>D Bil Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ID Bil Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ID Bil Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>T-Bil Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>T-Bil Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>T-Prot Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>T-Prot Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>A/G Rat Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>A/G Rat Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ALT Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ALT Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>AST Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>AST Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ALP Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ALP Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Complete LFT Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Complete LFT Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>GGT Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>GGT Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Alb Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Alb Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#kft" aria-expanded="false">
                                                                Kindney Function Test
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="kft" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Urea Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Urea Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Creatine Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Creatine Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Uric Acid Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Uric Acid Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Electrolyte (Na,K,Cl) Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Electrolyte (Na,K,Cl) Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>T Prot Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label><label>T Prot Reading</label></label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>A1b Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>A1b Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>A1b / Cr Ratio Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>A1b / Cr Ratio Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Micro Albumin Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Micro Albumin Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Comp. KFT Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Comp. KFT Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Correct-->
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#lp" aria-expanded="false">
                                                                Lipid Profile
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="lp" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Cholesterol Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Cholesterol Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>TAG Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>TAG Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>HDL Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>HDL Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Complete Lipid Profile Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Complete Lipid Profile Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#bsr" aria-expanded="false">
                                                                Glucose Profile (BSR)
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="bsr" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>FBG Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>FBG Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>2 Hr Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>2 Hr Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Ramdom Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Ramdom Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>GTT (0,1,2,3 Hrs) Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>GTT (0,1,2,3 Hrs) Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>HbA1c Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>HbA1c Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#widal" aria-expanded="false">
                                                                WIDAL
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="widal" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Widal Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Widal Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#typhoid" aria-expanded="false">
                                                                Typhoid
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="typhoid" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Typhoid Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Typhoid Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#maleria" aria-expanded="false">
                                                                Maleria Serology
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="maleria" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Maleria Serology Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Maleria Serology Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#ra" aria-expanded="false">
                                                                RA Factor
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="ra" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>RA Factor Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>RA Factor Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#hbsag" aria-expanded="false">
                                                                HBSAG (Hepatitis B AG)
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="hbsag" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>HBSAG Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>HBSAG Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#urine" aria-expanded="false">
                                                                Urine Examination
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="urine" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Routine & Microscopic Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Routine & Microscopic Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Protein Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Protein Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Sugar Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Sugar Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Ketone Bodies Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Ketone Bodies Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Bile Sale/ Bile Pigments Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Bile Sale/ Bile Pigments Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Urine Preganancy Test Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Urine Preganancy Test Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#crp" aria-expanded="false">
                                                                CRP
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="crp" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>CRP Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>CRP Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#hcv" aria-expanded="false">
                                                                Anti HCV
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="hcv" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Anti HCV Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Anti HCV Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#hiv" aria-expanded="false">
                                                                HIV
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="hiv" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Anti HCV Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Anti HCV Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#vdrl" aria-expanded="false">
                                                                VDRL
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="vdrl" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>VDRL Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>VDRL Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#gct" aria-expanded="false">
                                                                GCT
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="gct" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>GCT Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>GCT Reading</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-collapse">
                                                    <div class="panel-heading" role="tab">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionTest" href="#aborh" aria-expanded="false">
                                                                ABO RH (Blood Group)
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="aborh" class="collapse m-t-15" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ABO RH Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>ABO RH Reference Value</label>
                                                                        <div class="fg-line">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="test_outside">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Test Name</label>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Refered</label>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-l-0 m-r-0 text-right">
                                    <button class="btn btn-default previous">Previous</button>
                                    <button class="btn btn-primary next m-l-10">Next</button>
                                    <button class="btn btn-success finish m-l-10">Finish</button>
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
                                <select name="name" id="name" class="selectpicker" title="Select Medicine">
                                    <?php foreach ($medicine as $key => $value):?>
                                        <option value="<?= $value->id.'_'.$value->name;?>"><?= $value->name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Frequency</label>
                                <select name="frequency" id="frequency" class="selectpicker" title="Select Medicine">
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

