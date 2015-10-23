<?php
namespace YuriySorokin\BoundaryDataFaker\Tests\Field;

use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;

/**
 * Class NumericFieldSuccessTest
 * @package YuriySorokin\BoundaryDataFaker\Tests\Field
 */
class NumericFieldSuccessTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \YuriySorokin\BoundaryDataFaker\Model\FieldFactory
     */
    private $factory;

    public function testInvalidBehaviour()
    {
        $field = $this->factory->createNumeric('name');
        $field->setValidBehaviour(false);
        $values = $field
            ->setMin(5)
            ->setMax(20)
            ->getValues();

        static::assertTrue(is_array($values));
        static::assertSame(3, count($values));
        static::assertSame(0, strlen($values[0]));
        static::assertSame(4, $values[1]);
        static::assertSame(21, $values[2]);
    }

    public function testValidBehaviour()
    {
        $field = $this->factory->createNumeric('name');
        $values = $field
            ->setMin(5)
            ->setMax(20)
            ->getValues();

        static::assertTrue(is_array($values));
        static::assertSame(2, count($values));
        static::assertSame(5, $values[0]);
        static::assertSame(20, $values[1]);
    }

    protected function setUp()
    {
        parent::setUp();
        $this->factory = new FieldFactory();
    }
}
