<?php include('header.php'); ?>


<div class="row">
    <h2 style="text-align: center"> All Products </h2>
</div>

<div class="row">
    <br>
    <div class="p-t-30">
        <input type="button" name="addProduct" value="Add Product" class="btn" id="showAllData" onclick="redirection()">
    </div>
</div>
<br><br>

<div class="row">
    <div class="col-md-2"></div>

    <div class="col-md-8">
        <table id="example" class="display" style="width:100%">
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
                foreach ($allProducts as $product) {
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

    <div class="col-md-2"></div>
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

<?php include('footer.php'); ?>