<?php

require('ProductController.php');

////form submission for all data
if ($_POST['formNumber'] == 1) 
{
    ////.................................gathering the submitted data............................................
    $data['amount'] = $_POST['amount'];
    $data['buyer'] = $_POST['buyer'];
    $data['receiptId'] = $_POST['receiptId'];

    if (!empty($_POST['items'])) 
    {
        $data['items'] = $_POST['items'];////array
        # code...
    }
    else 
    {
        $data['items'] = array();
    }


    $data['buyerEmail'] = $_POST['buyerEmail'];
    $data['note'] = $_POST['note'];
    $data['city'] = $_POST['city'];
    $data['phone'] = $_POST['phone'];
    $data['entryBy'] = $_POST['entryBy'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
    {
        $data['buyerIp'] = $_SERVER['HTTP_CLIENT_IP'];
    } 
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
    {
        $data['buyerIp'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } 
    else 
    {
        $data['buyerIp'] = $_SERVER['REMOTE_ADDR'];
    }

    //// generate hashkey
    $salt = substr(str_replace('+', '.', base64_encode(md5(mt_rand(), true))), 0, 16);
    $rounds = 5;
    $data['hashKey'] = crypt($data['receiptId'], sprintf('$6$rounds=%d$%s$', $rounds, $salt));

    

    $pc = new ProductController();

    ////..................................send the data for validation and submission.....................................
    $result = $pc->validationAndSubmission($data);
    // echo $result;
}

// echo "<pre>";
// print_r($_POST);

////for showing all data
// if ($_POST['formNumber'] == 2 ) 
// // {
// //     // echo "zia";
// //     // die();
// //     $pc = new ProductController();
// //     echo "<script> location.href='./test.php'; </script>";
// //     exit;
// //     // include('../test.php');
// //     // $pc->getProductData();


// // }