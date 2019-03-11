<?php if(!empty($patient_record)):?>
<?php $medical = $patient_record['medical']; $arr = ['Y'=>'Yes','N'=>'No', 'DN'=>'Dont know', ''=>'NA', NULL=>'NA']; //print_r($patient_record['medical']);?>

        <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="card m-b-20">
                <div class="card-header" style="overflow: hidden">
                    <h4 class="pull-left">Medical Condition</h4>
                    <!-- <button class="btn btn-primary waves-effect pull-right" data-toggle="modal" data-target="#modalMedicalcondition">Edit</button> -->
                </div>
                <!-- <pre><?php //print_r($medical);?></pre> -->
                <div class="card-body card-padding">
                    <?php if (!empty($medical)): ?>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12">Chief Complaint</label>
                            <p class="col-md-9 col-sm-9 col-xs-12">
                                1: <?php echo (!empty($medical->chiefcomplaints1) ? $medical->chiefcomplaints1 : 'NA') ?><br>
                                2: <?php echo (!empty($medical->chiefcomplaints2) ? $medical->chiefcomplaints2 : 'NA') ?><br>
                                3: <?php echo (!empty($medical->chiefcomplaints3) ? $medical->chiefcomplaints3 : 'NA') ?>
                            </p>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Brief History</label>
                            <p class="col-md-9 col-sm-9 col-xs-12">
                                1: <?php echo (!empty($medical->briefHistory1) ? $medical->briefHistory1 : 'NA') ?><br>
                                2: <?php echo (!empty($medical->briefHistory2) ? $medical->briefHistory2 : 'NA') ?><br>
                                3: <?php echo (!empty($medical->briefHistory3) ? $medical->briefHistory3 : 'NA') ?>
                            </p>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Previous Investigation</label>
                            <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($medical->investigation) ? $arr[$medical->investigation] : 'NA') ?></p>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Treatment Taken</label>
                            <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($medical->tratementtaken) ? $arr[$medical->tratementtaken] : 'NA') ?></p>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Diagnosys</label>
                            <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($medical->diagnosys) ? $medical->diagnosys : 'NA') ?></p>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Diagnosed disease</label>
                            <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($medical->disease) ? $medical->disease : $medical->specific_disease) ?></p>
                        </div>
                        <hr>
                        <div class="row m-l-0 m-r-0">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0 p-l-0 p-r-0">Prescribed Dose</label>
                            <div class="clearfix"></div><br>
                            <?php if (!empty($medical->prescribe_dose)): ?>
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Sr.No.</th>
                                    <th>Medicine</th>
                                    <th>Dose</th>
                                    <th>Dosage Time</th>
                                    <th>After Meal</th>
                                    <th>Frequency</th>
                                    <th>Days</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($medical->prescribe_dose as $key => $value): ?>
                                            <tr>
                                                <?php // print_r($value);?>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->frequency; ?> times/day</td>
                                                <td><?php echo (isset($value->time) ? $value->time : 'NA'); ?></td>
                                                <td><?php echo $value->aftermeal; ?></td>
                                                <td><?php echo $value->days; ?></td>
                                                <td><?php echo $value->medicalconditionid; ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p style="text-align: center">NA</p>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <p>No medical information available</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card m-b-20">
                <div class="card-header">
                    <h4 class="pull-left">Test conducted by MHU</h4>
                    <button data-toggle="modal" data-url="/patient_edit/testByMhu" class="loadModal btn btn-primary pull-right">Edit</button><!--data-target="#modalTestMhu" -->
                </div><div class="clearfix"></div>
                <div class="card-body card-padding">
                    <?php $test = $patient_record['test']; //print_r($patient_record['test']); ?>
                    <?php if (!empty($test)): ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Test name.</th>
                                    <th>Test attribute</th>
                                    <th>Reference value</th>
                                    <th>Reading</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($test as $key => $value): ?>
                                    <tr>
                                        <td rowspan="<?php echo count($value) + 1; ?>"><strong> <?php echo $key; ?> </strong></td>
                                        <?php // echo '<pre>'; print_r($value); echo '</pre>';?>
                                        <!--<td rowspan="<?php echo count($value) + 1; ?>" colspan="3">-->
                                        <?php foreach ($value as $akey => $avalue): ?>
                                        <tr>
                                            <?php $valuename = explode('=', $avalue);
                                            $ref_read = explode('-', $valuename[1]);
                                            ?>
                                            <td><?php echo $valuename[0]; ?></td>
                                            <td><?php echo $ref_read[1]; ?></td>
                                            <td><?php echo $ref_read[0]; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <!--</td>-->
                                    </tr>
        <?php endforeach; ?>

                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No test information available</p>
    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="card m-b-20">
                <div class="card-header">
                    <h4 class="pull-left">Vital Information</h4>
                    <!-- <button data-toggle="modal" data-target="#modalVitalinfo" class="btn btn-primary pull-right">Edit</button> -->
                </div><div class="clearfix"></div>
                <div class="card-body card-padding">
                    <?php $vital = $patient_record['vital']; //print_r($patient_record['vital']); ?>
    <?php if (!empty($vital)): ?>

                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Height</label>
                            <p class="col-md-9 col-sm-9 col-xs-12 text-right"><?php echo (!empty($vital->height) ? $vital->height : 'NA') ?></p>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Weight</label>
                            <p class="col-md-9 col-sm-9 col-xs-12 text-right"><?php echo (!empty($vital->weight) ? $vital->weight : 'NA') ?></p>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">BP</label>
                            <p class="col-md-9 col-sm-9 col-xs-12 text-right"><?php echo (!empty($vital->bloodpresure) ? $vital->bloodpresure . '/' . $vital->bpto : 'NA') ?></p>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Temperature</label>
                            <p class="col-md-9 col-sm-9 col-xs-12 text-right"><?php echo (!empty($vital->tempreture) ? $vital->tempreture : 'NA') ?> <sup>0</span></sup> F</p>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Respiration</label>
                            <p class="col-md-9 col-sm-9 col-xs-12 text-right"><?php echo (!empty($vital->respiration) ? $vital->respiration : 'NA') ?></p>
                        </div>
                    <?php else: ?>
                        <p>No Vital information available</p>
    <?php endif; ?>
                </div>
            </div>
            <div class="card m-b-20">
                <div class="card-header">
                    <h4 class="pull-left">Vaccination Record</h4>
                    <!-- <button data-toggle="modal" data-target="#modalVaccinationRecord" class="btn btn-primary pull-right">Edit</button> -->
                </div><div class="clearfix"></div>
                <div class="card-body card-padding">
                    <?php
                    $vaccination = $patient_record['vaccination']; //print_r($patient_record['vaccination']);
                    $valid = ['dpt', 'bcg', 'measles', 'opv', 'ttt', 'hepatitis', 'other'];
                    ?>
                        <?php if (!empty($vaccination)): ?>
                        <table class="table table-bordered">
                            <?php foreach ($vaccination as $key => $value): ?>
            <?php if (in_array($key, $valid)): ?>
                                    <tr>
                                        <td>
                                            <?php
                                            if ($key == 'ttt') {
                                                echo 'TT';
                                            } else if ($key == 'hepatitis') {
                                                echo 'Hepatitis B';
                                            } else {
                                                echo strtoupper($key);
                                            }
                                            ?>
                                        </td>
                                        <td>
                                    <?php echo $value ?>
                                        </td>
                                    </tr>
            <?php endif; ?>
        <?php endforeach; ?>

        
                        </table>
    <?php else: ?>
                        <p>No vaccination information available</p>
    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php else:?>
<p style="text-align: center">No details available </p>
<?php endif; ?>

