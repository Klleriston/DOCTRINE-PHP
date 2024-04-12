<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();



$phoneR = new Phone("(11) 2222 - 2222");
$phoneP = new Phone("(11) 99999 - 9999");

$entityManager->persist($phoneP);
$entityManager->persist($phoneR);

$student = new Student('Test');
$entityManager->persist($student);

$student->addPhone($phoneR);
$student->addPhone($phoneP);

$entityManager->flush();