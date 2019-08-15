<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RMP / Patient Card</title>
    <?php $this->load->view('common_css'); ?>
</head>
<body>
    <?php $this->load->view('header'); ?>
    <section id="main" data-layout="layout-1">
        <?php //$this->load->view('sidebar'); ?>
        <section id="content">
            <div class="container">
                <div class="block-header">
                    <h2>Patient History</h2>
                </div>
                <?php if (!empty($patient)): ?>
                    <?php // print_r($patient); ?>
                    <div class="card m-b-20">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <h4>Patient Name : <?php echo ucwords($patient->fname . ' ' . $patient->lanme); ?></h4>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <h4>Reg. No. <?php echo (!empty($patient->registration_no)? $patient->registration_no : 'NA')?></h4>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="selectpicker" title="Select Visit" id="loadvisitinfo">
                                        <?php if (!empty($visit)): ?>
                                            <?php foreach ($visit as $key => $value): ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $key + 1 ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No visit available</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-12 text-right">
                                    <button data-url="/patient_edit/generalInfo" class="loadModal btn btn-primary waves-effect pull-right" data-toggle="modal" data-target="#modalGeninfo">Edit</button>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body card-padding row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-calendar-alt zmdi-hc-fw"></i>&nbsp;&nbsp;DOB</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($patient->dob) && $patient->dob != '0000-00-00'? date('d-M-Y',  strtotime($patient->dob)) : 'NA')?></p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-time zmdi-hc-fw"></i>&nbsp;&nbsp;Age</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">
                                        <?php if(!empty($patient->age)){
                                            echo $patient->age.' Yrs.';
                                        } elseif(!empty($patient->dob)){
                                            $d1 = new DateTime(date('Y-m-d'));
                                            $d2 = new DateTime(date('Y-m-d',  strtotime($patient->dob)));
                                            $diff = $d2->diff($d1);
                                            echo $diff->y.' Yrs.';
                                        }else {
                                            echo 'NA';
                                        };?></p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-account-box-o zmdi-hc-fw"></i>&nbsp;&nbsp;Patient Category</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">
                                        <?php 
                                            $patient_category = ['PW'=>'Pregnant Women', 'LW'=>'Lactating Women', 'C'=>'Child below 5 yrs.', 'S'=>'Senor above 60 yrs.', NULL => 'NA' ,'O'=>'other'];
                                            echo (!empty($patient->patient_category)? $patient_category[$patient->patient_category] : 'NA');
                                        ?>
                                    </p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i>&nbsp;&nbsp;Date of Registration</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($patient->regitrationdate)? $patient->regitrationdate : 'NA')?></p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-pin-drop zmdi-hc-fw"></i>&nbsp;&nbsp;Name of Cluster/ Address</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($patient->address)? $patient->address.'&nbsp' : 'NA')?>
                                        <?php echo (!empty($patient->location)? $patient->location.'&nbsp' : 'NA');?>
                                        <?php echo (!empty($patient->area)? $patient->area.'&nbsp' : 'NA');?>
                                        <?php echo (!empty($patient->city)? $patient->city.'&nbsp' : 'NA');?>
                                        <?php echo (!empty($patient->district)? $patient->district.'&nbsp' : 'NA');?>
                                        <?php echo (!empty($patient->state)? $patient->state : 'NA');?>
                                        <!--Plot No.12, N-8, New Swami Vivekanand Hsg., Society, Cidco, Aurangabad-->
                                    </p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0"><i class="zmdi zmdi-smartphone-ring zmdi-hc-fw"></i>&nbsp;&nbsp;Mobile</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12"><?php echo (!empty($patient->mobile)? $patient->mobile : 'NA')?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-l-0 m-r-0" id="loadinfo">
                        <p style="text-align: center">Please select from the drop down list to view detail information.</p>
                        <?php // $this->load->view('patientinfo');?>
                    </div> 
                <?php else: ?>
                    <h4>No records available</h4>
                <?php endif; ?>
            </div>
        </section>
    </section>
    <?php $this->load->view('footer'); ?>
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="preloader pls-blue">
            <svg class="pl-circular" viewBox="25 25 50 50">
            <circle class="plc-path" cx="50" cy="50" r="20" />
            </svg>

            <p>Please wait...</p>
        </div>
    </div>
    
    <!--Edit Modal-->
    <?php //$this->load->view('edit-modal/testbymhu'); ?>
    <div class="modal fade" id="modalTestMhu" data-patient="<?php echo $patient->id?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modalContent">

            </div>
        </div>
    </div>

    <?php $this->load->view('common_js'); ?>
    <!-- Data Table -->
    <script type="text/javascript">
        $(document).ready(function () {
            //Command Buttons
            $("#data-table-command").bootgrid({
                css: {
                    icon: 'zmdi icon',
                    iconColumns: 'zmdi-view-module',
                    iconDown: 'zmdi-expand-more',
                    iconRefresh: 'zmdi-refresh',
                    iconUp: 'zmdi-expand-less'
                },
                formatters: {
                    "commands": function (column, row) {
                        return "<button type=\"button\" class=\"btn btn-primary btn-xs waves-effect\" data-row-id=\"" + row.id + "\">View</button> ";
                    }
                }
            });
        });

        $(document).on('change','#loadvisitinfo',function(){
            var id= $(this).val();
            if(id){
                var url = '/admin/getpatientbyvisit' ;
                $.ajax({
                    url: url,
                    dataType: 'json',
                    async: false,
                    type: 'POST',
                    data: {id:id},
                    success: function (response) {
                        $('#loadinfo').empty().html(response.view);
                        $(".selectpicker").selectpicker()
                        // hide presccribe add button
                        $("#prescribeDoseBtn").hide();
                    }
                });
            }
            
        });

        $(document).on('click','.loadModal',function(){
            var data = $(this).data('url')
            var pid = <?php echo $patient->id; ?> ;
            var visit= $("#loadvisitinfo").val();
            if(visit || pid){
                var url = data +'/'+ pid +'/'+ visit ;
                $.ajax({
                    url: url,
                    // dataType: 'json',
                    async: false,
                    type: 'POST',
                    data: {},
                    success: function (response) {
                        $('#modalContent').empty().html(response);
                        $("#modalTestMhu").modal('show')
                        $(".selectpicker").selectpicker()
                        $('.date-picker').datetimepicker({
                            format: 'DD-MM-YYYY'
                        });
                    }
                });
            }
        });

        $(document).on('click','.updatebtn',function(){
            var id = $(this).attr('id');
            var pid = <?php echo $patient->id; ?> ;
            var reg = '<?php echo $patient->registration_no; ?>' ;
            var visit= $("#loadvisitinfo").val();
            var visit_not_applicable = false
            var is_valid = true
            if(id == 'updateTest'){
                var postData = $("#testByMhuBody input").serializeArray()
            }else if(id == 'updateMedical'){
                if($("#diagnosed_diseases").val() == '' && $("#other_diseases").val() == ''){
                    alert('Please select the disease');
                    return false;
                }
                var postData = $("#medicalcondition input, select").serializeArray()
            }else if(id == 'updateGenral'){
                visit_not_applicable = true
                var postData = $("#generaInfo input, select").serializeArray()
            }else if(id== 'prescribeDoseBtn'){
                var postData = $("#prescribe_form input").serializeArray()
            }
            
            postData.push({name: 'pid', value: pid});
            postData.push({name: 'visit_master_id', value: visit});
            postData.push({name: 'registration_id', value: reg});

            if(visit || visit_not_applicable){
                $.ajax({
                    url: $(this).data('url'),
                    dataType: 'json',
                    async: false,
                    type: 'POST',
                    data: postData,
                    success: function (response) {
                        alert(response.message)
                        if(response.code == 201 || response.code == 204){
                            $("#modalTestMhu").modal('hide')
                            window.location.reload();
                        }
                            
                        
                    }
                });
            }
        });

        $(document).on('change', '#diagnosed_diseases', function(){
            $(".other_div").hide();
            var selected = $(this).val()
            if( selected === ''){
                $(".other_div").show();
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

        // function for prescribe dose 
        $(document).on('click', '#btn_prescrib_struct', function(){
            var is_valid = true;
            $('#prescribe_dose .selectpicker').each(function(i,e){
                if($(this).val() == ''){
                    is_valid = false;
                    $(this).next().addClass('error_sel');
                }
                
            })
            var days = $('#days').val();
            if( days == '' || isNaN(days)){
                is_valid = false;
                $('#days').addClass('error');
            }
            
            if(!$('input[name=aftermeal]:checked').val()){
                is_valid = false;
            }
            
            if(!is_valid){
                alert('please provide data');
                return false;
            }
            
            var url = $(this).attr('url');
            $.ajax({
                url: url,
                dataType: 'json',
                async: false,
                type: 'POST',
                data: $('#prescribe_dose').serializeArray(),
                success: function (response) {
                    if(response.code == 200){
                        $("#prescribe_dose_table tbody").append(response.data);
                        $("#prescribe_dose #name, #frequency, #days").val('').selectpicker('refresh');
                        $("input[name='aftermeal']").prop('checked',false);
                        $('#modalPrescription').modal('hide');
                        $("#prescribeDoseBtn").show()
                    }
                }
            });
        });
        
        $(document).on('click', '.remove', function(){
            $(this).closest('tr').remove();
        });
        

    </script>
</body>
</html>

