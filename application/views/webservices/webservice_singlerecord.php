<?php
header("Cache-Control: no-cache"); 
if ($format == 'json') {
    // JSON Format
    $resultArr = array();
    if($count >=1){
        $resultArr[] = $result;
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


