<?php
namespace Hong\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Doctrine\ORM\EntityManager;
// use Hong\Entity\Product;

class ProductListCommand extends Command
{
    public function __construct(
        private EntityManager $entityManager,
    ){
        parent::__construct();
    }

    protected function configure()
    {
        $this
            // defining the command name
            ->setName('product-list')
            // defining the description of the command 
            ->setDescription('show all products')
            // defining the help (shown with -h option)
            ->setHelp('This command shows all products');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $productRepository = $this->entityManager->getRepository('Hong\Entity\Product');
        $products = $productRepository->findAll();

        foreach ($products as $product) {
            echo sprintf("%s-%s\n", $product->getId(), $product->getName());
        }

        // $output->writeln("Created Product with ID  " . $product->getId());
        return Command::SUCCESS;
    }

}