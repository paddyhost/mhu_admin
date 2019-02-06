<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MHU | Health Camp</title>
        <?php $this->load->view('common_css');?>
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
                        <h2>Health Camp - Patient Registration</h2>
                    </div>
                    <div class="card">
                        <div class="card-body card-padding">
                            <form id="health_camp">
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
                                            <?php $i=1; while ($i<=100):?>
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
                                        <select name="location_id" id="location_id" class="selectpicker" title="Select Location">
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
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Patient Problem</label>
                                    <!--<select name="district" id="district" class="selectpicker" title="Select Problem">
                                            <option>Cough</option>
                                        </select>-->
                                        <input type="text" id="problem" name='problem' class="form-control" placeholder="Problem">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" id="remarks" name='remarks' class="form-control" placeholder="Remarks">                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row text-right m-l-0 m-r-0">
                                <button type="button" id="btn_submit" url="/patient/postHealthCamp" class="btn btn-success">Submit</button>
                            </div>
                            </form>
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
        
        <script type="text/javascript">
            $(document).ready(function(){
                
                $("#btn_submit").click(function(){
                    var url = $(this).attr('url');
                    var is_valid = 1;                    
                    var data = $('#health_camp').serializeArray();
                    
                    if(!validate_input('dor,fname,lname,city,area,location')){
                        is_valid = 0;
                    }else if(!validate_select('phase,patient_category,state_id,district_id,city_id,area_id,location_id')){
                        is_valid = 0;
                    }else if(!$('input[name=gender]:checked').val()){
                        is_valid = 0;
                        alert('please select gender');
                    }
//                    data.push({name: 'format', value: 'json'},
//                              {name: 'unique_id', value: $('#unique_id').val()}
//                    );
                    if(data && is_valid){
                        $.ajax({
                            url: url,
                            dataType: 'json',
                            async: false,
                            type: 'POST',
                            data: data,
                            success: function (response) {
                                console.log(response)
                                if(response){
                                    alert(response.message);
                                    location.reload();
                                }else {
                                    alert('Something went wrong');
                                }
                            }
                        });
                    }else {
                        alert ('please provide details');
                    }
                });
                
                // on change state dd populate city dd
                $(document).on('change', '#state_id, #district_id', function(e){
                    var target = e.target.id;
                    var state_id = $('#state_id').val();
                    var district_id = $('#district_id').val();
                    var url = '/admin/ajax_get_city/'+state_id+'/'+district_id;
                    if( state_id >= 1 || district_id >=1){

                        //populate district dd if state changed
                        if(target === 'state_id'){
                            var url2 = '/admin/ajax_get_district/'+state_id;
                            var district_opt = getData(url2);
                            if(district_opt !== false){
                                $("#district_id").empty().append(district_opt);
                                $("#district_id").selectpicker('refresh');
                            }                
                        }// if target state_id

                        var city_opt = getData(url);
                        if(city_opt !== false){
                            $("#city_id").empty().append(city_opt);
                            $("#city_id").selectpicker('refresh');

                            if(state_id >=1){
                                var state = $("#state_id option:selected").text();
                                $("#state").val(state.toLowerCase().trim());
                            }
                            if(district_id >=1){
                                var district = $("#district_id option:selected").text();
                                $("#district").val(district.toLowerCase().trim());
                            }                    
                        }// if city!=false 

                    }
                });

                // on change city dd populate area dd
                $(document).on('change', '#city_id', function(){
                    var city_id = $(this).val();
                    var phase_id = $("#phase").val();
                    if(phase_id === ''){
                        $(this).val('').selectpicker('refresh')
                        $("#phase").next().addClass('error_sel');
                        alert('please select phase for ease of location');
                        return false;
                    }
                    var url = '/admin/ajax_get_area/'+city_id+'/'+phase_id;
                    if( city_id >= 1){
                        var area_opt = getData(url);
                        if(area_opt !== false){
                            $("#area_id").empty().append(area_opt);
                            $("#area_id").selectpicker('refresh');
                            var city = $("#city_id option:selected").text();
                            $("#city").val(city.toLowerCase().trim());
                        }
                    }
                });

                // on change area dd location area dd
                $(document).on('change', '#area_id', function(){
                    var area_id = $(this).val();
                    var phase_id = $("#phase").val();
                    var url = '/admin/ajax_get_location/'+area_id+'/'+phase_id;
                    if( area_id >= 1){
                        var location_opt = getData(url);
                        if(location_opt !== false){
                            $("#location_id").empty().append(location_opt);
                            $("#location_id").selectpicker('refresh');
                            var area = $("#area_id option:selected").text();
                            $("#area").val(area.toLowerCase().trim());
                        }
                    }
                });

                $(document).on('change', '#location_id', function(){
                    var location = $("#location_id option:selected").text();
                    $("#location").val(location.toLowerCase().trim());
                });
                
            });
            
            function getData(url){
                var result = false;
                $.ajax({
                    url: url,
                    dataType: 'json',
                    async: false,
                    type: 'POST',
                    success: function (response) {
                        result = response;
                    }
                });

                return result;
            }
            
            function validate_input(inputIDs){
                var is_valid = 1;
                var ids = inputIDs.split(',');
                $.each(ids, function(k,v){

                    var id = '#'+v;
                    if($(id).val() == ''){
                        $(id).addClass('error');
                        is_valid = 0;
                    }
                })
                return is_valid;
            }

            function validate_select(inputIDs){
                var is_valid = 1;
                var ids = inputIDs.split(',');
                $.each(ids, function(k,v){

                    var id = '#'+v;
                    if($(id).val() == ''){
                        $(id).next().addClass('error_sel');
                        is_valid = 0;
                    }
                })
                return is_valid;
            }
            
            $(document).on('click', '.error, .error_sel', function(){
                $(this).removeClass('error error_sel');
            })

        </script>
        
    </body>
  </html>

