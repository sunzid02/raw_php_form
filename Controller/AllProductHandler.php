<?php

    require('ProductController.php');

    $pc = new ProductController();
    $allProducts = $pc->getProductData();

    // echo "<pre>";
    // print_r($allProducts);