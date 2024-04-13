<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();

$studentID = $argv[1];
$courseID = $argv[2];

$student = $entityManager->find(Student::class, $studentID);
$course = $entityManager->find(Course::class, $courseID);

$student->enrollInCourse($course);

$entityManager->flush();
