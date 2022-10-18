<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{

    // Método estático para não precisar instanciar para chamar o método
    // Método que vai criar nosso EntityManager
    public static function createEntityManager(): EntityManager // Informa que o método retorna um EntityManager
    {

        // Precisamos cumprir a documentação

        // Create a simple "default" Doctrine ORM configuration for Annotations
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = ORMSetup::createAttributeMetadataConfiguration([__DIR__."/src"], isDevMode:true);
        // or if you prefer YAML or XML
        // $config = ORMSetup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);

        // Cada driver com suas informações específicas
        // database configuration parameters
        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite', // Caminho para o banco de dados é a raíz do projeto
        ];

        // obtaining the entity manager
        return EntityManager::create($conn, $config);

    }

}

