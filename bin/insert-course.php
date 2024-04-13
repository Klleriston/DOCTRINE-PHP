<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();

$course = new Course($argv[1]);
$entityManager->persist($course);

$entityManager->flush();