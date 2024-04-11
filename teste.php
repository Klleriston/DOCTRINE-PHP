<?php

use Alura\Doctrine\EntityManagerFactory;

require_once 'vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();

var_dump($entityManager);

// php bin/doctrine.php dbal:run-sql "SELECT * FROM Student; ou qualquer outro comando sql"