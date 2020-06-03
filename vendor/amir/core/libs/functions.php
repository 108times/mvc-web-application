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
