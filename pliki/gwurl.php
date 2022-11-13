<?php
$api_key = "27e0fa9c-805a-4c4d-88aa-c72f983f9e74";
	 function testRejestrioApi(string $api_key)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ["Authorization: $api_key"]);
        curl_setopt($curl, CURLOPT_URL, "https://rejestr.io/api/v2/org/15664");
        $json = json_decode(curl_exec($curl));
        return print_r($json, true);
    }
?>