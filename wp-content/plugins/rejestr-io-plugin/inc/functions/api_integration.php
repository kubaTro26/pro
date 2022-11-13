<?php

function api_integration($token, $nip)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://rejestr.io/api/v2/org?nip=".$nip);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: '.$token,
    ));

    $output = curl_exec($ch);

    curl_close($ch);

    return json_decode($output);
}