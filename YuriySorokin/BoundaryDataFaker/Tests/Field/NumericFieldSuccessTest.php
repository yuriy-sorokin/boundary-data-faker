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

    public function test()
    {
        $field = $this->factory->createNumeric('name');
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

    protected function setUp()
    {
        parent::setUp();
        $this->factory = new FieldFactory();
    }
}
