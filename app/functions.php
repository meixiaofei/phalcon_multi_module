<?php
function rg_print($data, $die = true)
{
    echo '<pre>';
    print_r($data);
    $die && die();
}