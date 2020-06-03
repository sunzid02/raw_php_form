<?php
    require('../Database/database.php');
    class ProductModel
    {
        public function insert($data)
        {
            $amount = $data['amount'];
            $buyer = $data['buyer'];
            $receiptId = $data['receiptId'];
            $items = $data['items'];////array
            $buyerEmail = $data['buyerEmail'];
            $note = $data['note'];
            $city = $data['city'];
            $phone = $data['phone'];
            $entryBy = $data['entryBy'];
            $buyerIp = $data['buyerIp'];
            $hashKey = $data['hashKey'];
            $allItems = json_encode($items);
            $connObj = new Database();

            ////db connection
            $conn = $connObj->setObjConn();

            /* ..........................normally executed..............................................................................
                $sql = "INSERT INTO products (amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, hash_key, entry_by ) 
                        VALUES 
                        ('$amount', '$buyer', '$receiptId', '$items', '$buyerEmail', '192.168.0.101', '$note', '$city', '$phone', 'hash','$entryBy')";
                
                if($connObj->executeQuery($conn, $sql)) 
                {
                    echo "<br>executed query<br>";
                }
                else 
                {
                    echo "<br>not executed query<br>";
                }

                if ($connObj->closeConnection($conn) ) 
                {
                    echo '<br>db connection close<br>';
            }
            */

            ////.................... prepare and bind for preventing sql injection starts.........................................................

                $sql = "INSERT INTO products (amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, hash_key, entry_by ) 
                        VALUES 
                        ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";

                $stmt = $conn->prepare($sql);

                if (false === $stmt) 
                {
                    echo $insertionResponse =  json_encode(['code' => 200, 'msg' => 'prepare() failed: ' . htmlspecialchars($conn->error) ]);
                    die();
                } 
                else 
                {
                    $stmt->bind_param("isssssssssi", $amount, $buyer, $receiptId, $allItems, $buyerEmail, $buyerIp, $note, $city, $phone, $hashKey , $entryBy);
                    $stmt->execute();
                    $stmt->close();
                    $connObj->closeConnection($conn);

                    echo $insertionResponse =  json_encode(['code' => 200, 'msg' => 'successInsert']);

                }
            ////.................... prepare and bind for preventing sql injection ends.........................................................



        }
    }
    