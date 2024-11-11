<?php
// create_product.php <name>

// require_once "bootstrap.php";

// $newProductName = $argv[1];

// $product = new Hong\Entity\Product();
// $product->setName($newProductName);

// $entityManager->persist($product);
// $entityManager->flush();

// echo "Created Product with ID " . $product->getId() . "\n";

require_once "vendor/autoload.php";

use Hong\Repository\ProductRepository;
use Hong\Entity\Product;

$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

$repo = new ProductRepository();
$productId = $repo->addProduct($product);

echo "Created Product with ID " . $productId . "\n";
