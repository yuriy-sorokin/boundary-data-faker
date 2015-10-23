<?php
namespace YuriySorokin\BoundaryDataFaker\Model\Field;

/**
 * Class Field
 * @package YuriySorokin\BoundaryDataFaker\Model\Field
 */
abstract class Field
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var array
     */
    protected $values;
    /**
     * @var bool
     */
    private $validBehaviour = true;

    /**
     * @param string $name
     * @throws \InvalidArgumentException
     */
    public function __construct($name)
    {
        $name = (string)$name;

        if ('' === $name) {
            throw new \InvalidArgumentException('Please, provide a field name');
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        if (false === $this->isValidBehaviour()) {
            $this->values = [''];
        }

        $this->generateValues();

        return $this->values;
    }

    /**
     * @return boolean
     */
    public function isValidBehaviour()
    {
        return $this->validBehaviour;
    }

    abstract protected function generateValues();

    /**
     * @param boolean $validBehaviour
     * @return Field
     */
    public function setValidBehaviour($validBehaviour)
    {
        $this->validBehaviour = $validBehaviour;

        return $this;
    }
}
