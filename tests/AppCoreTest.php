<?php


require_once dirname(__FILE__) . "/../Tdd/AppCore.php";

class AppCoreTest extends PHPUnit_Framework_TestCase
{

    /**
     * This is a test for testing the AppCore request dispatcher.
     * Sort of a component/integration test.
     *
     * @test
     */
    public function canDispatchUsingRequest() {
        $app = new \Tdd\AppCore();

        $result = $app->run(new \Tdd\AppRequest());

        $this->assertEquals($result[0], 'index', 'First element of the result is not "index"');
        $this->assertEquals($result[1], 'print_r', 'Second element of the result is not "print_r"');

    }

    /**
     * This is a test for testing the AppCore request dispatcher
     * using Mocked \Tdd\AppRequest
     *
     * @test
     */
    public function canDispatchUsingMockRequest() {
        $app = new \Tdd\AppCore();

        $request = $this->getMockBuilder('\Tdd\AppRequest')
                        ->setMethods(array('getParam'))
                        ->getMock();

        $request->expects($this->at(0))
                ->method('getParam')
                ->with($this->equalTo('op'))
                ->will($this->returnValue('create-account'));

        $request->expects($this->at(1))
                ->method('getParam')
                ->with($this->equalTo('format'))
                ->will($this->returnValue('json'));

        $result = $app->run($request);

        $this->assertEquals($result[0], 'create-account', 'First element of the result is not "create-account"');
        $this->assertEquals($result[1], 'json', 'Second element of the result is not "json"');

    }

    /**
     * This is a test for testing the AppCore request dispatcher
     * using a Spy of \Tdd\AppRequest
     *
     * @test
     */
    public function canDispatchUsingASpyRequest() {
        $app = new \Tdd\AppCore();

        require_once "SpyAppRequest.php";

        $request = new SpyAppRequest();

        $result = $app->run($request);

        $this->assertEquals($result[0], 'index', 'First element of the result is not "create-account"');
        $this->assertEquals($result[1], 'print_r', 'Second element of the result is not "json"');

    }

}
