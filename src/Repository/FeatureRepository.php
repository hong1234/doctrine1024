<?php
namespace Hong\Repository;

use Hong\Entity\Product;
use Hong\Entity\Feature;

class FeatureRepository extends BaseRepository {

    private $em = null;

    public function __construct() {
        $this->em = $this->getEm();
    }

    // public function getProducts(){
    //     $repo = $this->em->getRepository('Hong\Entity\Product');
    //     $products = $repo->findAll();
    //     return $products;
    // }

    public function addFeature(Feature $feature): int {
        $this->em->persist($feature);
        $this->em->flush();
        return $feature->getId();
    }

    public function getProductByID(int $productId): Product {
        $product = $this->em->find('Hong\Entity\Product', $productId);
        return $product;
    }

    public function getEm2(){
        return $this->em;
    }

}