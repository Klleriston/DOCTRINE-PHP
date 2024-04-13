<?php

use Alura\Doctrine\Entity\Course;
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

    echo implode(', ', $student->courses()
        ->map(fn(\Alura\Doctrine\Entity\Phone $phone) => $phone->number)
        ->toArray());


    echo "Cursos: ";

    echo implode(', ', $student->courses()
    ->map(fn(Course $course) => $course->name)
    ->toArray());

    echo PHP_EOL . PHP_EOL;
}