<?php
namespace YuriySorokin\BoundaryDataFaker\Tests;

use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;
use YuriySorokin\BoundaryDataFaker\Model\InvalidDataFaker;

/**
 * Class InvalidDataFakerTest
 * @package YuriySorokin\BoundaryDataFaker\Tests
 */
class InvalidDataFakerTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $fieldFactory = new FieldFactory();
        $faker = new InvalidDataFaker();
        $data = $faker
            ->addField($fieldFactory
                           ->createString('name')
                           ->setMinLength(3)
                           ->setMaxLength(20))
            ->addField($fieldFactory
                           ->createNumeric('age')
                           ->setMin(18)
                           ->setMax(343))
            ->getData();

        static::assertTrue(is_array($data));
        static::assertEquals(3, count($data));
        static::assertArrayHasKey('name', $data[0]);
        static::assertArrayHasKey('age', $data[0]);
    }
}
