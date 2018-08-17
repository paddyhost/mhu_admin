<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]--> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MHU | Dashboard</title>
    <?php
    $this->load->view('common_css');

    print_r($aria);
    ?>
</head>
<body>
    <?php $this->load->view('header'); ?>


    <section id="main" data-layout="layout-1">
        <?php //$this->load->view('sidebar'); ?>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Target Population</h4>
                            </div>
                            <div class="card-body card-padding">
                                <!--                            <div id="bar-chart" class="flot-chart"></div>
                                                            <div class="flc-bar"></div>-->
                                <div id="general_chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Area & Month Wise Distribution</h4>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-md-6 col-sm-6 col-xs-12 p-l-0">
                                            <select id="chart1" class="selectpicker" title="Month">
                                                <option  selected value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option val="12">December</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 p-r-0">
                                            <select id="chart1area" class="selectpicker" title="Area">

                                                <?php
                                                foreach ($aria as $key => $value) {
                                                    echo "<option>" . $value["area"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-padding">
                                <!--                            <div id="bar-chart" class="flot-chart"></div>
                                                            <div class="flc-bar"></div>-->
                                <div id="general_chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Overall Complaint Chart</h4>
                    </div>
                    <div class="card-body card-padding">
                        <div id="patient_complaint"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h4>Complaints Month wise & Area Wise</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-6 col-sm-6 col-xs-12 p-l-0">
                                    <select class="selectpicker" title="Month">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option val="12">December</option>

                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 p-r-0">
                                    <select class="selectpicker" title="Area">
                                         <?php
                                                foreach ($aria as $key => $value) {
                                                    echo "<option>" . $value["area"] . "</option>";
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body card-padding">
                        <div id="patient_complaint2"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Child Complaints</h4>
                            </div>
                            <div class="card-body card-padding">
                                <!--                            <div id="bar-chart" class="flot-chart"></div>
                                                            <div class="flc-bar"></div>-->
                                <div id="child_complaint"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Lactating Women Complaints</h4>
                            </div>
                            <div class="card-body card-padding">
                                <!--                            <div id="bar-chart" class="flot-chart"></div>
                                                            <div class="flc-bar"></div>-->
                                <div id="lactating_complaint"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pregnant Women Complaints</h4>
                            </div>
                            <div class="card-body card-padding">
                                <!--                            <div id="bar-chart" class="flot-chart"></div>
                                                            <div class="flc-bar"></div>-->
                                <div id="pregnant_complaint"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Senior Citizens Complaints</h4>
                            </div>
                            <div class="card-body card-padding">
                                <!--                            <div id="bar-chart" class="flot-chart"></div>
                                                            <div class="flc-bar"></div>-->
                                <div id="senior_complaint"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Test Details</h4>
                            </div>
                            <div class="card-body card-padding">
                                <div id="test"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
<?php $this->load->view('common_js'); ?>
    <script>
        var general_chart = c3.generate({
            bindto: '#general_chart',
            data: {
                url: '/admin/ajax_getTotalpatientCount',
                type: 'bar',
                mimeType: 'json'
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [''],
                    label: 'Patient Categories'
                },
                y: {
                    label: 'Target Population Count'
                }
            },
            bar: {
                width: 50
            }
        });

        var general_chart2 = c3.generate({
            bindto: '#general_chart2',
            data: {
                columns: [
                    ['data1', 30],
                    ['data2', 130],
                    ['data3', 80],
                    ['data4', 20]
                ],
                type: 'bar',
                names: {
                    data1: 'Child Under 19',
                    data2: 'Lactating Women',
                    data3: 'Pregnant Women',
                    data4: 'Senior citizen above 60'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [''],
                    label: 'Patient Categories'
                },
                y: {
                    label: 'Target Population Count'
                }
            },
            bar: {
                width: 50
            }
        });
        general_chart2.unload();
$( "#chart1area" ).change(function() {
   var month= $( "#chart1 option:selected" ).val();
  var aria=  $( "#chart1area option:selected" ).val();
  
  general_chart2.unload();
  general_chart2.load({
        url: '/admin/ajax_getTotalpatientCount?month='+month+'&aria='+aria,
         type: 'bar',
                mimeType: 'json'
    });



});

$( "#chart1" ).change(function() {
    
$( "#chart1area option:selected" ).removeAttr("selected");
  general_chart2.unload();
  



});
      

        var patient_complaint = c3.generate({
            bindto: '#patient_complaint',
            data: {
                
                groups: [
                    ['data1', 'data2', 'data3', 'data4', 'data5', 'data6', 'data7', 'data8', 'data9', 'data10']
                ],
       
                url: '/admin/ajax_getpatient_complaint',
                mimeType: 'json',

            
                type: 'bar'
            },
            axis: {
                x: {
                    type: 'category',
                    //categories: ['Fever', 'Bodyache', 'Cough', 'Cough Cold', 'Allergic', 'Abdominal Pain', 'Ranalcalkulus', 'Joint Pain', 'Gastritis', 'Knee Pain'],
                    label: 'Patient Categories'
                },
                y: {
                    label: 'Complaints Count'
                }
            },
            bar: {
                width: {
                    ratio: 0.5 // this makes bar width 50% of length between ticks
                }
                // or
                //width: 100 // this makes bar width 100px
            }
        });

        var patient_complaint2 = c3.generate({
            bindto: '#patient_complaint2',
            data: {
                x: 'x',
                columns: [
                    ['x', 'Child', 'Lactating Women', 'Pregnant Women', 'Senior citizen'],
                    ['data1', 30, 200, 100, 400],
                    ['data2', 130, 300, 200, 300],
                    ['data3', 80, 150, 100, 180],
                    ['data4', 20, 100, 50, 150],
                    ['data5', 20, 100, 50, 150],
                    ['data6', 20, 100, 50, 150],
                    ['data7', 20, 100, 50, 150],
                    ['data8', 20, 100, 50, 150],
                    ['data9', 20, 100, 50, 150],
                    ['data10', 20, 100, 50, 150]
                ],
                groups: [
                    ['data1', 'data2', 'data3', 'data4', 'data5', 'data6', 'data7', 'data8', 'data9', 'data10']
                ],
                names: {
                    data1: 'Fever',
                    data2: 'Bodyache ',
                    data3: 'Cough',
                    data4: 'Cough Cold',
                    data5: 'Allergic',
                    data6: 'Abdominal Pain',
                    data7: 'Ranalcalkulus',
                    data8: 'Joint Pain',
                    data9: 'Gastritis',
                    data10: 'Knee Pain'
                },
                type: 'bar'
            },
            axis: {
                x: {
                    type: 'category',
                    //categories: ['Fever', 'Bodyache', 'Cough', 'Cough Cold', 'Allergic', 'Abdominal Pain', 'Ranalcalkulus', 'Joint Pain', 'Gastritis', 'Knee Pain'],
                    label: 'Patient Categories'
                },
                y: {
                    label: 'Complaints Count'
                }
            },
            bar: {
                width: {
                    ratio: 0.5 // this makes bar width 50% of length between ticks
                }
                // or
                //width: 100 // this makes bar width 100px
            }
        });

        var child_complaint = c3.generate({
            bindto: '#child_complaint',
            data: {
                url: '/admin/ajax_getComplentCountBy?cat=C',
                type: 'bar',
                mimeType: 'json'
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [''],
                    label: 'Complaints Categories'
                },
                y: {
                    label: 'Child Complaint Count'
                }
            },
            bar: {
                width: 50
            }
        });

        var lactating_complaint = c3.generate({
            bindto: '#lactating_complaint',
            data: {
                url: '/admin/ajax_getComplentCountBy?cat=LW',
                type: 'bar',
                mimeType: 'json'
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [''],
                    label: 'Complaints Categories'
                },
                y: {
                    label: 'Lactating Woment Complaint Count'
                }
            },
            bar: {
                width: 50
            }
        });

        var pregnant_complaint = c3.generate({
            bindto: '#pregnant_complaint',
            data: {
              url: '/admin/ajax_getComplentCountBy?cat=PW',
                type: 'bar',
                mimeType: 'json'
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [''],
                    label: 'Complaints Categories'
                },
                y: {
                    label: 'Pregnant Woment Complaint Count'
                }
            },
            bar: {
                width: 50
            }
        });

        var senior_complaint = c3.generate({
            bindto: '#senior_complaint',
            data: {
                url: '/admin/ajax_getComplentCountBy?cat=C',
                type: 'bar',
                mimeType: 'json'
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [''],
                    label: 'Complaints Categories'
                },
                y: {
                    label: 'Senior Citizens Complaint Count'
                }
            },
            bar: {
                width: 50
            }
        });

        var test = c3.generate({
            bindto: '#test',
            data: {
                x: 'x',
                columns: [
                    ['x', 'CBC', 'LFT', 'KFT', 'Lipid Profile', 'BSR', 'Widal', 'Typhoid', 'Maleria Serology', 'RA Factor', 'HBSAG'],
                    ['data1', 30, 200, 100, 400, 30, 200, 100, 400, 100, 400],
                    ['data2', 130, 300, 200, 300, 130, 300, 200, 300, 200, 300],
                    ['data3', 80, 150, 100, 180, 80, 150, 100, 180, 100, 180],
                    ['data4', 20, 100, 50, 150, 20, 100, 50, 150, 50, 150]
                ],
                groups: [
                    ['data1', 'data2', 'data3', 'data4']
                ],
                type: 'bar',
                names: {
                    data1: 'Child',
                    data2: 'Lactating Women',
                    data3: 'Pregnant Women',
                    data4: 'Senior citizen'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['CBC', 'LFT', 'KFT', 'Lipid Profile', 'BSR', 'Widal', 'Typhoid', 'Maleria Serology', 'RA Factor', 'HBSAG'],
                    label: 'Test Name'
                },
                y: {
                    label: 'Patient Count'
                }
            },
            bar: {
                width: {
                    ratio: 0.5 // this makes bar width 50% of length between ticks
                }
                // or
                //width: 100 // this makes bar width 100px
            }
        });
    </script>
</body>
</html>

