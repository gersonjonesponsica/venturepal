<?php
    include 'common/config.php';
    include 'model/MsmeDB.php';

    $msme = new MsmeDB();
    $result = [];
    $result = $msme->searchMsme(1);
    $out = array();
    for($i = 0; $i < sizeof($result); $i++){
    	array_push($out, $result[$i]['sub_id']);
    }
    echo implode(',', $out);


// $out = array();
// foreach ($_GET as $name => $value) {
//     array_push($out, "$name: $value");
// }
// echo implode(', ', $out);
 	// foreach($result as $key){
 		
  //       echo $key['sub_id'];
  //   }
?>