<?php
namespace Hong\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Hong\Entity\Feature;

 #[ORM\Entity]
 #[ORM\Table(name: 'products')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;

    /** @var Collection<int, Feature> */
    #[ORM\OneToMany(targetEntity: Feature::class, mappedBy: 'product')]
    private Collection $features;

    public function __construct() {
        $this->features = new ArrayCollection();
    }

    public function addFeature(Feature $feature): void
    {
        $this->features[] = $feature;
    }

    /** @return Collection<int, Feature> */
    public function getFeatures(): Collection
    {
        return $this->features;
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