<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MHU | Patient List</title>
        <?php $this->load->view('common_css');?>
    </head>
    <body>
       <?php $this->load->view('header');?>
        <section id="main" data-layout="layout-1">
           <?php //$this->load->view('sidebar');?>
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Patient List</h2>
                    </div>
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <table id="data-table-command" class="table table-striped">
                            <thead>
                                <tr>
                                    <th data-column-id="registration_no" data-type="reg_no" data-width="200px">Registration No.</th>
                                    <th data-column-id="regitrationdate" data-width="200px">Registration Date</th>
                                    <th data-column-id="fname" data-order="name">Name</th>
                                    <th data-column-id="patient_category" data-formatter="patient_category">Patient Category</th>
                                    <th data-column-id="mobile">Mobile</th>
                                    <th data-column-id="gender" data-width="100px">Gender</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false" data-width="80px"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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
                var category = {'PW':'Pregnant women', 'LW':'Lactating women','C':'Child below 5 yrs.', 'S':'Senior above 60yrs', 'O':'other', '':'NA'}
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
                            return '<a href="patientcard/'+row.id+'" class="btn btn-info btn-xs waves-effect command-view" data-row-id="' + row.id + '">View</button> ';
                        },
                        "patient_category": function(column, row) {
                            return category[row.patient_category]
                        },

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

