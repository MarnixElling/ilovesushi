<?php

if (strlen($_POST['available'] !== 0) && is_numeric($_POST['postcode'])){
    $postcodes = json_decode($_POST['available']);
    $gebr_postcode = $_POST['postcode'];
    $result = '';

    foreach ($postcodes as $key => $code){
        $postcode = explode('-', $code)[0];
        $extra_kosten = explode('-', $code)[1];
        if($gebr_postcode == $postcode && $extra_kosten == '1'){
            $result = 'succes met extra pay';
        } else if($gebr_postcode == $postcode && $extra_kosten == '0'){
            $result = 'succes';
        }
    }
    echo $result;
}
?>