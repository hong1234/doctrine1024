<?php
namespace Hong\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

// use Doctrine\ORM\EntityManager;
// use Hong\Entity\Product;

use Hong\Repository\ProductRepository;

class ProductCommand extends Command
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
            ->setName('show-product')
            // defining the description of the command 
            ->setDescription('show a product')
            // defining the help (shown with -h option)
            ->setHelp('This command shows a product');
        
        $this->addArgument('productid', InputArgument::REQUIRED, 'The product id.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $productid = $input->getArgument('productid');

        $repo = new ProductRepository();
        $product = $repo->getProductByID($productid);
        $features = $product->getFeatures();

        echo sprintf("%s-%s\n", $product->getId(), $product->getName());

        foreach ($features as $feature) {
            echo sprintf("%s\n", $feature->getName());
        }

        // $output->writeln("Created Product with ID  " . $product->getId());
        return Command::SUCCESS;
    }

}