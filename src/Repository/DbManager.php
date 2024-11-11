<?php
namespace Hong\Repository; 

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class DbManager
{
    private static $instance;
    private $em;

    private function __construct()
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            // paths: [__DIR__ . '/src/Entity'],
            paths: [__DIR__ . '/../Entity'],
            isDevMode: true,
        );

        $conn = DriverManager::getConnection([
            'driver'   => 'pdo_mysql',
            'host'     => '127.0.0.1',
            'port'     => '3306',
            'dbname'   => 'hongtest',
            'user'     => 'root',
            'password' => 'Vuanh--66',
        ], $config);
        
        // obtaining the entity manager
        $entityManager = new EntityManager($conn, $config);

        $this->em = $entityManager;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getEntityManager()
    {
        return $this->em;
    }
}