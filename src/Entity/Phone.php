<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
    #[GeneratedValue, Id, Column]
    public int $id;

    #[ManyToOne(targetEntity: Student::class, inversedBy: "phones")]
    public Student $student;
    public function __construct(
        #[Column]

        public readonly string $number
    )
    {}

    public function SetStudent(Student $student): void
    {
        $this->student = $student;
    }


}
