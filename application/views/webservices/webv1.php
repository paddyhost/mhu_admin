<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Onetouch | Web Services</title>
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
<legend>List of all Client App Web Services</legend>

<ul>

<li><strong>1. Login</strong>
    <ul>
      <li>http://localhost/api/web_api_v1/login?mobile=[mobile]&password=[password]&key=[YOUR API KEY]</li>
<!--http://www.hatchers.in/sapu/index.php/api/web_api_v1/login?mobile=9975294782&password=user@123&format=json-->
     
    </ul>
  </li>
 	    
</ul>


<ul>
<li><strong>2. addarogyamitra</strong>
    <ul>
      <li>http://www.hatchers.in/sapu/index.php/api/web_api_v1/addarogyamitra?format=[json/xml]&password=[passwoed]&mobile=[mobile]&village_name=[vilage_name]&user_name=[arogyamitraname]&vilage_id=[village_id]&tq_id=[tq_id]&umobile=[arogyamitramobileno]&dob=[dateofbirth]&upassword=[mitrapassword]</li>
<!--http://www.hatchers.in/sapu/index.php/api/web_api_v1/addarogyamitra?format=json&password=user@123&mobile=9975294782&village_name=manjari&user_name=vishal&vilage_id=99&tq_id=55&umobile=99999999999&dob=22-12-2017&upassword=user@123-->
     
    </ul>
  </li>
 	    
</ul>

<ul>
<li><strong>3. getArogyamitra</strong>
    <ul>
      <li>http://www.hatchers.in/sapu/index.php/api/web_api_v1/getArogyaMitraList?format=[json/xml]&password=[password]&mobile=[mobile_no]</li>
<!--
http://www.hatchers.in/sapu/index.php/api/web_api_v1/getArogyaMitraList?format=json&password=user@123&mobile=9975294782

-->
     
    </ul>
  </li>
 	    
</ul>

<ul>
<li><strong>3. getVillages</strong>
    <ul>
      <li>http://www.hatchers.in/sapu/index.php/api/web_api_v1/getVillageList?format=[json/xml]&password=[password]&mobile=[mobile_no]</li>
<!--
http://www.hatchers.in/sapu/index.php/api/web_api_v1/getVillageList?format=json&password=user@123&mobile=9975294782

-->
     
    </ul>
  </li>
 	    
</ul>


<?php //$this->load->view('adminview/footerlinks'); ?>
</div>
</body>
</html>


