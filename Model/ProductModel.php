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
            
            ////db connection
            $connObj = new Database();

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

        public function allProducts()
        {
            ////db connection
            $connObj = new Database();
            $conn = $connObj->setObjConn();

            //// Perform query
            if ($result = mysqli_query($conn, "SELECT * FROM products")) 
            {
                $table = "";

                if (mysqli_num_rows($result) > 0) 
                {
                // $table .= '<table id="example" class="display" style="width:100%">';

                //     $table .= '<thead>';
                //         $table .= '<tr>';
                //             $table .= '<th>ID</th>';
                //             $table .= '<th>Amount</th>';
                //             $table .= '<th>Buyer</th>';
                //             $table .= '<th>Receipt Id</th>';
                //             $table .= '<th>Items</th>';
                //             $table .= '<th>Buyer Email</th>';
                //             $table .= '<th>Note</th>';
                //             $table .= '<th>City</th>';
                //             $table .= '<th>Phone</th>';
                //             $table .= '<th>Entry By</th>';
                //         $table .= '</tr>';
                //     $table .= '</thead>';

                // $table .= '<tbody>';

                // while ($row = mysqli_fetch_assoc($result)) 
                // {
                //     $table .= "<tr>";
                //         $table .= "<td>" . $row['id'] . "</td>";
                //         $table .= "<td>" . $row['amount'] . "</td>";
                //         $table .= "<td>" . $row['buyer'] . "</td>";
                //         $table .= "<td>" . $row['receipt_id'] . "</td>";

                //         // $itmArr = json_decode($row['items'], true);
                //         // $table .= '<td>';
                //         // foreach ($itmArr as $key => $value) {
                //         //     $table .= '<span class="label success">'.$value. '</span>';
                //         //     // $table .= $value;
                //         // }
                //         // $table .= '</td>';



                //         $table .= "<td>" . $row['buyer_email'] . "</td>";
                //         $table .= "<td>" . $row['note'] . "</td>";
                //         $table .= "<td>" . $row['city'] . "</td>";
                //         $table .= "<td>" . $row['phone'] . "</td>";
                //         $table .= "<td>" . $row['entry_by'] . "</td>";
                //     $table .= "</tr>";
                // }
                // $table .= '</tbody>';

                // $table .= '</table>';
                $table .= "<td>" . 'za' . "</td>";
                $table .= "<td>" . 'za' . "</td>";
                $table .= "<td>" . 'za' . "</td>";
                $table .= "<td>" . 'za' . "</td>";
                $table .= "<td>" . 'za' . "</td>";
                $table .= "<td>" . 'za' . "</td>";
                $table .= "<td>" . 'za' . "</td>";
                $table .= "<td>" . 'za' . "</td>";
                $table .= "<td>" . 'za' . "</td>";

                    $connObj->closeConnection($conn);

                    echo $response =  json_encode(['code' => 200, 'msg' => 'tableDataFound', 'tdata' => $table]);
                } 
                else 
                {
                    $connObj->closeConnection($conn);

                    echo $response =  json_encode(['code' => 200, 'msg' => 'tableDataNotFound', 'tdata' => 'no data found']);
                }
                
            }



        }
    }
    