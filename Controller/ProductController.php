<?php
require('../Model/ProductModel.php');

class ProductController 
{
    public function formSubmission($data)
    {
        $pm = new ProductModel();
        print('controller class e gese');
        print_r($data);

        $pm->insert($data);
        die();
    }
}