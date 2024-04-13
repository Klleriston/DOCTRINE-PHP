<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public int $id;
    #[Column]
    public readonly string $name;

    #[ManyToMany(targetEntity: Course::class, inversedBy: "students")]
    public Collection $courses;

    #[OneToMany(targetEntity: Phone::class, mappedBy: "student", cascade: ["persist"])]
    private Collection $phones;

    public function __construct($name)
    {
        $this->name = $name;
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->SetStudent($this);
    }

    public function phones(): iterable
    {
        return $this->phones;
    }

    public function courses(): Collection
    {
        return $this->courses;
    }

    public function enrollInCourse(Course $course): void
    {

        if ($this->$course->contains($course)) {
            return;
        }
        $this->courses->add($course);
        $course->addStudent($this);
    }

}