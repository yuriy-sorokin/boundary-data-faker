<?php
namespace YuriySorokin\BoundaryDataFaker\Test\Field;

use YuriySorokin\BoundaryDataFaker\Model\FieldFactory;

/**
 * Class ArrayFieldFailureTest
 * @package YuriySorokin\BoundaryDataFaker\Test\Field
 */
class ArrayFieldFailureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \YuriySorokin\BoundaryDataFaker\Model\FieldFactory
     */
    private $factory;

    public function testNameFailure()
    {
        $this->setExpectedExceptionRegExp(\InvalidArgumentException::class, '/Please, provide a field name/');
        $this->factory->createArray(null);
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
