<?php

use Alura\Doctrine\EntityManagerFactory;

require_once 'vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();

var_dump($entityManager);