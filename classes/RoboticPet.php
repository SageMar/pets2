<?php

class RoboticPet extends Pet
{
    private $_accessories;
    private $_size;

    function __construct($animal = "unknown", $color = "???", $size = "medium", $accessories = [])
    {
        parent::__construct($animal, $color);
        $this->_size = $size;
        $this->_accessories = $accessories;
    }

    public function getSize(): string
    {
        return $this->_size;
    }

    public function setSize(string $size): void
    {
        $this->_size = $size;
    }


    function getAccessories() : array {
        return $this->_accessories;
    }

    function setAccessories(array $accessories): void
    {
        $this->_accessories = $accessories;
    }

}