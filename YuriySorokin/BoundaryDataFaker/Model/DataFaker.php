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
     * @var \YuriySorokin\BoundaryDataFaker\Model\Field\Field[]
     */
    private $fields;

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
        $data = [[], [], []];

        foreach ($this->fields as $field) {
            foreach ($field->getValues() as $key => $fieldValue) {
                $data[$key][$field->getName()] = $fieldValue;
            }
        }

        return $data;
    }
}
