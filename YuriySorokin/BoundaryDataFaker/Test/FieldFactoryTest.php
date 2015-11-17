<?php
namespace YuriySorokin\BoundaryDataFaker\Test;

use YuriySorokin\BoundaryDataFaker\Model\Field\NumericField;
use YuriySorokin\BoundaryDataFaker\Model\Field\StringField;
use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;

/**
 * Class FieldFactoryTest
 * @package YuriySorokin\BoundaryDataFaker\Tests
 */
class FieldFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \YuriySorokin\BoundaryDataFaker\Model\FieldFactory
     */
    private $factory;

    public function testString()
    {
        static::assertTrue($this->factory->createString('name') instanceof StringField);
    }

    public function testNumeric()
    {
        static::assertTrue($this->factory->createNumeric('name') instanceof NumericField);
    }

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();
        $this->factory = new FieldFactory();
    }
}
