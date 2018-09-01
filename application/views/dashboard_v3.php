<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]--> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MHU | Dashboard</title>
    <?php
   // print_r($aria);
   // die();
    $this->load->view('common_css');

    //print_r($aria);
    ?>
</head>
<body>
    <?php $this->load->view('header'); ?>


    <section id="main" data-layout="layout-1">
         
        <?php //$this->load->view('sidebar'); ?>
        <section id="content">
            <div class="container " >
            <!--<div class="row">-->
                <div class="card col-md-5 col-sm-5 col-xs-12">
                    <select id="phase" class="selectpicker" title="Select Phase">
                        <?php $i=1; while ($i<=10):?>
                        <option <?php echo ($i == $phase ? 'selected="selected"': ''); ?> value="<?= $i?>"> Phase <?= $i?></option>
                        <?php $i++; endwhile;?>
<!--                        <option value="1" selected="true">PHASE 1</option>
                        <option value="2">PHASE 2</option>-->
                    </select>
                </div>
            <!--</div>-->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Cases received</h4>
                                <!--<h4>Target Population</h4>-->
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
                                        <h4>Zone wise cases received</h4>
                                        <!--<h4>Area & Month Wise Distribution</h4>-->
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
                                            <select id="chart1area" class="selectpicker" title="Location">

                                                <?php
                                                foreach ($aria as $key => $value) {
                                                    echo "<option>" . $value["location"] . "</option>";
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
                        <h4>Distribution of symptoms amongst cases</h4>
                        <!--<h4>Overall Complaint Chart</h4>-->
                    </div>
                    <div class="card-body card-padding">
                        <div id="patient_complaint"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h4>Zone wise prevalence of diseases</h4>
                                <!--<h4>Complaints Month wise & Area Wise</h4>-->
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-6 col-sm-6 col-xs-12 p-l-0">
                                    <select class="selectpicker" id="patient_complaintmonth" title="Month">
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
                                    <select class="selectpicker" id="patient_complaintaria" title="Location">
                                         <?php
                                                foreach ($aria as $key => $value) {
                                                    $location[] = $value['location']; 
                                                    echo "<option>" . $value["location"] . "</option>";
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
                                <h4>Pediatric symptoms</h4>
                                <!--<h4>Child Complaints</h4>-->
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
                                <h4>Lactating women symptoms</h4>
                                <!--<h4>Lactating Women Complaints</h4>-->
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
                                <h4>Symptoms in Gravida</h4>
                            </div>
                            <div class="card-body card-padding">
                                <div id="pregnant_complaint"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Geriatic symptoms</h4>
                            </div>
                            <div class="card-body card-padding">
                                <div id="senior_complaint"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Blood investigations</h4>
                                <!--<h4>Test Details</h4>-->
                            </div>
                            <div class="card-body card-padding">
                                <div id="test"></div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="card">
                    <div class="card-header">
                        <h4>Target population achieve during health camp</h4>
                    </div>
                    <div class="card-body card-padding">
                        <div id="TargetPopulationLocation"></div>
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
        
        
        var phase=1; 
        
        $("#phase").change(function() {
            phase = $( "#phase option:selected" ).val();
            var url = window.location.href;
            var spl = url.split('/'); spl = spl.slice(0,5); spl.push(phase)
            var new_url = spl.join('/');
            window.location = new_url; 
            //load(); 
        });
        
        function load(){
        var general_chart = c3.generate({
            bindto: '#general_chart',
            data: {
                url: '/admin/ajax_getTotalpatientCount/'+phase,
                type: 'bar',
                mimeType: 'json',
                empty: { label: { text: "No Data Available" } }
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
                },
                empty: { label: { text: "No Data Available" } }
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
            var aria= $( "#chart1area option:selected" ).val();
  
            general_chart2.unload();
            general_chart2.load({
                url: '/admin/ajax_getTotalpatientCountby/'+phase+'?month='+month+'&aria='+aria,
                type: 'bar',
                mimeType: 'json',
                empty: { label: { text: "No Data Available" } }
            });
        });

        $("#chart1").change(function() {    
            $("#chart1area option:selected").removeAttr("selected");
            general_chart2.unload();
        });
        
        
        var patient_complaint = c3.generate({
            bindto: '#patient_complaint',
            data: {
                x:'x',
                url:'/admin/ajax_getpatient_complaint/'+phase,
                mimeType: 'json',
                type: 'bar',
                groups: [
                   ["A\/C","A\/p","Abdominal Pain","AC","Acane","ACEE","ACGE","Achme","Acidity","ACN","Acne","AD","Adima","AEG","AEGE","AFA","AFI","AFT","AGE","ALBA","Alergic\/Anemic","Allergic","Alser","Aminoria","ANC","ANC Profile","Anemic","Animia","Anxity","Apatite","ARI","Asthama","Aztomla","B\/C","B\/COA","BA","Backache","Bary Bary","BD","Bleeding","Blood In Isputam","Bloodgroup","Bluered Vision","Blunt Troma","Body Alergy","Bodyache","Boils","BPH","Breathlessness","Bronchial","Bronchintis","Burn","Burning Eyes","Burning Mituration","C\/S","Calcium DEF","CBA","Cervical Pain","Chest Congection","Chest Pain","Chestconjection","CLW","CNS","Cold","colic","Colitis","Conjuctivitis","Constipation","COPD","Corn","Costipation","Cough","Cough and alergic","Cough Cold","Cough\/Pruritis","CRI","CRIF\/AFI","CS","CST","D-D3","Darma","Dehydration","Dendruff","Dermatitis","Diarrhoea","Dispepsia","Dizzeness","DMT2","Dry Cough","Dysmanuria","Ear Discharge","Ear infection","Ear itching","Ear Pain","Ear Problum","Ear Wax","Earache","Eardisoder","EFI","Elbo Pain","Epitaxis","Eye Discharge","Eye Disoder","Eye Eaching","Eye Iching","Eye Infaction","Eye infection","Eye Pain","Eye Problum","eye redness","Eye Sweling","Eyeinfaction","EyePain","Facetroma","FBA","FBI","Fever","FLU","Fungle Infection","Fungos","Gastritis","Gout","Hadache","Haemoroid","Hairfall","Hand Pain","Hand Swelling","Harpees","Harpes","HDN","Heart burn","Hematuria","Hepatite","Hepatomegaly","Hert burn","Heumorrhoid","High Urination","himaturia","Hipatomigalig","HP","HPN","HTM","HTN","HTN\/Cold","Hydrosil","Hypertenson","Hypo","Hypothiroid","Hypothiroxin","I-Durma","Indigetion","Infection","Injury","insomnia","Irregular Periods","Itching","Joint Pain","K\/C\/O","KFI","Kidney Ston","Knee Pain","lag sweeling","LBA","LBC","LBI","LBS","Leg Pain","Leucorrhea","Limpnod","Lipoma","Livecoma","Loosmotion","low apetite","Low Urinaton","Low VC","low Vit.","Low Vitamin","LRTI","Lucodurma","Lucoria","Measeles","Migrain","Mouth Allerge","Mouth Alsar","MP","N\/C","Nack pain","Nasal Allergie","NazelAllergic","NBA","Neckpain","Nesal Bloodin","Neucorrhean","No","Nosetrits","numbness","OA","OA&HTN","OD","ODEMA","Oedma","Oral Alsur","P\/V","Pain","Pain in Hand","Pain In Legs","Palpitation","Patches","Pheringitis","Piles","Pruritis","PV","Pyrexia","RA","Ranalcalkulus","Ranalcolic","RBS","Ring Worm","roc","Running Nose","Scabiz","Seizere","Shoulder Pain","Shugar","Skin Infection","Skin Prob","skin rednss","SkinInfection","SOB","Sore Throt","STN","Stomache","Stonetitis","Strain","Survical","Swelling","Syphilis","T.Corp","T2DM","Thorex","Throd Infaction","Throt pain","TLDM","Tomslitic","Tooth pain","Touncils","TRI","Tscal","UBA","UPT","Ureen","URI","Urination","URTI","Urticarea","Urticarin","UTI","UTRI","V-B12","Vansh","VB Deficiency","VD Deff","Vertigo","Vit C Def","Vit-DEF","Vomiting","VTI","W.D","W\/D","Weeknes","Weekness\/Cold","white Discharge ","White Spots","Worms","Wound"]
                 ],
                empty: { label: { text: "No Data Available" } }     
                },
            legend: {
                show: false
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
            },
            onrendered: function () {  }
        });
        
        
        var patient_complaint2 = c3.generate({
            bindto: '#patient_complaint2',
                legend: {
                    show: false
                },
            data: {
                x:'x',
                url:'/admin/ajax_getpatient_complaint/'+phase,
                mimeType: 'json',
                type: 'bar',
                groups: [
                   ["A\/C","A\/p","Abdominal Pain","AC","Acane","ACEE","ACGE","Achme","Acidity","ACN","Acne","AD","Adima","AEG","AEGE","AFA","AFI","AFT","AGE","ALBA","Alergic\/Anemic","Allergic","Alser","Aminoria","ANC","ANC Profile","Anemic","Animia","Anxity","Apatite","ARI","Asthama","Aztomla","B\/C","B\/COA","BA","Backache","Bary Bary","BD","Bleeding","Blood In Isputam","Bloodgroup","Bluered Vision","Blunt Troma","Body Alergy","Bodyache","Boils","BPH","Breathlessness","Bronchial","Bronchintis","Burn","Burning Eyes","Burning Mituration","C\/S","Calcium DEF","CBA","Cervical Pain","Chest Congection","Chest Pain","Chestconjection","CLW","CNS","Cold","colic","Colitis","Conjuctivitis","Constipation","COPD","Corn","Costipation","Cough","Cough and alergic","Cough Cold","Cough\/Pruritis","CRI","CRIF\/AFI","CS","CST","D-D3","Darma","Dehydration","Dendruff","Dermatitis","Diarrhoea","Dispepsia","Dizzeness","DMT2","Dry Cough","Dysmanuria","Ear Discharge","Ear infection","Ear itching","Ear Pain","Ear Problum","Ear Wax","Earache","Eardisoder","EFI","Elbo Pain","Epitaxis","Eye Discharge","Eye Disoder","Eye Eaching","Eye Iching","Eye Infaction","Eye infection","Eye Pain","Eye Problum","eye redness","Eye Sweling","Eyeinfaction","EyePain","Facetroma","FBA","FBI","Fever","FLU","Fungle Infection","Fungos","Gastritis","Gout","Hadache","Haemoroid","Hairfall","Hand Pain","Hand Swelling","Harpees","Harpes","HDN","Heart burn","Hematuria","Hepatite","Hepatomegaly","Hert burn","Heumorrhoid","High Urination","himaturia","Hipatomigalig","HP","HPN","HTM","HTN","HTN\/Cold","Hydrosil","Hypertenson","Hypo","Hypothiroid","Hypothiroxin","I-Durma","Indigetion","Infection","Injury","insomnia","Irregular Periods","Itching","Joint Pain","K\/C\/O","KFI","Kidney Ston","Knee Pain","lag sweeling","LBA","LBC","LBI","LBS","Leg Pain","Leucorrhea","Limpnod","Lipoma","Livecoma","Loosmotion","low apetite","Low Urinaton","Low VC","low Vit.","Low Vitamin","LRTI","Lucodurma","Lucoria","Measeles","Migrain","Mouth Allerge","Mouth Alsar","MP","N\/C","Nack pain","Nasal Allergie","NazelAllergic","NBA","Neckpain","Nesal Bloodin","Neucorrhean","No","Nosetrits","numbness","OA","OA&HTN","OD","ODEMA","Oedma","Oral Alsur","P\/V","Pain","Pain in Hand","Pain In Legs","Palpitation","Patches","Pheringitis","Piles","Pruritis","PV","Pyrexia","RA","Ranalcalkulus","Ranalcolic","RBS","Ring Worm","roc","Running Nose","Scabiz","Seizere","Shoulder Pain","Shugar","Skin Infection","Skin Prob","skin rednss","SkinInfection","SOB","Sore Throt","STN","Stomache","Stonetitis","Strain","Survical","Swelling","Syphilis","T.Corp","T2DM","Thorex","Throd Infaction","Throt pain","TLDM","Tomslitic","Tooth pain","Touncils","TRI","Tscal","UBA","UPT","Ureen","URI","Urination","URTI","Urticarea","Urticarin","UTI","UTRI","V-B12","Vansh","VB Deficiency","VD Deff","Vertigo","Vit C Def","Vit-DEF","Vomiting","VTI","W.D","W\/D","Weeknes","Weekness\/Cold","white Discharge ","White Spots","Worms","Wound"]
                 ],
                empty: { label: { text: "No Data Available" } }
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
            },
             onrendered: function () {  }
        });
        
        
        var child_complaint = c3.generate({
            bindto: '#child_complaint',
            data: {
                url: '/admin/ajax_getComplentCountBy/'+phase+'?cat=C',
                type: 'bar',
                mimeType: 'json',
                empty: { label: { text: "No Data Available" } }
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
            },
             onrendered: function () {  }
        });
        
        var lactating_complaint = c3.generate({
            bindto: '#lactating_complaint',
            data: {
                url: '/admin/ajax_getComplentCountBy/'+phase+'?cat=LW',
                type: 'bar',
                mimeType: 'json',
                empty: { label: { text: "No Data Available" } }
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
            },
             onrendered: function () {  }
        });
        
        
        var pregnant_complaint = c3.generate({
            bindto: '#pregnant_complaint',
            data: {
              url: '/admin/ajax_getComplentCountBy/'+phase+'?cat=PW',
                type: 'bar',
                mimeType: 'json',
                empty: { label: { text: "No Data Available" } }
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
            }, 
            onrendered: function () {  }
        });
        
        
        var senior_complaint = c3.generate({
            bindto: '#senior_complaint',
            data: {
                url: '/admin/ajax_getComplentCountBy/'+phase+'?cat=S',
                type: 'bar',
                mimeType: 'json',
                empty: { label: { text: "No Data Available" } }
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
            ,
             onrendered: function () {  }
        });
        
        
        var test = c3.generate({
            bindto: '#test',
            data: 
                {
                    x:'x',
                   url:'/admin/ajax_getTestList/'+phase,
                   mimeType: 'json',
                   type: 'bar',
                   groups: [
                       ["Complete Blood Count (CBC)\/ Homogram (Hgm)","Liver Function Test (LFT)","Kidney Function Test","Lipid Profile","Glucose Profile (BSR)","WIDAL","TYPHIDOT","Malaria Serology","RA Factor","HBSAG (Hepatitis B AG)","Urine Examination","CRP","Anti HCV","HIV","VDRL","GCT","ABO RH (Blood Group)"]

                    ],
                    empty: { label: { text: "No Data Available" } }
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
                    ratio: 1 // this makes bar width 50% of length between ticks
                }
                // or
                //width: 100 // this makes bar width 100px
            }
            , 
            onrendered: function () {  }
        });
        
        
        $( "#patient_complaintaria" ).change(function() {
            var month= $( "#patient_complaintmonth option:selected" ).val();
            var aria=  $( "#patient_complaintaria option:selected" ).val();

            patient_complaint2.unload();
            patient_complaint2.load({
                url: '/admin/ajax_getpatient_complaintby/'+phase+'?month='+month+'&aria='+aria,
                type: 'bar',
                mimeType: 'json',
                empty: { label: { text: "No Data Available" } }
            });
        });

        $( "#patient_complaintmonth" ).change(function() {

            $( "#patient_complaintaria option:selected" ).removeAttr("selected");
            patient_complaint2.unload();
        });

        var TargetPopulationLocation = c3.generate({
            bindto: '#TargetPopulationLocation',
            data: {
                x:'x',
                url:'/admin/ajax_getTargetPopulationLocationt/'+phase,
                mimeType: 'json',
                type: 'bar',
                groups: [
                //["ADARSH NAGAR","Adarsh Vihar","ANIL VIHAR","AZAD VIHAR","BHARAT NAGAR","INDRA VIHAR","LOKPRIYA VIHAR","PRAGATI VIAHR","PRAGATI VIHAR","PREM VIHAR","RAJIV NAGAR","SANGAM VIHAR","SHIV PARK","VANDANA VIHAR","VANDNA VIHAR"]              
                [<?php echo '"'.implode('","', $location).'"';?>]
                ],
                empty: { label: { text: "No Data Available" } }       
            },
            legend: {
                show: false
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
            },
            onrendered: function () {  }
        });
    }
    
    //load();
    $(document).ready(function(){
        phase = $( "#phase option:selected" ).val();
        load();
    });
    </script>
</body>
</html>

