<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>RPM | Web Services</title>
<?php //$this->load->view('adminview/toplinks'); ?>
</head>
<body>
<style>
li {margin-bottom:15px;}

a {
  -moz-animation-duration: 400ms;
  -moz-animation-name: blink;
  -moz-animation-iteration-count: infinite;
  -moz-animation-direction: alternate;
  
  -webkit-animation-duration: 400ms;
  -webkit-animation-name: blink;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-direction: alternate;
  
  animation-duration: 400ms;
  animation-name: blink;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

@-moz-keyframes blink {
  from {
    opacity: 1;
  }
  
  to {
    opacity: 0;
  }
}

@-webkit-keyframes blink {
  from {
    opacity: 1;
  }
  
  to {
    opacity: 0;
  }
}

@keyframes blink {
  from {
    opacity: 1;
  }
  
  to {
    opacity: 0;
  }
}

</style>
<div class="container">
<legend>List RPM Services</legend>

<ul>

<li><strong>1. Login</strong>
    <ul>
      <li>http://localhost/api/v1/login?mobile=[mobile]&password=[password]&key=[YOUR API KEY]</li>
<!--http://hatchers.in/sapu/index.php/api/v1/login?mobile=9975294782&password=user@123&format=json-->
     
    </ul>
  </li>
 	    
</ul>
<ul>
<li><strong>2. addPatient <a style="color: red">changes</a></strong>
    <ul>
      <li>http://localhost/RMP/index.php/api/V1/addPatient?mobile=[mobile]&password=[passsword]&fname=[fname]&lanme=[lname]&dob=[datebirth]&gender=[F/M]&pmobile=[pmobile]&address=[address]&format=[json]</li>
<!--http://localhost/RMP/index.php/api/V1/addPatient?mobile=9975294782&password=user@123&registration_no=jhsjhgj&fname=jhgadh&lanme=sxdsxx&dob=29-09-2017&age=36&gender=F&pmobile=78676677&address=ghsxgda&format=json-->
<li> <a style="color: red">added Column</a> state=[state]&district=[district]&city=[city]&area=[area]&location=[location]&patient_category=[PW/LW/C/S]</li>
    </ul>
  </li>
      
</ul>
  <ul>
<li>
  <strong>3. addVital</strong>
    <ul>
      <li>http://localhost/RMP/index.php/api/V1/addVital?mobile=[mobile]&password=[password]&&format=[json]&pid=[pid]&registrationno=[reno]&height=[height]&weight=[weight]&bloodpresure=[bloodpresure]&tempreture=[tempreture]&respiration=[repiration]&bpto=[bpto]</li>

<!--http://localhost/RMP/index.php/api/V1/addVital?mobile=9975294782&password=user@123&&format=json&pid=1&registrationno=rpm-5a6b03d57b791&height=23&weight=23&bloodpresure=2&tempreture=2&respiration=9-->
     
    </ul>
  </li>
      
</ul>

  <ul>
<li><strong>4. addMedicalcondition</strong>
    <ul>
      <li>http://localhost/RMP/index.php/api/V1/addMedicalcondition?mobile=[mobile]&password=[password]&format=[json]&chiefcomplaints1=[chiefcomplaints]&chiefcomplaints2=[]&chiefcomplaints3=[]&briefHistory1=[]&briefHistory2=[]&briefHistory3=[]]&investigation=[N/Y/ND]&tratementtaken=[N/Y/ND]&anyimprovement=[N/Y/ND]&patient_id=[]&registrationid=[]</li>

<!--http://localhost/RMP/index.php/api/V1/addMedicalcondition?mobile=9975294782&password=user@123&&format=json&chiefcomplaints1=ghashd&chiefcomplaints2=bgasdhg&chiefcomplaints3=gsh&briefHistory1=sghgs&briefHistory2=sghjsgxd&briefHistory3=svxdhs&investigation=Y&tratementtaken=N&anyimprovement=ND&patient_id=6&registrationid=rpm-5a6b03d57b791-->
     
    </ul>
  </li>
      
</ul>


  <ul>
<li><strong>5. addvaccination</strong>
    <ul>
      <li>http://localhost/RMP/index.php/api/V1/addvaccination?mobile=9975294782&password=user@123&&format=json&dpt=Y&bcg=Y&measles&opv=Y&ttt=Y&hepatitis=Y&other=sghs&&patient_id=6&registration_no=sadhgagh</li>

<!--http://localhost/RMP/index.php/api/V1/addvaccination?mobile=9975294782&password=user@123&&format=json&dpt=Y&bcg=Y&measles&opv=Y&ttt=Y&hepatitis=Y&other=sghs&&patient_id=6&registration_no=sadhgagh-->
     
    </ul>
  </li>
      
</ul>


  <ul>
<li><strong>6. addPatientHistory</strong>
    <ul>
      <li>http://localhost/RMP/index.php/api/V1/addPatientHistory?mobile=9975294782&password=user@123&&format=json&patient_id=6&registrationno=66767&drname1=hgxajg&hospitalname=JZSHGJF</li>

<!--http://localhost/RMP/index.php/api/V1/addPatientHistory?mobile=9975294782&password=user@123&&format=json&patient_id=6&registrationno=66767&drname1hgxajg&hospitalname-->
     
    </ul>
  </li>
      
</ul>

  <ul>
<li><strong>7. addPatientHistory</strong>
    <ul>
      <li>http://localhost/RMP/index.php/api/V1/addMHUTest?mobile=9975294782&password=user@123&&format=json&patient_id=6&registrationno=66767&bloodglucose=12&heamogram=88&creatine=888&urea=888&sgot=77&sgpt=7767&adviced=7878&ferered=878&remark=887</li>

<!--http://localhost/RMP/index.php/api/V1/addMHUTest?mobile=9975294782&password=user@123&&format=json&patient_id=6&registrationno=66767&bloodglucose=12&heamogram=88&creatine=888&urea=888&sgot=77&sgpt=7767&adviced=7878&ferered=878&remark=887-->
     
    </ul>
  </li>
  
<li><strong>8. Get Test values <a style="color: red">new</a></strong>
    <ul>
        <li>http://http://mobilehealthunit.in/api/v1_1/addMHUTest?format=json&all=[optional if 'Y' gives list of all test with attr]</li>
        <!--http://mobilehealthunit.in/api/v1_1/gettestmasterattribute?format=json&all=Y-->
    </ul>
  </li>
  
<li><strong>9. Add Test attribute values <a style="color: red">new</a></strong>
    <ul>
        <li>http://mobilehealthunit.in/api/v1_1/addTestAttributeValues?format=[Format]&patient_id=[patient ID]&registeration_id=[reg ID]&testobj=[json object]</li>
        <!--http://mobilehealthunit.in/api/v1_1/addTestAttributeValues?format=json&patient_id=1&registeration_id=2-->
        <!-- test object eg : '[{"1":[{"map_test_attribute_id":"1","reference_value":"abc","reading":"123"},{"map_test_attribute_id":"2","reference_value":"Hb ","reading":"1"}]},{"2":[{"map_test_attribute_id":"11","reference_value":"abc","reading":"123"},{"map_test_attribute_id":"12","reference_value":"Hb ","reading":"1"}]}]'-->
    </ul>
  </li>

  <li><strong>10. Add visit <a style="color: red">new</a></strong>
    <ul>
        <li>http://mobilehealthunit.in/api/v1_1/addPatientVisit?format=[Format]&unique_id=[Unique ID]&user_id=[User ID]</li>
        <!--http://mobilehealthunit.in/api/v1_1/isPatientExists?format=json&unique_id=1234567890123456-->
    </ul>
  </li>
  
  <li><strong>11. Is Patient exists <a style="color: red">new</a></strong>
    <ul>
        <li>http://http://mobilehealthunit.in/api/v1_1/isPatientExists?format=[Format]&unique_id=[Unique ID]</li>
        <!--http://mobilehealthunit.in/api/v1_1/isPatientExists?format=json&unique_id=1234567890123456-->
    </ul>
  </li>
  
  <li><strong>12. Get patient record <a style="color: red">new</a></strong>
    <ul>
        <li>http://localhost/mhuapi/index.php/api/v1_1/getSinglePatientRecord?visit_master_id=[Visit master]&format=[Format]</li>
        <!--http://localhost/mhuapi/index.php/api/v1_1/getSinglePatientRecord?visit_master_id=2&format=json-->
    </ul>
  </li>
  
  
  
      
</ul>
<?php //$this->load->view('adminview/footerlinks'); ?>
</div>
</body>
</html>
