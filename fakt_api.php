<?php

// $_POST['company_name'] = 'test';
// $_POST['email'] = 'kontakt@vastuney.pl';
// $_POST['buyer_nip'] = '5881764992';
// $_POST['product'] = 'Tłumaczenie';
// $_POST['cost'] = '40';
// $_POST['quantity'] = '1';

function makeRequest($url, $callDetails = false)
{
  // Set handle
  $ch = curl_init($url);

  // Set options
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Execute curl handle add results to data return array.
  $result = curl_exec($ch);
  $returnGroup = ['curlResult' => $result,];

  // If details of curl execution are asked for add them to return group.
  if ($callDetails) 
  {
    $returnGroup['data'] = json_decode(curl_exec($ch), TRUE);
    $returnGroup['info'] = curl_getinfo($ch);
    $returnGroup['errno'] = curl_errno($ch);
    $returnGroup['error'] = curl_error($ch);
  }

  // Close cURL and return response.
  curl_close($ch);
  return $returnGroup;
}

function do_post($url, $JSONObj){
    $headers = array( "Content-Type: application/json; charset=utf-8" ,"Authorization: Basic USER_PASS" );

    //Set Options for CURL
    $curl = curl_init($url);

    //Return Response to Application
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //Set Content-Headers to JSON
    curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);

    //Execute call via http-POST
    curl_setopt($curl, CURLOPT_POST, true);

    //Set POST-Body
        //convert DATA-Array into a JSON-Object
    curl_setopt($curl, CURLOPT_POSTFIELDS, $JSONObj);

    //WARNING!!!!!
    //This option should NOT be "false"
    //Otherwise the connection is not secured
    //You can turn it of if you're working on the test-system with no vital data
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

    $jsonResponse = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    $response = json_decode($jsonResponse, true);
    return $response;
}

function newInvoice($buyer_name, $buyer_email, int $buyer_nip, $buyer_post_code, $buyer_city, $buyer_street, $buyer_positions)
{
    $kind = 'proforma';
    $number = null;
    $sell_date = date("Y-m-d");
    $issue_date = date("Y-m-d");
    $payment_to = date("Y-m-d", strtotime("$sell_date +7 day") );

/*
    $seller_name = 'KRS francuski';
    $seller_tax_no = '5342509726';
*/

    $invoice = [
        'kind' => $kind,
        'number' => $number,
        'sell_date' => $sell_date,
        'issue_date' => $issue_date,
        'payment_to' => $payment_to,

        'seller_name' => $seller_name,
        'seller_tax_no' => $seller_tax_no,

        'buyer_name' => $buyer_name,
        'buyer_email' => $buyer_email,
        'buyer_tax_no' => $buyer_nip,
		
		"buyer_post_code" => $buyer_post_code,
		"buyer_city" => $buyer_city,
		"buyer_street" => $buyer_street,
		
        'positions' => $buyer_positions
    ];
    $invoice_json = [
        "api_token" => $GLOBALS['api_token'],
        'invoice' => $invoice,
    ];
    $invoice_json = json_encode($invoice_json);
    $url = "https://frgw.fakturownia.pl/invoices.json?invoice={$invoice_json}";

    return $invoice_json;
}


if(isset($_POST['buyer_nip']))
{
    $GLOBALS['api_token'] = 'RriqIhxAIoueBsrqRZ';

    $GLOBALS['buyer_name'] = $_POST['company_name'];
    $GLOBALS['buyer_email'] = $_POST['email'];
    $GLOBALS['buyer_nip'] = $_POST['buyer_nip'];
	
	$GLOBALS['buyer_post_code'] = $_POST['post_code'];
    $GLOBALS['buyer_city'] = $_POST['city'];
    $GLOBALS['buyer_street'] = $_POST['street'];
	
    $GLOBALS['product'] = $_POST['product'];
    $GLOBALS['cost'] = $_POST['cost'] + ($_POST['cost'] * 0.23);
    $GLOBALS['quantity'] = $_POST['quantity'];

    $invoiceData = newInvoice($GLOBALS['buyer_name'], $GLOBALS['buyer_email'], $GLOBALS['buyer_nip'],
	$GLOBALS['buyer_post_code'], $GLOBALS['buyer_city'], $GLOBALS['buyer_street'],
	['name' => $GLOBALS['product'], 'tax' => 23, 'total_price_gross' => $GLOBALS['cost'], 'quantity' => $GLOBALS['quantity'] ]);
    $response = do_post('https://frgw.fakturownia.pl/invoices.json', $invoiceData);


    if(!empty($response['id']))
    {
        $invoice_id = $response['id'];
        echo $response['payment_url'];
        header('Location: /potwierdzenie/'.$response['payment_url']);

        $post = [
            'api_token' => 'RriqIhxAIoueBsrqRZ'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://frgw.fakturownia.pl/invoices/{$invoice_id}/send_by_email.json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);

    }
} else
    {
        echo "Error: There's no post data";
    }


