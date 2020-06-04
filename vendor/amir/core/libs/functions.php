<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function console($value) {
    echo "<script> console.log('Log \$value = $value');  </script>";
}

function alert($value) {
    echo "<script> alert('Alert \$value = $value') </script>";
}

function makeDate($string) {
    $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    $datetime = explode(' ',$string);
    $date = explode('-', $datetime[0]);
    $time = explode('.',$datetime[1]);
    $realtime = $time[0];
    $result= $date[2] . " " . $months[$date[1]-1] . " " . $date[0] . " " . $realtime . " GMT+06:00";
    return $result;
}
