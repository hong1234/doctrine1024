<?php
namespace Hong\Repository;

use Hong\Entity\Product;

class ProductRepository extends BaseRepository {

    private $em = null;

    public function __construct() {
        $this->em = $this->getEm();
    }

    public function getProducts(){
        $repo = $this->em->getRepository('Hong\Entity\Product');
        $products = $repo->findAll();
        return $products;
    }

    public function getProductByID(int $productId): Product {
        $product = $this->em->find('Hong\Entity\Product', $productId);
        return $product;
    }

    public function addProduct(Product $product): int {
        $this->em->persist($product);
        $this->em->flush();
        return $product->getId();
    }

    public function getEm2(){
        return $this->em;
    }

}