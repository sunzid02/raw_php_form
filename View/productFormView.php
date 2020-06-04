<?php include('header.php'); ?>

<div class="page-wrapper bg-red p-t-30 p-b-30 font-robo">
    <div class="wrapper wrapper--w960">


        <div class="card card-2">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Product </h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger display-error">
                        </div>
                    </div>
                </div>

                <form method="POST" id="productForm">
                    <!-- amount -->
                    <div class="input-group">
                        <!-- comment out html validations -->
                        <!-- <input class="input--style-2" type="number" min="0" placeholder="Amount" name="amount" maxlength="20" id="amount"  autofocus> -->

                        <input class="input--style-2" type="text" placeholder="Amount" name="amount" id="amount" autofocus>
                    </div>

                    <!-- buyer -->
                    <div class="input-group">
                        <!-- <input class="input--style-2" type="text" placeholder="Buyer" name="buyer" maxlength="255" id="buyer"> -->
                        <input class="input--style-2" type="text" placeholder="Buyer" name="buyer" id="buyer">
                    </div>


                    <!-- receipt_id  -->
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="Receipt id" name="receiptId" maxlength="20" id="receiptId">
                    </div>

                    <!-- buyer_email  -->
                    <div class="input-group">
                        <!-- <input class="input--style-2" type="email" min="0" placeholder="Buyer email" name="buyerEmail" maxlength="50" id="buyerEmail"> -->
                        <input class="input--style-2" type="text" placeholder="Buyer email" name="buyerEmail" id="buyerEmail">
                    </div>

                    <!-- city -->
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="City" name="city" id="city">
                    </div>

                    <!-- phone -->
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="Phone" name="phone" id="phonePhone">
                        <!-- <input class="input--style-2" type="text" placeholder="Phone" name="phone" maxlength="20" id="phone"> -->
                    </div>

                    <!-- entry by -->
                    <div class="input-group">
                        <!-- <input class="input--style-2" type="number" min="0" placeholder="Entry by" name="entryBy" maxlength="10" id="entryBy"> -->
                        <input class="input--style-2" type="text" placeholder="Entry by" name="entryBy" id="entryBy">
                    </div>

                    <!-- items -->
                    <label for="items" class="input--style-2" style="display:inline-block; margin-bottom: 1px">Items</label>
                    <div class="input-group">

                        <select class="item-select" multiple="true" name="items[]" id="items" style="width:100%;">
                            <option value="itemOne">Item One</option>
                            <option value="itemTwo">Item Two</option>
                            <option value="itemThree">Item Three</option>
                            <option value="itemFour">Item Four</option>
                        </select>
                    </div>



                    <!-- note  -->
                    <label for="note" class="input--style-2" style="display:inline-block; margin-bottom: 1px">Note</label>

                    <div class="input-group">
                        <textarea name="note" id="note" placeholder="Enter your note.." cols="70" rows="5"></textarea>
                    </div>

                    <div class="p-t-30">
                        <!-- <button class="btn btn--radius btn--green" name="submitBtn" id="submitBtn">Submit</button> -->
                        <!-- <input type="submit" value="Submit"> -->
                        <input class="btn btn--radius btn--blue" type="submit" name="submit" value="Submit" />

                    </div>
                </form>

                <!--------------------------------------------- show all products ------------------------------------------------->
                <div class="p-t-30">
                    <input type="button" name="showAllData" value="All Products" class="btn btn--radius btn--blue" id="showAllData" onclick="redirection()">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- other functions -->
<script>
    ////880 prepend
    $("#phonePhone").keyup(function() {
        phoneLength = $('#phonePhone').val().length

        if (phoneLength == 1) {
            $("#phonePhone").val(function() {
                return '880' + this.value;
            });
        }
    });


    $(function() {
        $(".item-select").chosen();
    });
</script>


<!-- datatable -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<!-- redirect to all product -->
<script>
    function redirection() {
        location.replace('Controller/AllProductHandler.php')
    }
</script>

<!-- validation scripts and submission for form1 insertion form -->
<script type="text/javascript">
    ////custom methods for validation
    $.validator.addMethod('regex', function(value, element, param) {
        return this.optional(element) ||
            value.match(typeof param == 'string' ? new RegExp(param) : param);
    }, 'Please enter a value in the correct format.');

    $.validator.addMethod("wordCount", function(value) {
        var words = value.match(/\S+/g).length;
        return words < 31;
    }, 'You can enter max 30 words');


    //// validate the form 
    $('#productForm').validate({
        rules: {
            amount: {
                required: true,
                number: true,
                maxlength: 10
            },
            buyer: {
                required: true,
                maxlength: 20,
                regex: /^[a-zA-Z\s0-9]+$/ //only text, spaces and numbers regex
            },
            receiptId: {
                required: true,
                maxlength: 20,
                regex: /(^[a-z ]+$)/i //only text, 
            },
            items: {
                required: true,
                regex: /(^[a-z ]+$)/i //only text, 
            },
            buyerEmail: {
                required: true,
                email: true,
                maxlength: 50
            },
            note: {
                required: true,
                wordCount: true

            },
            city: {
                required: true,
                maxlength: 20,
                regex: /^[a-zA-Z\s]+$/ //only text, spaces regex

            },
            phone: {
                required: true,
                maxlength: 20,
                number: true
            },
            entryBy: {
                required: true,
                maxlength: 10,
                number: true
            }
        },
        messages: {
            amount: {
                required: "Amount is required",
                number: "amount must be a number",
                maxlength: "amount cannot be  more than 10 characters",
            },
            buyer: {
                required: "Buyer is required",
                regex: "only text, spaces and numbers are accepted for Buyer",
            },
            receiptId: {
                required: "Receipt id is required",
                regex: "only text is accepted",
            },
            city: {
                required: "City is required",
                regex: "only text, spaces accepted for City",
                maxlength: "City length can not be more than 20 characters"
            }
        },
        submitHandler: function(form, e) {
            e.preventDefault();
            // console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: 'Controller/ProductFormHandler.php',
                dataType: "html",
                data: $('#productForm').serialize(),
                success: function(data) {
                    // alert('submitted');
                    $("#tabDataDiv").html("");

                    var jsonData = JSON.parse(data);

                    console.log(jsonData.msg);


                    // alert(data);

                    if (jsonData.code == 404) /////form validation
                    {
                        $(".display-error").html("");
                        $(".display-error").html("<ul>" + jsonData.msg + "</ul>");
                        $(".display-error").css("display", "block");
                        $(".display-error").css("color", "red");
                    } else if (jsonData.code == 200 && jsonData.msg == "successInsert") {
                        $(".display-error").html("");
                        alert('Inserted successfully');
                        $('#productForm').trigger("reset");
                        $(".item-select").val('').trigger("chosen:updated");
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });
            return false;

        }
    });
</script>




<?php include('footer.php'); ?>