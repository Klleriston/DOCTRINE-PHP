<?php
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$studentList = $studentRepository->findAll();

foreach ($studentList as $student )
{
    echo "ID: $student->id\nNome: $student->name\n\n";
    echo "Telefone: \n";
    foreach ($student->phones() as $phone)
    {
        echo $phone->number . PHP_EOL;
    }

    echo PHP_EOL . PHP_EOL;
}