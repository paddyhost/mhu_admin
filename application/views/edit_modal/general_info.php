<!-- <div class="modal fade" id="modalGeninfo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"> -->
                <div class="modal-header">
                    <h4 class="modal-title">General Information</h4>
                </div>
                <div class="modal-body" id="generaInfo">
                <?php //print_r($patient);?>
                    <input type="hidden" name="phase" id="phase" class="form-control" value="<?= @$phase; ?>">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>First Name</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" name="fname" id="fname"class="form-control" value="<?= @$patient->fname; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Patient Name</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" name="lname" id="lname" class="form-control" value="<?= @$patient->lanme; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>DOB</label>
                            <div class="input-group form-group">
                                <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container fg-line">
                                    <input type='text' name='dob' id="dob" class="form-control date-picker" placeholder="DOB" value="<?= date('d-m-Y',  strtotime(@$patient->dob)); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Age</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" name="age" id="age" class="form-control" value="<?= @$patient->age; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Mobile</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" name="mobile" id="mobile" class="form-control" value="<?= @$patient->mobile; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="clearfix"></div>
                                <label class="radio radio-inline m-r-20 m-t-15">
                                    <input <?php echo (@$patient->gender == 'M'? 'checked="checked"':'')?> type="radio" name='gender' value="M">
                                    <i class="input-helper"></i>
                                    Male
                                </label>
                                <label class="radio radio-inline m-r-20 m-t-15">
                                    <input <?php echo (@$patient->gender == 'F'? 'checked="checked"':'')?> type="radio" name='gender' value="F">
                                    <i class="input-helper"></i>
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Patient Category</label>  
                            <div class="form-group">
                            <select name='patient_category' id="patient_category" class="selectpicker"  title="Select patient category">
                                <option <?php echo (@$patient->patient_category == 'C'? 'selected="selected"':'')?> value="C">Child under 19 years of age</option>
                                <option <?php echo (@$patient->patient_category == 'LW'? 'selected="selected"':'')?> value="LW">Lactating women</option>
                                <option <?php echo (@$patient->patient_category == 'PW'? 'selected="selected"':'')?> value="PW">Pregnant women</option>
                                <option <?php echo (@$patient->patient_category == 'S'? 'selected="selected"':'')?> value="S">Senior citizen above 60 years of age</option>
                                <option <?php echo (@$patient->patient_category == 'O'? 'selected="selected"':'')?> value="O">Other</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Date of Registration</label>
                            <div class="input-group form-group">
                                <span class="input-group-addon p-l-0 p-r-0"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container fg-line">
                                    <input type='text' name='regitrationdate' id="regitrationdate" class="form-control date-picker" placeholder="registration" value="<?= date('d-m-Y',  strtotime(@$patient->regitrationdate));?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>State</label>
                            <div class="form-group">
                                <input type="hidden" name="state" id="state" value="<?= @$patient->state; ?>">
                                <select name="state_id" id="state_id" class="selectpicker" title="Select State">
                                    <!--<option value="Uttar Pradesh">Uttar Pradesh</option>-->
                                    <?php foreach ($state_arr as $key => $value):?>
                                    <option <?php echo (@$patient->state_id == $value->id? 'selected="selected"':'')?> value="<?= $value->id; ?>"> <?= $value->name; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>District</label>
                            <div class="form-group">
                                <input type="hidden" name="district" id="district" value="<?= @$patient->district; ?>">
                                <select name="district_id" id="district_id" class="selectpicker" title="Select District">
                                    <?php foreach ($district_arr as $key => $value):?>
                                    <option <?php echo (@$patient->district_id == $value->id? 'selected="selected"':'')?> value="<?= $value->id; ?>"> <?= $value->name; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>City</label>
                            <div class="form-group">
                                <input type="hidden" name="city" id="city" value="<?= @$patient->city; ?>">
                                <select name="city_id" id="city_id" class="selectpicker" title="Select City">
                                    <?php foreach ($city_arr as $key => $value):?>
                                    <option <?php echo (@$patient->city_id == $value->id? 'selected="selected"':'')?> value="<?= $value->id; ?>"> <?= $value->name; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Area</label>
                            <div class="form-group">
                                <input type="hidden" name="area" id="area" value="<?= @$patient->area; ?>">
                                <select name="area_id" id="area_id" class="selectpicker" title="Select Area">
                                    <?php foreach ($area_arr as $key => $value):?>
                                    <option <?php echo (@$patient->area_id == $value->id? 'selected="selected"':'')?> value="<?= $value->id; ?>"> <?= $value->name; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Location</label>
                            <div class="form-group">
                                <input type="hidden" name="location" id="location" value="<?= @$patient->location; ?>">
                                <select name="location_id" id="location_id" class="selectpicker" title="Select Location" data-live-search="true">
                                    <?php foreach ($locations_arr as $key => $value):?>
                                    <option <?php echo (@$patient->location_id == $value->id? 'selected="selected"':'')?> value="<?= $value->id; ?>"> <?= $value->name; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" data-url="/patient_edit/updateGeneralInfo" id="updateGenral" class="updatebtn btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            <!-- </div>
        </div>
    </div> -->