<?php include('header.php'); ?>

<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
    <div class="wrapper wrapper--w960">
        <div class="card card-2">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Product </h2>
                <form method="">

                    <!-- amount -->
                    <div class="input-group">
                        <input class="input--style-2" type="number" min="0" placeholder="Amount" name="amount" maxlength="20" id="amount" required>
                    </div>

                    <!-- buyer, receipt_id -->
                    <div class="row row-space">
                        <!-- buyer -->
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="text" placeholder="Buyer" name="buyer" maxlength="255" id="buyer" required>
                            </div>
                        </div>


                        <!-- receipt_id  -->
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="text" placeholder="Receipt id" name="receiptId" maxlength="20" id="receiptId" required>
                            </div>
                        </div>
                    </div>



                    <!-- items -->
                    <div class="input-group">
                        <input class="input--style-2" type="number" min="0" placeholder="Items" name="items" maxlength="255" id="items" required>
                    </div>

                    <!-- buyer_email  -->
                    <div class="input-group">
                        <input class="input--style-2" type="email" min="0" placeholder="Buyer email" name="buyerEmail" maxlength="50" id="buyerEmail" required>
                    </div>


                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="class">
                                <option disabled="disabled" selected="selected">Class</option>
                                <option>Class 1</option>
                                <option>Class 2</option>
                                <option>Class 3</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="text" placeholder="Registration Code" name="res_code">
                            </div>
                        </div>
                    </div>
                    <div class="p-t-30">
                        <button class="btn btn--radius btn--green" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>