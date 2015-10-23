<?php
namespace YuriySorokin\BoundaryDataFaker\Tests\Field;

use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;

/**
 * Class StringFieldSuccessTest
 * @package YuriySorokin\BoundaryDataFaker\Tests\Field
 */
class StringFieldSuccessTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \YuriySorokin\BoundaryDataFaker\Model\FieldFactory
     */
    private $factory;

    public function testInvalidBehaviour()
    {
        $field = $this->factory->createString('name');
        $field->setValidBehaviour(false);
        $values = $field
            ->setMinLength(5)
            ->setMaxLength(20)
            ->getValues();

        static::assertTrue(is_array($values));
        static::assertSame(3, count($values));
        static::assertSame(0, strlen($values[0]));
        static::assertSame(4, strlen($values[1]));
        static::assertSame(21, strlen($values[2]));
    }

    public function testValidBehaviour()
    {
        $field = $this->factory->createString('name');
        $values = $field
            ->setMinLength(5)
            ->setMaxLength(20)
            ->getValues();

        static::assertTrue(is_array($values));
        static::assertSame(2, count($values));
        static::assertSame(5, strlen($values[0]));
        static::assertSame(20, strlen($values[1]));
    }

    protected function setUp()
    {
        parent::setUp();
        $this->factory = new FieldFactory();
    }
}
