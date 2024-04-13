<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity]
class Course
{
    #[Column, Id, GeneratedValue]
    public int $id;

    #[ManyToMany(Student::class, mappedBy: "courses", )]
    private Collection $students;

    public function __construct(
        #[Column]
        public readonly string $name
    )
    {
        $this->students = new ArrayCollection();
    }

    public function students(): Collection
    {
     return $this->students;
    }

    public function addStudent(Student $student): void
    {
        if ($this->students->contains($student))
        {
            return;
        }
        $this->students->add($student);
    }

}