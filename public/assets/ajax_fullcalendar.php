<?php
/*
* Full calendar ajax load events example
* Like Pro admin template
* by Aqvatarius
*/

    $month  = date('m');
    $year   = date('Y');
    
    
    $data = array();
    //$data[] = array('title'=>'Vivamus non','start'=>'2015-11-04 03:00','end'=>'2015-11-06 04:00','className'=>'red');
    $list   =   Randevu::all();
    foreach ($list as $randevu) {
        $data[] = array('title'=>$randevu->name_firstname,'start'=>'2015-11-05 03:00','end'=>'2015-11-05 04:00','className'=>'red');
    }
    echo json_encode($data);
?>