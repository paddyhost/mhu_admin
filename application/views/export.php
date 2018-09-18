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
        </style>
    </head>
    <body>
       <?php $this->load->view('header');?>
        <section id="main" data-layout="layout-1">
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Export Patient Data</h2>
                    </div>
                    <div class="card">
                        <div class="card-body card-padding">
                            <form id="export" name="export" method="post" action="/export/export_csv" onsubmit="return validate()">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Table</label>
                                        <div class="clearfix"></div>
                                        <label class="radio radio-inline m-r-20 m-t-15">
                                            <input type="radio" name='table' value="patient">
                                            <i class="input-helper"></i>
                                            General Patient Records
                                        </label>
                                        <label class="radio radio-inline m-r-20 m-t-15">
                                            <input type="radio" name='table' value="camp_patient">
                                            <i class="input-helper"></i>
                                            Health Camp Patient Records
                                        </label>
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
                                <div class="row text-center m-l-0 m-r-0 m-t-15">
                                    <button type="submit" id="btn_submit" url="/export/export_csv" class="btn btn-success">Export</button>
                                </div>
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
                
                /*$("#btn_submit").click(function(){
                    var url = $(this).attr('url');
                    var is_valid = 1;
                    if(!$('input[name=table]:checked').val()){
                        is_valid = 0;
                        alert('please select table');
                    }
                    if($('#phase').val() == ''){
                        is_valid = 0;
                        alert('please select phase');
                    }
                    var data = $('#export').serializeArray();
                    
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
                                }else {
                                    alert('Something went wrong');
                                }
                            }
                        });
                    }else {
                        alert ('please provide details');
                    }
                });*/
            });
            
            
            $(document).on('click', '.error', function(){
                $(this).removeClass('error');
            })
            
            function validate(){
                var is_valid = 1;
                if(!$('input[name=table]:checked').val()){
                    is_valid = 0;
                    alert('please select table');
                }
                if($('#phase').val() == ''){
                    is_valid = 0;
                    alert('please select phase');
                }
                
                return (is_valid ? true: false );
            }

        </script>
        
    </body>
  </html>

