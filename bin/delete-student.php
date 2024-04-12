<?php
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$student = $studentRepository->find($argv[1]);
$entityManager->remove($student);
$entityManager->flush();

