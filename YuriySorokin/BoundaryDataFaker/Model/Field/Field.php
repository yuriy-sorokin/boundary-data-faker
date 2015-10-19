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
        $this->values = [''];
        $this->generateValues();

        return $this->values;
    }

    abstract protected function generateValues();
}
