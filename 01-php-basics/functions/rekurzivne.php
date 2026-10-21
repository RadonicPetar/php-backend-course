<?php

$broj = 7;
function odbrojavanje($n){

    if($n==0){
        echo "START";
        return;
    }

    echo $n.PHP_EOL;

    odbrojavanje($n-1);
}

odbrojavanje(5);

function faktorijel($m){

    if($m<=1){
        return 1;
    }

    return $m * faktorijel($m-1);
}

echo PHP_EOL.faktorijel(5);

function fibbonaci($br){

    if($br==0){
        return 0;
    }

    if($br==1){
        return 1;
    }

    return fibbonaci($br-1) + fibbonaci($br-2);
}

for($i=0;$i<=10;$i++){
    echo fibbonaci($i).",";
}
?>