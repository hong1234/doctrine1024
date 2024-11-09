<?php
// list_products.php
require_once "bootstrap.php";

$productRepository = $entityManager->getRepository('Hong\Entity\Product');
$products = $productRepository->findAll();

foreach ($products as $product) {
    // echo sprintf("-%s\n", $product->getName());
    echo sprintf("%s-%s\n", $product->getId(), $product->getName());
}