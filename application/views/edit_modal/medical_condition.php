<!--Modal Medical info-->
    <!-- <div class="modal fade" id="modalMedicalcondition" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"> -->
                <div class="modal-header">
                    <h4 class="modal-title">Medical Condition</h4>
                </div>
                <div class="modal-body" id="medicalcondition">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Symptom 1</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" name="symptom1" class="form-control" value="<?= @$medical->chiefcomplaints1 ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Symptom 2</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" name="symptom2" class="form-control" value="<?= @$medical->chiefcomplaints2 ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Select Diagnosed Disease</label>
                            <div class="form-group">
                            <select name='diseases_master_id' id="diagnosed_diseases" class="selectpicker"  title="Select patient category">
                                <?php foreach ($diseases as $key => $value):?>
                                    <option <?php echo ($value->id == @$medical->diseases_master_id ? "selected='selected'":""); ?> value="<?= $value->id ?>"><?= $value->name ?></option>
                                <?php endforeach ?>
                                <option value="">other's</option>
                            </select>
                            </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 other_div" style="display:none">
                            <div class="fg-line" style="margin-top:10px">
                                <input type="text" name="disease" id="disease" class="form-control" placeholder="Others Details">
                            </div>
                        </div>
                    </div>
                    <!-- <table class="table table-bordered">
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
                    </table> -->
                </div>
                <div class="modal-footer">
                    <button type="button" data-url="/patient_edit/updateMedical" id="updateMedical" class="updatebtn btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            <!-- </div>
        </div>
    </div> -->