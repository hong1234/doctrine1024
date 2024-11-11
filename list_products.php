<?php
// list_products.php

// require_once "bootstrap.php";
// $productRepository = $entityManager->getRepository('Hong\Entity\Product');
// $products = $productRepository->findAll();

require_once "vendor/autoload.php";
use Hong\Repository\ProductRepository;

$repo = new ProductRepository();
$products = $repo->getProducts();
foreach ($products as $product) {
    echo sprintf("%s-%s\n", $product->getId(), $product->getName());
}