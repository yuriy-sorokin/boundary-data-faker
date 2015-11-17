<?php
namespace YuriySorokin\BoundaryDataFaker\Test\Field;

use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;

/**
 * Class ArrayFieldSuccessTest
 * @package YuriySorokin\BoundaryDataFaker\Test\Field
 */
class ArrayFieldSuccessTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \YuriySorokin\BoundaryDataFaker\Model\FieldFactory
     */
    private $factory;

    public function testInvalidBehaviour()
    {
        $field = $this->factory->createArray('name');
        $field->setValidBehaviour(false);
        $values = $field->getValues();

        static::assertTrue(is_array($values));
        static::assertCount(5, $values);
        static::assertSame('', $values[0]);
        static::assertSame(null, $values[1]);
        static::assertSame('string', $values[2]);
        static::assertInstanceOf(\stdClass::class, $values[3]);
        static::assertSame(1, $values[4]);
    }

    public function testValidBehaviour()
    {
        $field = $this->factory->createArray('name');
        $values = $field->getValues();

        static::assertTrue(is_array($values));
        static::assertCount(1, $values);
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
