<?php

class RoboticPet extends pet
{
    private $_accessories;

    function __construct($_accessories = "Default Value")
    {
        parent::__construct($_accessories);
    }


    function getAccessories() {
        return $this->_accessories;
    }

    function setAccessories(array $accessories): void
    {
        $this->_accessories = $accessories;
    }

}