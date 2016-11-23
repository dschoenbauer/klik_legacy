<?php

namespace DSchoenbauer\Klik;

use PHPUnit_Framework_TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

/**
 * Primary goal is to ensure the arguments call the right method passing the right paramters
 *
 * @author David
 */
class AppDecoratorTest extends PHPUnit_Framework_TestCase {

    private $_mock;
    private $_object;

    protected function setUp() {
        $this->_mock = $this->getMockBuilder(App::class)->getMock();
        $this->_object = new AppDecorator($this->_mock);
    }

    public function testConstruct() {
        $this->assertSame($this->_mock, $this->_object->getApp());
    }

    public function testAccept() {
        $mock = $this->getMockBuilder(VisitorInterface::class)->getMock();
        $mock->expects($this->once())->method('visitApp')->willReturnCallback(function($app) {
            $this->assertSame($this->_mock, $app);
        });
        $this->_object->accept($mock);
    }

    public function testAdd() {
        $value = "test";
        $this->_mock->expects($this->once())->method('add')->willReturnCallback(function($callable) use ($value) {
            $this->assertSame($value, $callable);
        });
        $this->_object->add($value);
    }

    public function testAny() {
        $testPattern = "pattern";
        $testCallable = "callable";
        $this->_mock->expects($this->once())->method('any')->willReturnCallback(function($pattern, $callable) use ($testPattern, $testCallable) {
            $this->assertSame($pattern, $testPattern);
            $this->assertSame($callable, $testCallable);
        });
        $this->_object->any($testPattern, $testCallable);
    }

    public function testDelete() {
        $testPattern = "pattern";
        $testCallable = "callable";
        $this->_mock->expects($this->once())->method('delete')->willReturnCallback(function($pattern, $callable) use ($testPattern, $testCallable) {
            $this->assertSame($pattern, $testPattern);
            $this->assertSame($callable, $testCallable);
        });
        $this->_object->delete($testPattern, $testCallable);
    }

    public function testGet() {
        $testPattern = "pattern";
        $testCallable = "callable";
        $this->_mock->expects($this->once())->method('get')->willReturnCallback(function($pattern, $callable) use ($testPattern, $testCallable) {
            $this->assertSame($pattern, $testPattern);
            $this->assertSame($callable, $testCallable);
        });
        $this->_object->get($testPattern, $testCallable);
    }

    public function testGetApp() {
        $this->assertSame($this->_mock, $this->_object->setApp($this->_mock)->getApp());
    }

    public function testGetContainer() {
        $this->_mock->expects($this->once())->method('getContainer');
        $this->_object->getContainer();
    }

    public function testGroup() {
        $testPattern = "pattern";
        $testCallable = "callable";
        $this->_mock->expects($this->once())->method('group')->willReturnCallback(function($pattern, $callable) use ($testPattern, $testCallable) {
            $this->assertSame($pattern, $testPattern);
            $this->assertSame($callable, $testCallable);
        });
        $this->_object->group($testPattern, $testCallable);
    }

    public function testMap() {
        $testMethods = ["methods"];
        $testPattern = "pattern";
        $testCallable = "callable";
        $this->_mock->expects($this->once())->method('map')->willReturnCallback(function($methods, $pattern, $callable) use ($testMethods, $testPattern, $testCallable) {
            $this->assertSame($methods, $testMethods);
            $this->assertSame($pattern, $testPattern);
            $this->assertSame($callable, $testCallable);
        });
        $this->_object->map($testMethods, $testPattern, $testCallable);
    }

    public function testOptions() {
        $testPattern = "pattern";
        $testCallable = "callable";
        $this->_mock->expects($this->once())->method('options')->willReturnCallback(function($pattern, $callable) use ($testPattern, $testCallable) {
            $this->assertSame($pattern, $testPattern);
            $this->assertSame($callable, $testCallable);
        });
        $this->_object->options($testPattern, $testCallable);
    }

    public function testPatch() {
        $testPattern = "pattern";
        $testCallable = "callable";
        $this->_mock->expects($this->once())->method('patch')->willReturnCallback(function($pattern, $callable) use ($testPattern, $testCallable) {
            $this->assertSame($pattern, $testPattern);
            $this->assertSame($callable, $testCallable);
        });
        $this->_object->patch($testPattern, $testCallable);
    }

    public function testPost() {
        $testPattern = "pattern";
        $testCallable = "callable";
        $this->_mock->expects($this->once())->method('post')->willReturnCallback(function($pattern, $callable) use ($testPattern, $testCallable) {
            $this->assertSame($pattern, $testPattern);
            $this->assertSame($callable, $testCallable);
        });
        $this->_object->post($testPattern, $testCallable);
    }

    public function testProcess() {
        $response = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $request = $this->getMockBuilder(ServerRequestInterface::class)->getMock();
        $this->_mock->expects($this->once())->method('process')->willReturnCallback(function($testRequest, $testResponse) use ($request, $response) {
            $this->assertSame($request, $testRequest);
            $this->assertSame($response, $testResponse);
        });
        $this->_object->process($request, $response);
    }

    public function testPut() {
        $testPattern = "pattern";
        $testCallable = "callable";
        $this->_mock->expects($this->once())->method('put')->willReturnCallback(function($pattern, $callable) use ($testPattern, $testCallable) {
            $this->assertSame($pattern, $testPattern);
            $this->assertSame($callable, $testCallable);
        });
        $this->_object->put($testPattern, $testCallable);
    }

    public function testRespond() {
        $response = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $this->_mock->expects($this->once())->method('respond')->willReturnCallback(function($internalRespond) use ($response) {
            $this->assertSame($response, $internalRespond);
        });
        $this->_object->respond($response);
    }

    public function testRun() {
        $this->_mock->expects($this->once())->method('run')->willReturnCallback(function($default) {
            $this->assertFalse($default);
        });
        $this->_object->run();
    }

    public function testRunTrue() {
        $this->_mock->expects($this->once())->method('run')->willReturnCallback(function($default) {
            $this->assertTrue($default);
        });
        $this->_object->run(true);
    }
}
