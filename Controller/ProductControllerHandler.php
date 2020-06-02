<?php

require('ProductController.php');

if (isset($_POST)) {
    $pc = new ProductController();
    $result = $pc->formSubmission($_POST);
    // echo $result;
}