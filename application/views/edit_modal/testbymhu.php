<!-- <div class="modal fade" id="modalTestMhu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> -->
            <div class="modal-header">
                <h4 class="modal-title">Test Conducted By MHU</h4>
            </div>
            <div class="modal-body" id="testByMhuBody">
                <div class="panel-group m-l-15 m-r-15" data-collapse-color="cyan" id="accordionTest" role="tablist" aria-multiselectable="true">
                    <?php foreach ($mhu_test as $key => $value):?>
                    <div class="panel panel-collapse">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordionTest" href="#panel<?= $value->id?>" aria-expanded="true">
                                    <?= $value->test_name?>
                                </a>
                            </h4>
                        </div>
                        <div id="panel<?= $value->id?>" class="collapse m-t-15" role="tabpanel">
                            <div class="panel-body">
                                <?php $i = 1; foreach (explode('--', $value->attribute_values) as  $attribute_values):?>
                                <?php if($i%3 == 1):?> <div class="row"><?php endif;?>
                                    
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <?php $attr = explode('|', $attribute_values);?>
                                            <label><?= $attr[0]?></label>
                                            <div class="fg-line">
                                                <!-- <?php print_r($test[$value->id][$attr[1]]);?> -->
                                                <input name="test[<?=$value->id?>][<?=$attr[1]?>]" type="text" class="form-control" 
                                                value="<?php echo (isset($test[$value->id][$attr[1]])? $test[$value->id][$attr[1]] : '')?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php if($i%3 == 0 || count(explode('--', $value->attribute_values))== $i):?></div><?php endif;?>
                                <?php $i++; endforeach;?>
                            </div>
                        </div>
                    </div>
                    <?php  endforeach;?>
                    <!--<div class="panel panel-collapse">
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
                                                <input name="test[17][58]" type="text" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                </div>            </div>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="updatebtn btn btn-success" data-url="/patient_edit/udpateTestValues" id="updateTest">Save changes</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        <!-- </div>
    </div>
</div> -->
    