<?php
namespace Hong\Entity;

use Doctrine\ORM\Mapping as ORM;
use Hong\Entity\Product;

 #[ORM\Entity]
 #[ORM\Table(name: 'features')]
class Feature
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'features')]
    private Product|null $product;

    public function setProduct(Product $product): void
    {
        $product->addFeature($this);
        $this->product = $product;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}