<?php
namespace YuriySorokin\BoundaryDataFaker\Model;

use YuriySorokin\BoundaryDataFaker\Model\Field\NumericField;
use YuriySorokin\BoundaryDataFaker\Model\Field\StringField;

/**
 * Class FieldFactory
 * @package YuriySorokin\BoundaryDataFaker\Model
 */
class FieldFactory
{
    /**
     * @param string $name
     * @throws \InvalidArgumentException
     * @return \YuriySorokin\BoundaryDataFaker\Model\Field\StringField
     */
    public function createString($name)
    {
        return new StringField($name);
    }

    /**
     * @param string $name
     * @throws \InvalidArgumentException
     * @return \YuriySorokin\BoundaryDataFaker\Model\Field\NumericField
     */
    public function createNumeric($name)
    {
        return new NumericField($name);
    }
}
