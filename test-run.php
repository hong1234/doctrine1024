<?php
require_once "vendor/autoload.php";

use Hong\Repository\ProductRepository;
// use Hong\Entity\Product;

// $newProductName = $argv[1];

// $product = new Product();
// $product->setName($newProductName);

$repo = new ProductRepository();
// $productId = $repo->addProduct($product);

var_dump($repo->getEm2());

$repo2 = new ProductRepository();

var_dump($repo2->getEm2());