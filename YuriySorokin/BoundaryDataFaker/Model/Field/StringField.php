<?php
namespace YuriySorokin\BoundaryDataFaker\Model\Field;

/**
 * Class StringField
 * @package YuriySorokin\BoundaryDataFaker\Model\Field
 */
class StringField extends Field
{
    /**
     * @var int
     */
    private $maxLength;
    /**
     * @var int
     */
    private $minLength;

    /**
     * @param int $minLength
     * @throws \InvalidArgumentException
     * @return StringField
     */
    public function setMinLength($minLength)
    {
        $this->minLength = (int)$minLength;

        if (1 > $this->minLength) {
            throw new \InvalidArgumentException('A min length value must be greater than 0, ' . $minLength . ' given');
        }

        if (null !== $this->maxLength && $this->maxLength <= $this->minLength) {
            throw new \InvalidArgumentException(
                'A min length value must be less than ' . $this->maxLength . ', ' . $minLength . ' given'
            );
        }

        return $this;
    }

    /**
     * @param int $maxLength
     * @throws \InvalidArgumentException
     * @return StringField
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = (int)$maxLength;

        if (0 < (int)$this->minLength && $this->minLength > $this->maxLength) {
            throw new \InvalidArgumentException(
                'A max value must be greater than ' . $this->minLength . ', ' . $maxLength . ' given'
            );
        }

        return $this;
    }

    protected function generateValues()
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
        if (null !== $this->maxLength) {
            $this->values[] = str_repeat('a', $this->maxLength + 1);
        }

        return $this;
    }

    /**
     * @return $this
     */
    private function setMinValues()
    {
        if (null !== $this->minLength) {
            $this->values[] = str_repeat('a', $this->minLength - 1);
        }

        return $this;
    }
}
