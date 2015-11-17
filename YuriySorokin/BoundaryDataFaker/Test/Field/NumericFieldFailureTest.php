<?php
namespace YuriySorokin\BoundaryDataFaker\Test\Field;

use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;

/**
 * Class NumericFieldFailureTest
 * @package YuriySorokin\BoundaryDataFaker\Test\Field
 */
class NumericFieldFailureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \YuriySorokin\BoundaryDataFaker\Model\FieldFactory
     */
    private $factory;

    public function testMinNotNumeric()
    {
        $field = $this->factory->createNumeric('name');
        $this->setExpectedExceptionRegExp(\InvalidArgumentException::class, '/Please, provide a numeric min value/');
        $field->setMin('abc');
    }

    public function testMinLessThanMax()
    {
        $field = $this->factory->createNumeric('name');
        $this->setExpectedExceptionRegExp(\InvalidArgumentException::class, '/A min value must be less than/');
        $field
            ->setMax(4)
            ->setMin(5);
    }

    public function testMaxFailure()
    {
        $field = $this->factory->createNumeric('name');
        $this->setExpectedExceptionRegExp(\InvalidArgumentException::class, '/A max value must be greater than/');
        $field
            ->setMin(2)
            ->setMax(1);
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
