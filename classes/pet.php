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

    public function getAnimal(): string
    {
        return $this->_animal;
    }

    public function setAnimal(string $animal): void
    {
        $this->_animal = $animal;
    }

    public function getColor(): string
    {
        return $this->_color;
    }

    public function setColor(string $color): void
    {
        $this->_color = $color;
    }


}