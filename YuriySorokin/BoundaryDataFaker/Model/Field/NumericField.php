<?php
namespace YuriySorokin\BoundaryDataFaker\Model\Field;

/**
 * Class NumericField
 * @package YuriySorokin\BoundaryDataFaker\Model\Field
 */
class NumericField extends Field
{
    /**
     * @var int
     */
    private $max;
    /**
     * @var int
     */
    private $min;

    /**
     * @param int $max
     * @throws \InvalidArgumentException
     * @return NumericField
     */
    public function setMax($max)
    {
        $this->max = $max;

        if (null !== $this->min && $this->min > $this->max) {
            throw new \InvalidArgumentException(
                'A max value must be greater than ' . $this->min . ', ' . $max . ' given'
            );
        }

        return $this;
    }

    /**
     * @param mixed $min
     * @throws \InvalidArgumentException
     * @return NumericField
     */
    public function setMin($min)
    {
        $this->min = $min;

        if (false === is_numeric($this->min)) {
            throw new \InvalidArgumentException('Please, provide a numeric min value, ' . $min . ' given');
        }

        if (null !== $this->max && $this->max <= $this->min) {
            throw new \InvalidArgumentException(
                'A min value must be less than ' . $this->max . ', ' . $min . ' given'
            );
        }

        return $this;
    }

    public function generateValues()
    {
        $this
            ->setMinValues()
            ->setMaxValues();
    }

    /**
     * @return $this
     */
    private function setMaxValues()
    {
        if (null !== $this->max) {
            $this->values[] = $this->max + 1;
        }

        return $this;
    }

    /**
     * @return $this
     */
    private function setMinValues()
    {
        if (null !== $this->min) {
            $this->values[] = $this->min - 1;
        }

        return $this;
    }
}
