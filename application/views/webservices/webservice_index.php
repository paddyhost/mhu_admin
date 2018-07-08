<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>TaxiCab | Web Services</title>
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
<legend>List of all Driver App Web Services</legend>

<ul>
  <li><strong>1. Login</strong>
    <ul>
      <li>http://holies-beam.000webhostapp.com/api/v1/login?mobile=[driver mobile]&password=[password]&key=[YOUR API KEY]</li>
      
      
      -->
    </ul>
       
    
     </li>
       

        <li><strong>1. inserAnswer</strong>
    <ul>
      <li>http://holies-beam.000webhostapp.com/api/v1/inserAnswer?mobile=[mobile]&password=[password]&question_id=[question_id]&answer_count=[answer_count]&ans_date=[ans_date]&local_servey_id=[local_servey_id]&program_topic=[program_topic]&user_id=[Yuser_id]&village_id=[village_id]&category=[category]&profram_holder=[profram_holder]&current_datetime=[current_datetime]</li>
     
      
      -->
    </ul>
       
    
     </li>


  

 	    
</ul>

<?php //$this->load->view('adminview/footerlinks'); ?>
</div>
</body>
</html>
