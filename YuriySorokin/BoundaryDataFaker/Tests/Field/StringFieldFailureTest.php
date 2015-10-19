<?php
namespace YuriySorokin\BoundaryDataFaker\Tests\Field;

use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;

/**
 * Class StringFieldFailureTest
 * @package YuriySorokin\BoundaryDataFaker\Tests\Field
 */
class StringFieldFailureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \YuriySorokin\BoundaryDataFaker\Model\FieldFactory
     */
    private $factory;

    public function testMinZero()
    {
        $field = $this->factory->createString('name');
        $this->setExpectedExceptionRegExp(
            \InvalidArgumentException::class,
            '/A min length value must be greater than 0/'
        );
        $field->setMinLength(0);
    }

    public function testMinLessThanMax()
    {
        $field = $this->factory->createString('name');
        $this->setExpectedExceptionRegExp(\InvalidArgumentException::class, '/A min length value must be less than/');
        $field
            ->setMaxLength(4)
            ->setMinLength(5);
    }

    public function testMaxFailure()
    {
        $field = $this->factory->createString('name');
        $this->setExpectedExceptionRegExp(\InvalidArgumentException::class, '/A max value must be greater than/');
        $field
            ->setMinLength(2)
            ->setMaxLength(1);
    }

    public function testNameFailure()
    {
        $this->setExpectedExceptionRegExp(\InvalidArgumentException::class, '/Please, provide a field name/');
        $this->factory->createString(null);
    }

    protected function setUp()
    {
        parent::setUp();
        $this->factory = new FieldFactory();
    }
}
