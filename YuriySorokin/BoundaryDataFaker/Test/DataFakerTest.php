<?php
namespace YuriySorokin\BoundaryDataFaker\Test;

use YuriySorokin\BoundaryDataFaker\Model\DataFaker;
use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;

/**
 * Class DataFakerTest
 * @package YuriySorokin\BoundaryDataFaker\Tests
 */
class DataFakerTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $fieldFactory = new FieldFactory();
        $faker = new DataFaker();
        $data = $faker
            ->addField($fieldFactory
                           ->createString('name1')
                           ->setMinLength(3)
                           ->setMaxLength(20))
            ->addField($fieldFactory
                           ->createString('name2')
                           ->setMinLength(3))
            ->addField($fieldFactory
                           ->createString('name3')
                           ->setMaxLength(3))
            ->addField($fieldFactory
                           ->createNumeric('age1')
                           ->setMin(18)
                           ->setMax(343))
            ->addField($fieldFactory
                           ->createNumeric('age2')
                           ->setMin(18))
            ->addField($fieldFactory
                           ->createNumeric('age3')
                           ->setMax(18))
            ->getData();

        static::assertTrue(is_array($data));

        foreach ($data as $item) {
            static::assertCount(6, $item);
            static::assertArrayHasKey('name1', $item);
            static::assertArrayHasKey('name2', $item);
            static::assertArrayHasKey('name3', $item);
            static::assertArrayHasKey('age1', $item);
            static::assertArrayHasKey('age2', $item);
            static::assertArrayHasKey('age3', $item);
        }
    }
}
