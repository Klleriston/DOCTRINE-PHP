<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
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

    #[OneToMany(targetEntity: Phone::class, mappedBy: "student")]
    private Collection $phones;
    public function __construct($name)
    {
        $this->name = $name;
        $this->phones = new ArrayCollection();
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

}