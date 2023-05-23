<?php

$file = fopen("../results.csv", "r");

$match = 0;
$nomatch = 0;

$t = time();

while (!feof($file)) {
    $line = fgets($file);
    #echo $line;
    #'/^2018\-01\-(\d\d),.*$/'
    #2018-01-31,Mexico,Bosnia-Herzegovina,1,0,Friendly,San Antonio,USA,TRUE
    if (preg_match('/^(\d{4,4}\-\d\d\-\d\d),([\w\-\.\ ñáéíóúçã&]+),([\w\-\.\ ñáéíóúçã&]+),(\d+),(\d+),.*$/i', $line, $m)) {
        #print_r($m); #imprime el arreglo
        if ($m[4] == $m[5]) {
            echo "empate: " ;
        } elseif ($m[4] > $m[5]) {
            echo "local:   " ;
        } else {
            echo "visitante: ";
        }
        printf("\t%s\t%s [%d - %d] %s\n", $m[1], $m[2], $m[4], $m[5], $m[3]);
        $match++;
    } else {
        $nomatch++;
        echo $line;
    }
}

fclose($file);

printf("\n\nMatch %d\n No match %d\n", $match, $nomatch);

printf("Tiempo: %d segs\n", time() - $t);