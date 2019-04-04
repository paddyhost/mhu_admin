<div class="modal fade" id="modalPrescription" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Prescription</h4>
                    </div>
                    <div class="modal-body" style="width:300px">
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
                        <button type="button" class="btn btn-success" url="/patient/add_prescribe_struct/1" id="btn_prescrib_struct">Save changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>