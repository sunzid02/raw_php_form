<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunzid Products</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.bootstrap4.min.css">



    <!-- Jquery JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>

    <style>
        #headerDiv {
            margin-top: 50px;
            margin-bottom: 30px;
        }

        #showAllData {
            margin-top: 10px;
            margin-bottom: 30px;
        }

        
    </style>

</head>

<body>
    <div class="row" id="headerDiv">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2 style="text-align: center"> All Products </h2>
        </div>
        <div class="col-md-4"></div>
    </div>


        <?php 
                // echo "<pre>";
                // echo print_r($allProducts); 
                // echo '<br>'. count($allProducts).'<br>';

                // echo $retVal = (empty($allProducts)) ? 'no data' : 'yes data' ;
                // die();
        ?>

    <div class="row">
        <div class="col-md-2" style="width:100%; "></div>

        <div class="col-md-8">
            <input type="button" name="addProduct" value="Add Product" class="btn" id="showAllData" onclick="redirection()">

            <table id="example" class="table table-striped table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Buyer</th>
                        <th>Receipt Id</th>
                        <th>Items</th>
                        <th>Buyer Email</th>
                        <th>Note</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Entry By</th>
                        <th>Entry At</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ( !empty($allProducts) ) 
                    {                   
                        foreach ($allProducts as $product) 
                        {
                        ?>
                            <tr>
                                <td> <?php echo $product['id']; ?> </td>
                                <td> <?php echo $product['amount']; ?> </td>
                                <td> <?php echo $product['buyer']; ?> </td>
                                <td> <?php echo $product['receipt_id']; ?> </td>


                                <td>
                                    <?php
                                    $itmArr = json_decode($product['items'], true);
                                    foreach ($itmArr as $key => $value) {
                                        echo '<span class="label success">' . $value . '</span>' . "   ";
                                    }
                                    ?>
                                </td>

                                <td> <?php echo $product['buyer_email']; ?> </td>
                                <td> <?php echo $product['note']; ?> </td>
                                <td> <?php echo $product['city']; ?> </td>
                                <td> <?php echo $product['phone']; ?> </td>
                                <td> <?php echo $product['entry_by']; ?> </td>
                                <td> <?php echo $product['entry_at']; ?> </td>
                            </tr>

                        <?php
                        }
                    }
                    ?>


                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Buyer</th>
                        <th>Receipt Id</th>
                        <th>Items</th>
                        <th>Buyer Email</th>
                        <th>Note</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Entry By</th>
                        <th>Entry At</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="col-md-2" style="width:100%; "></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        function redirection() {
            location.replace('../index.php')
        }
    </script>
</body>

</html>