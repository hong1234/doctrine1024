<?php
namespace Hong\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

// use Doctrine\ORM\EntityManager;
use Hong\Entity\Product;
use Hong\Repository\ProductRepository;

class AddProductCommand extends Command
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
            ->setName('add-product')
            // defining the description of the command 
            ->setDescription('adding a new product')
            // defining the help (shown with -h option)
            ->setHelp('This command adds a new product');
        
        $this->addArgument('productname', InputArgument::REQUIRED, 'The name of the product.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $newProductName = $input->getArgument('productname');

        $product = new Product();
        $product->setName($newProductName);

        // $this->entityManager->persist($product);
        // $this->entityManager->flush();

        $repo = new ProductRepository();
        $productId = $repo->addProduct($product);

        $output->writeln("Created Product with ID  " . $productId);

        return Command::SUCCESS;
    }

}