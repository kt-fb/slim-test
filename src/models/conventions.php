<?php

function get_all_conventions(){
    GLOBAL $CONVENTIONS_CSV;
    $file = fopen($CONVENTIONS_CSV,"r");
    $header=fgetcsv($file);
    while(! feof($file))
    {
        $list[]= array_combine($header,fgetcsv($file));
    }
    fclose($file);
    return $list;
}
