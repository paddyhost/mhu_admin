<?php
header("Cache-Control: no-cache"); 
$clientinfo = $resultArr = array();

if ($format == 'json') {
    // JSON Format
	$record = array();
	/*$record['clientno'] = $result->clientmaster_id;
	$record['firstname'] = $result->firstname;
	$record['lastname'] = $result->lastname;
	$record['mobile'] = $result->mobile;
	$record['email'] = $result->email;
	$record['profileimage'] = $result->profileimage;
	$record['zipcode'] = $result->zipcode;
	$record['address'] = $result->address;
	$record['is_active'] = $result->is_active;
	$record['gender'] = $result->gender;
	$record['dob'] = $result->dob;
	$record['country_name'] = $result->country_name;
	$record['state_name'] = $result->state_name;
	$record['city_name'] = $result->city_name;
	$record['areaname'] = $result->areaname;
	$record['marital_status'] = $result->marital_status;
	$record['device_model'] = $result->device_model;*/
	/*foreach($result as $value){
		//$resultArr[] = $value;
	}*/
	if($count >=1){
		$resultArr = $result;
	}
		
	$clientinfo = array('status' => $status, 'count' => $count,
						 'type' => $type, 'result' => $resultArr,
						 'message' => $message);
							 
	header('Content-type: application/json');
	echo json_encode($clientinfo);
	
} else {
    //XML Default format
    $xmlout = '';
    $xmlout .= '<?xml version="1.0" encoding="utf-8" ?>';

    $xmlout .= '<newclient>';
		$xmlout .= '<status>'. $status .'</status>';
		$xmlout .= '<count>'. $count .'</count>';
		$xmlout .= '<type>'. $type .'</type>';
		$xmlout .= '<result>';
		
                foreach ($result as  $row) 
                {
                    $xmlout .= '<record>';
                    foreach ($row as $key => $val) {
			$xmlout .= '<'.$key.'>'.$val.'</'.$key.'>';
			/*$xmlout .='<clientno>'.$result->clientmaster_id.'</clientno>';
			$xmlout .='<otp>'.$result->otp.'</otp>';
			$xmlout .='<datetime>'.$result->date_time.'</datetime>';
			$xmlout .='<mobileoremail>'.$result->mobile_email.'</mobileoremail>';
			$xmlout .='<moreinfo>'.$result->moreinfo.'</moreinfo>';*/
                    }
                    
		$xmlout .= '</record>';
                }
		$xmlout .= '</result>';
		$xmlout .= '<message>'. $message .'</message>';
    $xmlout .= '</newclient>';

    header('Content-type: text/xml');
    header('Cache-control: private');
    echo $xmlout;
}


