<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();

$student = new Student($argv[1]);
$entityManager->persist($student);

$entityManager->flush();