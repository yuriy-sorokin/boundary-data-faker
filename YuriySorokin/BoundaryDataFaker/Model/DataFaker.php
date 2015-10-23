<?php
namespace YuriySorokin\BoundaryDataFaker\Model;

use YuriySorokin\BoundaryDataFaker\Model\Field\Field;

/**
 * Class DataFaker
 * @package YuriySorokin\BoundaryDataFaker\Model
 */
class DataFaker
{
    /**
     * @var array
     */
    protected $data = [];
    /**
     * @var \YuriySorokin\BoundaryDataFaker\Model\Field\Field[]
     */
    private $fields = [];

    /**
     * @param \YuriySorokin\BoundaryDataFaker\Model\Field\Field $field
     * @return $this
     */
    public function addField(Field $field)
    {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $this->data = [];
        $maxFieldValuesAmount = $this->getMaxFieldValuesAmount();

        foreach ($this->fields as $field) {
            $fieldValues = $field->getValues();
            $fieldValuesAmount = count($fieldValues);
            $key = 0;

            foreach ($fieldValues as $key => $fieldValue) {
                $this->data[$key][$field->getName()] = $fieldValue;
            }

            if ($maxFieldValuesAmount > $fieldValuesAmount) {
                $firstValue = reset($fieldValues);

                for ($a = $fieldValuesAmount; $a < $maxFieldValuesAmount; $a++) {
                    $key++;
                    $this->data[$key][$field->getName()] = $firstValue;
                }
            }
        }

        $this->fields = [];

        return $this->data;
    }

    /**
     * @return int
     */
    private function getMaxFieldValuesAmount()
    {
        $amount = 0;

        foreach ($this->fields as $field) {
            $amount = max($amount, count($field->getValues()));
        }

        return $amount;
    }
}
