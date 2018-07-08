<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RMP | Patient List</title>
        <?php $this->load->view('common_css');?>
    </head>
    <body class="sw-toggled">
       <?php $this->load->view('header');?>
        <section id="main" data-layout="layout-1">
           <?php $this->load->view('sidebar');?>
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Patient Registration List</h2>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body card-padding">
                            <table id="data-table-command" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th data-column-id="registration_no" data-type="reg_no">Registration No.</th>
                                    <th data-column-id="regitrationdate">Date of Registration</th>
                                    <th data-column-id="fname" data-order="name">Name</th>
                                    <th data-column-id="pcat">Patient Category</th>
                                    <th data-column-id="mobile">Mobile</th>
                                    <th data-column-id="gender">Gender</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
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
      
        <!-- Data Table -->
        <script type="text/javascript">
            $(document).ready(function(){
                //Command Buttons
                var bgrid = $("#data-table-command").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    ajax: true,
                    post: function ()
                    {
                        return {
                         id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
                     };
    },
    url: "/admin/getPatientList",


                    formatters: {
                        "commands": function(column, row) {
                            return "<a href=\"patientcard\" class=\"btn btn-primary btn-xs waves-effect command-view\" data-row-id=\"" + row.id + "\">View</button> ";
                        }
                    }
                }).on("loaded.rs.jquery.bootgrid", function ()
                {
                    bgrid.find(".btn_student_pin").on("click", function () {
                    }).end().find(".command-view").on("click", function () {
                        
                    });
                });
            });
        </script>
    </body>
  </html>

