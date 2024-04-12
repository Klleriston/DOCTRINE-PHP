<?php
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();
$student = $entityManager->find(Student::class, $argv[1]);

$entityManager->remove($student);
$entityManager->flush();

