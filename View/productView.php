<?php include('header.php'); ?>

<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
    <div class="wrapper wrapper--w960">
        <div class="card card-2">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Product </h2>

                <form>

                    <!-- amount -->
                    <div class="input-group">
                        <!-- comment out html validations -->
                        <!-- <input class="input--style-2" type="number" min="0" placeholder="Amount" name="amount" maxlength="20" id="amount"  autofocus> -->

                        <input class="input--style-2" type="text" placeholder="Amount" name="amount" id="amount" autofocus>
                    </div>

                    <!-- buyer, receipt_id -->
                    <div class="row row-space">
                        <!-- buyer -->
                        <div class="col-2">
                            <div class="input-group">
                                <!-- <input class="input--style-2" type="text" placeholder="Buyer" name="buyer" maxlength="255" id="buyer"> -->
                                <input class="input--style-2" type="text" placeholder="Buyer" name="buyer" id="buyer">
                            </div>
                        </div>


                        <!-- receipt_id  -->
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="text" placeholder="Receipt id" name="receiptId" maxlength="20" id="receiptId">
                            </div>
                        </div>
                    </div>

                    <!-- items -->
                    <div class="input-group">
                        <label for="" class="input--style-2">Items:</label>
                        <select class="item-select" multiple="true" name="items[]" id="items" style="width:100%;">
                            <option value="item1">Item1</option>
                            <option value="item2">Item2</option>
                            <option value="item3">Item3</option>
                            <option value="item4">Item4</option>
                        </select>
                    </div>

                    <!-- buyer_email  -->
                    <div class="input-group">
                        <!-- <input class="input--style-2" type="email" min="0" placeholder="Buyer email" name="buyerEmail" maxlength="50" id="buyerEmail"> -->
                        <input class="input--style-2" type="text" placeholder="Buyer email" name="buyerEmail" id="buyerEmail">
                    </div>

                    <!-- note  -->
                    <div class="row row-space">
                        <div class="col-12">
                            <div class="input-group">
                                <textarea name="note" id="" cols="60" rows="5">Enter Note....</textarea>
                            </div>
                        </div>
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


                    <div class="p-t-30">
                        <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        <!-- <input type="submit" value="Submit"> -->
                    </div>
                </form>

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

        $('.chosen-container chosen-container-multi').attr('placeholder', 'Placeholder text');

    });
</script>

<!-- validation scripts -->
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


    // validate the form 
    $("form").validate({
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
        }
    });
</script>


<!-- form submission -->
<script src="">
    // process the form
    $('form').submit(function(event) {

        event.preventDefault()

        // var amount = $.trim($('#amount').val());
        // var formSubmission = false;

        // // // Check if empty of not
        // if (amount === '') {
        //     alert('amount is empty.');
        //     return false;
        // }
        console.log('hello submitter');
        alert('f s');




        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        // var formData = {
        //     'name': $('input[name=name]').val(),
        //     'email': $('input[name=email]').val(),
        //     'superheroAlias': $('input[name=superheroAlias]').val()
        // };

        // // process the form
        // $.ajax({
        //         type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
        //         url: 'process.php', // the url where we want to POST
        //         data: formData, // our data object
        //         dataType: 'json', // what type of data do we expect back from the server
        //         encode: true
        //     })
        //     // using the done promise callback
        //     .done(function(data) {

        //         // log data to the console so we can see
        //         console.log(data);

        //         // here we will handle errors and validation messages
        //     });








    });
</script>


<?php include('footer.php'); ?>