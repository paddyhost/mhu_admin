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
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="row m-l-0 m-r-0 m-t-15">
                                            <button type="button" data-toggle="tab" id="btnuid" class="btn btn-primary">Proceed with UID</button>
                                            <button type="button" data-toggle="tab" id="btnwuid" class="btn btn-info m-l-10">Proceed without UID</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <p class="text-muted text-center m-t-20">Note : Enter patient unique id if already registered Or continue without unique id</p>
                            </div>
                                <div class="form-wizard-basic fw-container" style="display: none" id="form_registration">
                                    <ul class="tab-nav text-center">
                                        <li><a href="#tab1" data-toggle="tab">General Information</a></li>
                                        <li><a href="#tab2" data-toggle="tab">Vital Information</a></li>
                                        <li><a href="#tab3" data-toggle="tab">Medical Condition</a></li>
                                        <li><a href="#tab4" data-toggle="tab">Forth</a></li>
                                        <li><a href="#tab5" data-toggle="tab">Fifth</a></li>
                                        <li><a href="#tab6" data-toggle="tab">Sixth</a></li>
                                    </ul>

                                    <div class="tab-content p-b-0">
                                        <div class="tab-pane fade" id="tab1">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <label>Registration Date</label>
                                                        <div class="input-group form-group">
                                                            <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-calendar"></i></span>
                                                            <div class="dtp-container fg-line">
                                                                <input type='text' class="form-control date-picker" placeholder="Registration Date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <label>Patient Category</label>
                                                        <div class="form-group">
                                                            <select class="selectpicker" title="Select patient category">
                                                                <option>Child under 19 years of age</option>
                                                                <option>Lactating women</option>
                                                                <option>Pregnant women</option>
                                                                <option>Senior citizen above 60 years of age</option>
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
                                                                <input type="text" class="form-control" placeholder="Last name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <div class="clearfix"></div>
                                                            <label class="radio radio-inline m-r-20 m-t-15">
                                                                <input type="radio" name="radio_gender" value="male">
                                                                <i class="input-helper"></i>  
                                                                Male
                                                            </label>
                                                            <label class="radio radio-inline m-r-20 m-t-15">
                                                                <input type="radio" name="radio_gender" value="female">
                                                                <i class="input-helper"></i>  
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <label>Mobile Number</label>
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" class="form-control" placeholder="Mobile No.">
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
                                                                    <input type='text' class="form-control date-picker" placeholder="DOB">
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
                                                            <select class="selectpicker" title="Select State">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>District</label>
                                                            <select class="selectpicker" title="Select District">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <select class="selectpicker" title="Select City">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Area</label>
                                                            <select class="selectpicker" title="Select Area">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Location</label>
                                                            <select class="selectpicker" title="Select Location">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="tab2">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Height</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" placeholder="Height in cm">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Weight</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" placeholder="Weight in kg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Bp</label>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 p-l-0">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" class="form-control" placeholder="Bp (Sys)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 p-r-0">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <input type="text" class="form-control" placeholder="Bp (Dia)">
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
                                                            <input type="text" class="form-control" placeholder="Temperature in Fahrenheit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label>Respiration</label>
                                                    <div class="form-group">
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" placeholder="Respiration / min">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3">
                                            <div class="row">
                                                <label class="m-l-15 m-r-15 m-b-15">Chief Conmplaint</label>
                                                <div class="clearfix"></div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-1"></i></span>
                                                        <div class="fg-line">
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-2"></i></span>
                                                        <div class="fg-line">
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-3"></i></span>
                                                        <div class="fg-line">
                                                            <input class="form-control" placeholder="" type="text">
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
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-2"></i></span>
                                                        <div class="fg-line">
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-collection-item-3"></i></span>
                                                        <div class="fg-line">
                                                            <input class="form-control" placeholder="" type="text">
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
                                                            <input type="radio" name="radio_investigation" value="yes">
                                                            <i class="input-helper"></i>  
                                                            Yes
                                                        </label>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="radio_investigation" value="no">
                                                            <i class="input-helper"></i>  
                                                            No
                                                        </label>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="radio_investigation" value="dont_know">
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
                                                            <input type="radio" name="radio_treatment" value="yes">
                                                            <i class="input-helper"></i>  
                                                            Yes
                                                        </label>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="radio_treatment" value="no">
                                                            <i class="input-helper"></i>  
                                                            No
                                                        </label>
                                                        <label class="radio radio-inline m-r-20 m-t-15">
                                                            <input type="radio" name="radio_treatment" value="dont_know">
                                                            <i class="input-helper"></i>  
                                                            Dont Know
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row m-l-0 m-r-0 m-b-15">
                                                <label>Prescription</label>
                                                <div class="clearfix"></div>
                                                <button class="btn btn-info btn-icon-text"><i class="zmdi zmdi-plus"></i>Add Prescription</button>
                                                <table class="table table-bordered m-t-15">
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
                                        <div class="tab-pane fade" id="tab4">

                                        </div>
                                        <div class="tab-pane fade" id="tab5">

                                        </div>
                                        <div class="tab-pane fade" id="tab6">

                                        </div>
                                        <div class="row m-l-0 m-r-0 text-right">
                                            <button class="btn btn-default previous">Previous</button>
                                            <button class="btn btn-primary next m-l-10">Next</button>
                                        </div>
                                    </div>
                                </div>
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
        <script>
            $(document).ready(function(){
               $('#btnuid').click(function(){
                   $('#uidDiv').hide();
                   $('#form_registration').show();
               }); 
            });
        </script>
    </body>
  </html>

