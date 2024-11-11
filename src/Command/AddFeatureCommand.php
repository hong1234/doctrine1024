<?php
namespace Hong\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Doctrine\ORM\EntityManager;
use Hong\Entity\Feature;
// use Hong\Entity\Product;
use Hong\Repository\FeatureRepository;

class AddFeatureCommand extends Command
{
    // public function __construct(
    //     private EntityManager $entityManager,
    // ){
    //     parent::__construct();
    // }

    protected function configure()
    {
        $this
            // defining the command name
            ->setName('add-feature')
            // defining the description of the command 
            ->setDescription('adding new feature to a product')
            // defining the help (shown with -h option)
            ->setHelp('This command adds new feature to a product');

        $this->addArgument('productid', InputArgument::REQUIRED, 'The id of the product.');
        $this->addArgument('featurename', InputArgument::REQUIRED, 'The name of the feature.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $productId   = $input->getArgument('productid');
        $featureName = $input->getArgument('featurename');

        $repo = new FeatureRepository();

        $product = $repo->getProductByID($productId);

        $feature = new Feature();
        $feature->setName($featureName);
        $feature->setProduct($product);

        $featureId = $repo->addFeature($feature);
        
        $output->writeln("Created Feature with ID  " . $featureId);

        return Command::SUCCESS;
    }
    
}