<?php

/**
 * Regular expression to return credit card type from credit card number.
 */


$cards = array(
    '3528000000000000'=>'JCB',
    '3589000000000000'=>'JCB',
    '3529000000000000'=>'JCB',

    '4916338506082832'=>'VISA',
    '4556015886206505'=>'VISA',
    '4539048040151731'=>'VISA',
    '4024007198964305'=>'VISA',
    '4716175187624512'=>'VISA',

    '5280934283171080'=>'MASTERCARD',
    '5456060454627409'=>'MASTERCARD',
    '5331113404316994'=>'MASTERCARD',
    '5259474113320034'=>'MASTERCARD',
    '5442179619690834'=>'MASTERCARD',

    '6011894492395579'=>'DISCOVER',
    '6011388644154687'=>'DISCOVER',
    '6011880085013612'=>'DISCOVER',
    '6011652795433988'=>'DISCOVER',
    '6011375973328347'=>'DISCOVER',

    '345936346788903'=>'AMEX',
    '377669501013152'=>'AMEX',
    '373083634595479'=>'AMEX',
    '370710819865268'=>'AMEX',
    '371095063560404'=>'AMEX',

    '8800000000000000'=>'UNIONPAY',
    '4026000000000000'=>'VISA ELECTRON',
    '4175000000000000'=>'VISA ELECTRON',
    '4405000000000000'=>'VISA ELECTRON',
    '4508000000000000'=>'VISA ELECTRON',
    '4844000000000000'=>'VISA ELECTRON',
    '4913000000000000'=>'VISA ELECTRON',
    '4917000000000000'=>'VISA ELECTRON',

    '5019000000000000'=>'DANKORT',

    '5018000000000000'=>'MAESTRO',
    '5020000000000000'=>'MAESTRO',
    '5038000000000000'=>'MAESTRO',
    '5612000000000000'=>'MAESTRO',
    '5893000000000000'=>'MAESTRO',
    '6304000000000000'=>'MAESTRO',
    '6759000000000000'=>'MAESTRO',
    '6761000000000000'=>'MAESTRO',
    '6762000000000000'=>'MAESTRO',
    '6763000000000000'=>'MAESTRO',
    '0604000000000000'=>'MAESTRO',
    '6390000000000000'=>'MAESTRO',

    '6360000000000000'=>'INTERPAYMENT'
);

function credit_card_type($cc_num){
    $cc_type = 'Unknown';
    if(preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/',$cc_num)){
        $cc_type = 'VISA';
    }else if(preg_match('/^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$/',$cc_num)){
        $cc_type = 'MASTERCARD';
    }else if(preg_match('/^3[47][0-9]{13}$/',$cc_num)){
        $cc_type = 'AMEX';
    }else if(preg_match('/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/',$cc_num)){
        $cc_type = 'Diners Club';
    }else if(preg_match('/^6(?:011|5[0-9]{2})[0-9]{12}$/',$cc_num)){
        $cc_type = 'DISCOVER';
    }else if(preg_match('/^(?:2131|1800|35\d{3})\d{11}$/',$cc_num)){
        $cc_type = 'JCB';
    }
    return $cc_type;
}

foreach($cards as $key=>$value){
    $cc_type = credit_card_type($key);
    echo $key.": ".$value."&nbsp;";
    if($value == $cc_type){
        echo "<span style='color:green'>".$cc_type."</span>";
    }else{
        echo "<span style='color:red'>".$cc_type."</span>";
    }
    echo "\n<br />";
}