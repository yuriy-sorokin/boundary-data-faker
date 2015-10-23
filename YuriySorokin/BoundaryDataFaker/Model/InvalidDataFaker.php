<?php
namespace YuriySorokin\BoundaryDataFaker\Model;

use YuriySorokin\BoundaryDataFaker\Model\Field\Field;

/**
 * Class InvalidDataFaker
 * @package YuriySorokin\BoundaryDataFaker\Model
 */
class InvalidDataFaker extends DataFaker
{
    /**
     * @param \YuriySorokin\BoundaryDataFaker\Model\Field\Field $field
     * @return $this
     */
    public function addField(Field $field)
    {
        $field->setValidBehaviour(false);

        return parent::addField($field);
    }
}
