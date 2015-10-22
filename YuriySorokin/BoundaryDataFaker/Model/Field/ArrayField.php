<?php
namespace YuriySorokin\BoundaryDataFaker\Model\Field;

/**
 * Class ArrayField
 * @package YuriySorokin\BoundaryDataFaker\Model\Field
 */
class ArrayField extends Field
{
    protected function generateValues()
    {
        $this
            ->setNullValue()
            ->setStringValue()
            ->setObjectValue()
            ->setIntegerValue();
    }

    /**
     * @return $this
     */
    private function setIntegerValue()
    {
        $this->values[] = 1;

        return $this;
    }

    /**
     * @return $this
     */
    private function setObjectValue()
    {
        $this->values[] = new \stdClass();

        return $this;
    }

    /**
     * @return $this
     */
    private function setStringValue()
    {
        $this->values[] = 'string';

        return $this;
    }

    /**
     * @return $this
     */
    private function setNullValue()
    {
        $this->values[] = null;

        return $this;
    }
}
