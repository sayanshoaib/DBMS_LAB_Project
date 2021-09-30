<?php

try{
    session_start();

    $conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $ss = $_SESSION["myemail"];
    $pquery = "SELECT `USER_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PHONE_NUMBER`, `PASSWORD` FROM `userlist` WHERE EMAIL = '$ss';";

    $returnobj = $conn->query($pquery);
    $returntable = $returnobj->fetchAll();
    print_r($returntable);

    if($returnobj->rowCount()==0) {
        ?>
            <tr>
                <option colspan="1">Not Found</option>
            </tr>

        <?php
    } else {
        foreach($returntable as $row) {
                
                $name = $row["FIRST_NAME"]. $row["LAST_NAME"];
                $phone = $row["PHONE_NUMBER"];
            
        }
    }

    $post_data = array();


    $post_data['store_id'] = " alpha614f864902935";
    $post_data['store_passwd'] = "alpha614f864902935@ssl";
    $post_data['total_amount'] = $_POST['price'];
    $post_data['total_amount'] = "12.50";
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
    $post_data['ipn_url'] = "http://localhost/new_sslcz_gw/success.php";
    $post_data['success_url'] = "http://localhost/new_sslcz_gw/success.php";
    $post_data['fail_url'] = "http://localhost/new_sslcz_gw/fail.php";
    $post_data['cancel_url'] = "http://localhost/new_sslcz_gw/cancel.php";

    # CUSTOMER INFORMATION
    $post_data['cus_name'] = $name;
    $post_data['cus_email'] = $_SESSION["myemail"];
    $post_data['cus_add1'] = "Dhaka";
    $post_data['cus_add2'] = "Dhaka";
    $post_data['cus_city'] = "Dhaka";
    $post_data['cus_state'] = "Dhaka";
    $post_data['cus_postcode'] = "1000";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = "01711111111";
    $post_data['cus_fax'] = "01711111111";

    # SHIPMENT INFORMATION
    $post_data['shipping_method'] = "NO";
    // $post_data['ship_add1'] = "Dhaka";
    // $post_data['ship_add2'] = "Dhaka";
    // $post_data['ship_city'] = "Dhaka";
    // $post_data['ship_state'] = "Dhaka";
    // $post_data['ship_postcode'] = "1000";
    // $post_data['ship_phone'] = $phone;
    // $post_data['ship_country'] = "Bangladesh";

    # OPTIONAL PARAMETERS
    // $post_data['value_a'] = "Regent Air";
    // $post_data['value_b'] = "ref002";
    // $post_data['value_c'] = "ref003";
    // $post_data['value_d'] = "ref004";

    # MANAGED TRANS
    //$post_data['multi_card_name'] = "brac_visa,dbbl_visa,city_visa,ebl_visa,brac_master,dbbl_master,city_master,ebl_master,city_amex,qcash,dbbl_nexus,bankasia,abbank,ibbl,mtbl,city";
    //$post_data['allowed_bin'] = "371598,371599,376947,376948,376949";
    //$post_data['multi_card_name'] = "bankasia,mtbl,city";


    # CART PARAMETERS
    // $post_data['cart'] = json_encode(array(
    //     array("sku" => "REF0001", "product" => "DHK TO BRS AC A1", "quantity" => "1", "amount" => "200.00"),
    //     array("sku" => "REF0002", "product" => "DHK TO BRS AC A2", "quantity" => "1", "amount" => "200.00"),
    //     array("sku" => "REF0003", "product" => "DHK TO BRS AC A3", "quantity" => "1", "amount" => "200.00"),
    //     array("sku" => "REF0004", "product" => "DHK TO BRS AC A4", "quantity" => "2", "amount" => "200.00")
    // ));

    //$post_data['emi_option'] = "1";
    //$post_data['emi_max_inst_option'] = "9";
    //$post_data['emi_selected_inst'] = "24";


    //$post_data['product_amount'] = "0";
    //$post_data['discount_amount'] = "5";
    /*
    $post_data['product_amount'] = "100";
    $post_data['vat'] = "5";
    $post_data['discount_amount'] = "5";
    $post_data['convenience_fee'] = "3";
    */
    //$post_data['discount_amount'] = "5";

    //$post_data['multi_card_name'] = "brac_visa,brac_master";
    //$post_data['allowed_bin'] = "408860,458763,489035,432147,432145,548895,545610,545538,432149,484096,484097,464573,539932,436475";

    # RECURRING DATA
    // $schedule = array(
    //     "refer" => "5B90BA91AA3F2", # Subscriber id which generated in Merchant Admin panel
    //     "acct_no" => "01730671731",
    //     "type" => "daily", # Recurring Schedule - monthly,weekly,daily
    //     //"dayofmonth"	=>	"24", 	# 1st day of every month
    //     //"month"		=>	"8",	# 1st day of January for Yearly Recurring
    //     //"week"	=>	"sat",	# In case, weekly recurring

    // );

    # MORE THAN 20 Characaters - Alpha-Numeric - For Auto debit Instruction
    # IT Will Return Transaction History
    # IT Will Return Saved Card- Set Default and delete Option

    // $post_data["firstName"] = "John";
    // $post_data["lastName"] = "Doe";
    // $post_data["street"] = "93 B, New Eskaton Road";
    // $post_data["city"] = "Dhaka";
    // $post_data["state"] = "Dhaka";
    // $post_data["postalCode"] = "1000";
    // $post_data["country"] = "Bangladesh";
    // $post_data["email"] = "john.doe@email.com";

    $post_data["product_profile"] = "general";
    $post_data["product_category"] = "general";
    $post_data["product_name"] = "Computer";
    // $post_data["previous_customer"] = "Yes";
    // $post_data["shipping_method"] = "Courier";
    // $post_data["num_of_item"] = "1";
    // $post_data["product_shipping_contry"] = "Bangladesh";
    // $post_data["vip_customer"] = "YES";
    // $post_data["hours_till_departure"] = "12 hrs";
    // $post_data["flight_type"] = "Oneway";
    // $post_data["journey_from_to"] = "DAC-CGP";
    // $post_data["third_party_booking"] = "No";

    // $val_id=urlencode($_POST['val_id']);
    $val_id=urlencode("1111");
    $requested_url = ("https://sandbox.sslcommerz.com/gwprocess/v4/api.php");

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $requested_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

    $result = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($code == 200 && !(curl_errno($ch))) {
        $sslcz = json_decode($result, true);
        $checkoutUrl = $sslcz['GatewayPageURL'];
        echo $checkoutUrl;
        header("Location: ".$checkoutUrl);
        die();
    } else {

    }
    echo $result;
} catch(Exception $e) {
    echo $e;
}

?>
