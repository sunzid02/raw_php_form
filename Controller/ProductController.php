<?php
require('../Model/ProductModel.php');

class ProductController 
{
    public function cookieCheck()
    {        
        if ( count($_COOKIE) == 0 ) 
        {
            setcookie('user', 'sunzid', time() + 86400 ); ////expire time 1day or 24hours
            return true;
        }
        else 
        {
            // echo "<pre>";
            // print_r($_COOKIE['expire']);
            // die();
            // setcookie('user', 'sunzid', time() - 30); 

            return false;
        }

    }


    public function validationAndSubmission($data)
    {
        $cookieCheck = $this->cookieCheck();

        if ($cookieCheck) 
        {
            $errorMSG = "";

            /**......................................... checking all data validation starts.............................................................. */
            ////amount
            if (empty($data['amount'])) {
                $errorMSG .= "<li> Amount is required </li>";
            } elseif (!is_numeric($data['amount'])) {
                $errorMSG .= "<li> Amount must be a number </li>";
            }



            ////buyer
            if (empty($data['buyer'])) {
                $errorMSG .= "<li> Buyer is required</li>";
            } elseif (strlen($data['buyer']) >= 256) {
                $errorMSG .= "<li> Buyer length can not be more than 255 chars </li>";
            } elseif (!preg_match('/^[a-zA-Z\s0-9]+$/', $data['buyer']))  //only text, spaces and numbers regex
            {
                $errorMSG .= "<li> only text, spaces and numbers are accepted for Buyer </li>";
            }



            ////receiptId
            if (empty($data['receiptId'])) {
                $errorMSG .= "<li>Receipt id is required</li>";
            } elseif (strlen($data['receiptId']) >= 21) {
                $errorMSG .= "<li> Receipt id length can not be more than 20 chars </li>";
            } elseif (!preg_match('/(^[a-z ]+$)/i', $data['receiptId']))  //only text
            {
                $errorMSG .= "<li> only text is accepted for Receipt id </li>";
            }

            ////items
            if (empty($data['items'])) {
                $errorMSG .= "<li>Items are required</li>";
            } else if (count($data['items']) > 0) {
                foreach ($data['items'] as $item => $itemVal) {
                    // echo $itemVal.":". strlen($itemVal)."<br>";
                    if (strlen($itemVal) >= 256) {
                        $errorMSG .= "<li> Items length can not be more than 255 chars </li>";
                    }
                    if (!preg_match('/(^[a-z ]+$)/i', $itemVal))  //only text
                    {
                        $errorMSG .= "<li> only text is accepted for Item </li>";
                    }
                }
            }


            //// buyerEmail 
            if (empty($data['buyerEmail'])) {
                $errorMSG .= "<li>Buyer Email is required</li>";
            } else if (!filter_var($data['buyerEmail'], FILTER_VALIDATE_EMAIL)) {
                $errorMSG .= "<li>Invalid email format for Buyer email, format: (xyz@gmail.com)</li>";
            } elseif (strlen($data['buyerEmail']) >= 51) {
                $errorMSG .= "<li> Buyer Email length can not be more than 50 chars </li>";
            }

            //// note 
            if (empty($data['note'])) {
                $errorMSG .= "<li>Note is required</li>";
            } elseif (str_word_count($data['note']) >= 31) {
                $errorMSG .= "<li> For note you cannot exceed more than 30 words </li>";
            }

            //// city 
            if (empty($data['city'])) {
                $errorMSG .= "<li> City is required </li>";
            } elseif (strlen($data['city']) >= 21) {
                $errorMSG .= "<li> For city you cannot exceed more than 20 chars  </li>";
            } elseif (!preg_match('/^[a-zA-Z\s]+$/', $data['city']))  //only text
            {
                $errorMSG .= "<li> only text, spaces accepted for City </li>";
            }

            //// phone 
            if (empty($data['phone'])) {
                $errorMSG .= "<li> Phone is required </li>";
            } elseif (strlen($data['phone']) >= 21) {
                $errorMSG .= "<li> For Phone you cannot exceed more than 20 chars  </li>";
            } elseif (!is_numeric($data['phone']))  //only text
            {
                $errorMSG .= "<li> only number accepted for Phone </li>";
            }

            //// entryBy 
            if (empty($data['entryBy'])) {
                $errorMSG .= "<li> Entry by is required </li>";
            } elseif (strlen($data['entryBy']) >= 11) {
                $errorMSG .= "<li> For Entry by you cannot exceed more than 10 chars  </li>";
            } elseif (!is_numeric($data['entryBy']))  //only text
            {
                $errorMSG .= "<li> only number accepted for Entry by </li>";
            }

            /**......................................... checking all data validation ends.............................................................. */


            ////error exists
            if (!empty($errorMSG)) {
                echo $errorResponse =  json_encode(['code' => 404, 'msg' => $errorMSG]);
            } else {
                ////send data for db insertion
                $product = new ProductModel();
                $product->insert($data);
            }

        }
        else 
        {
            echo $response =  json_encode(['code' => 404, 'msg' => '<li> Please try again after the cookie expires(24 hours from last submission) </li>']);
           
        }


        // die();



    }

    public function getProductData()
    {
        $product = new ProductModel();
        $allProducts = $product->allProducts();
        // echo "<pre>";
        // print_r($allProducts);
        // echo "controller";
        // die();

        include('../View/allProductView.php');

    }
}