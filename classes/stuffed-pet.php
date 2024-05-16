<?php
class StuffedPet extends Pet
{
    private $_size;
    private $_stuffingType;
    private $_material;

    public function __construct($animal = "unknown", $color = "???", $size = "medium", $stuffingType = "cotton", $material = "velvet")
    {
        parent::__construct($animal, $color);
        $this->_size = $size;
        $this->_stuffingType = $stuffingType;
        $this->_material = $material;
    }

    public function getSize(): string
    {
        return $this->_size;
    }

    public function setSize(string $size): void
    {
        $this->_size = $size;
    }

    public function getStuffingType(): string
    {
        return $this->_stuffingType;
    }

    public function setStuffingType(string $stuffingType): void
    {
        $this->_stuffingType = $stuffingType;
    }

    public function getMaterial(): string
    {
        return $this->_material;
    }

    public function setMaterial(string $material): void
    {
        $this->_material = $material;
    }


}