<?php
// 328/pets/pet.php

// class and file names do not have to match in php
class Pet
{
    // fields, underscore indicates private
    private $_animal;
    private $_color;

    public function __construct($animal = "unknown", $color = "???")
    {
        $this->_animal = $animal;
        $this->_color = $color;
    }

    public function getAnimal(): mixed
    {
        return $this->_animal;
    }

    public function setAnimal(mixed $animal): void
    {
        $this->_animal = $animal;
    }

    public function getColor(): mixed
    {
        return $this->_color;
    }

    public function setColor(mixed $color): void
    {
        $this->_color = $color;
    }


}