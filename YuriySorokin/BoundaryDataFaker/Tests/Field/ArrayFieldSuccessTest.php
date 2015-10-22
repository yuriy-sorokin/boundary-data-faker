<?php
namespace YuriySorokin\BoundaryDataFaker\Tests\Field;

use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;

/**
 * Class ArrayFieldSuccessTest
 * @package YuriySorokin\BoundaryDataFaker\Tests\Field
 */
class ArrayFieldSuccessTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \YuriySorokin\BoundaryDataFaker\Model\FieldFactory
     */
    private $factory;

    public function test()
    {
        $field = $this->factory->createArray('name');
        $values = $field->getValues();

        static::assertTrue(is_array($values));
        static::assertSame(5, count($values));
        static::assertSame('', $values[0]);
        static::assertSame(null, $values[1]);
        static::assertSame('string', $values[2]);
        static::assertInstanceOf(\stdClass::class, $values[3]);
        static::assertSame(1, $values[4]);
    }

    protected function setUp()
    {
        parent::setUp();
        $this->factory = new FieldFactory();
    }
}
