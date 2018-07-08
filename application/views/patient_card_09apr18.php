<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RMP / Patient Card</title>
        <?php $this->load->view('common_css');?>
    </head>
    <body class="sw-toggled">
        <?php $this->load->view('header');?>
        <section id="main" data-layout="layout-1">
            <?php $this->load->view('sidebar');?>
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h4 class="text-center">Patient Registration Card<br><span class="f-300">Swasthya Suvidhayen Apke Dwar</span><br><span class="f-300">( Mobile Health Unit )</span></h4>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h4>Prasad Wamanrao Gote</h4>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <h4>Reg. No. 123456</h4>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <select class="selectpicker" title="Select Visit">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body card-padding row">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">DOB</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">27/11/1990</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Age</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">27 Years</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Patient Category</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">Other</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Date of Registration</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">31/01/2018</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Name of Cluster/ Address</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">Plot No.12, N-8, New Swami Vivekanand Hsg., Society, Cidco, Aurangabad</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Mobile</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">9860402800</p>
                                </div>
                                <hr>
                                <h4 class="m-b-20">Medical Condition</h4>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12">Chief Complaint</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">sdfsdf</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Brief History</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">sdfsdf</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Previous Investigation</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">Yes</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Treatment Taken</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">Yes</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Diagnosys</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">sdfsdf</p>
                                </div>
                                <div class="row m-l-0 m-r-0">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0 p-l-0 p-r-0">Prescribed Dose</label>
                                    <div class="clearfix"></div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Sr.No.</th>
                                            <th>Medicine</th>
                                            <th>Dose</th>
                                            <th>Frequency</th>
                                            <th>Days</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>sdfasdf</td>
                                                <td>sdfasdf</td>
                                                <td>3</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>sdfasdf</td>
                                                <td>sdfasdf</td>
                                                <td>3</td>
                                                <td>3</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <h4 class="m-t-20">Test conducted by MHU</h4>
                                <table class="table table-bordered m-t-20">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Test Name</th>
                                            <th>Reference Value</th>
                                            <th>Reading</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>1</td><td><strong>Complete Blood Count (CBC)/ Homogram (Hgm)</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>CBB/ Hgm</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Hb</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>TLC</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>DLC</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>PCV</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>RBC count</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Platelet count</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>MCV/MCH/MCHC</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>ESR</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>AEC</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>2</td><td><strong>Liver Function Test (LFT)</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>D Bil</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>ID Bil</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>T - Bil</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>T-Prot</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>A/G Rat</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>ALT</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>AST</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>ALP</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Comp. LFT</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>GGT</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Alb</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>3</td><td><strong>Kidney Function Test</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Urea</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Creat.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Uric Acid</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Electrolyte (Na, K. Cl)</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>T Prot</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>A1b</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>A1b/Cr Ratio</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Micro Albumin</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Comp.KFT</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>4</td><td><strong>Lipid Profile</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Cholesterol</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>TAG</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>HDL</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Complete Lipid Profile (TCHOL, TAG, HDL, LDL, VLDL)</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>5</td><td><strong>Glucose Profile (BSR)</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>FBG</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>2 Hr</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Random</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>GTT (0,1,2,3 Hrs)</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>HbA1c</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Urinary Micro Albumin</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Insulin F/PP</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>6</td><td><strong>WIDAL</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>7</td><td><strong>TYPHIDOT</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>8</td><td><strong>Malaria Serology</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>9</td><td><strong>RA Factor</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>10</td><td><strong>HBSAG (Hepatitis B AG)</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>11</td><td><strong>Urine Examination</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Routine & Microsocopic</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Protein</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Sugar</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Ketone Bodies</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Bile salt/ bile Pigments</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td><td>Urine Pregnancy Test</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>12</td><td><strong>CRP</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>13</td><td><strong>Anti HCV</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>14</td><td><strong>HIV</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>15</td><td><strong>VDRL</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>16</td><td><strong>GCT</strong></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                        <tr><td>17</td><td><strong>ABO RH (Blood Group)</strong></td><td>&nbsp;</td><td></td></tr>
                                    </tbody></table>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <h4 class="m-b-20">Vital Information</h4>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Height</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">170 cm</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Weight</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">50 kg</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">BP</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">120 / 80</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Temperature</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">60 <sup>0</span></sup> F</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Respiration</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12"></p>
                                </div>
                                <hr>
                                <h4 class="m-b-20">Vaccination Record</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            DPT
                                        </td>
                                        <td>
                                            Yes
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            BCG
                                        </td>
                                        <td>
                                            Yes
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Measles
                                        </td>
                                        <td>
                                            Yes
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            OPV
                                        </td>
                                        <td>
                                            Yes
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Hepatitis B
                                        </td>
                                        <td>
                                            Yes
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            TT
                                        </td>
                                        <td>
                                            Yes
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Any Other
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <h4 class="m-b-20">Previous Records</h4>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Previous Doctor Name</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">asdfasdfasdf</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Previous Hospital</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">asdfasdfasdf</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Test Prescribed</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">asdfasdfasdf ssdfsdfsdfsdf</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Referred</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">asdfasdfasdf</p>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 m-t-0">Remarks</label>
                                    <p class="col-md-9 col-sm-9 col-xs-12">asdfasdfasdf asdfasdf asdfasdf</p>
                                </div>
                            </div>
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
                $("#data-table-command").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-primary btn-xs waves-effect\" data-row-id=\"" + row.id + "\">View</button> ";
                        }
                    }
                });
            });
        </script>
    </body>
  </html>

