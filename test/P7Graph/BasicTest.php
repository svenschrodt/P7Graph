<?php
/**
 * Basic testing of PHPUnit's functionality
 * 
 * 
 * @link https://github.com/svenschrodt/P7Graph
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @package P7Tools
 * @license https://github.com/svenschrodt/P7Tools/blob/master/LICENSE.md
 * @copyright Sven Schrodt<sven@schrodt-service.net>
 * @version 0.0.23
 */
class BasicTest extends \PHPUnit\Framework\TestCase
{

    public function testInstatiationOfFoo()
    {
        $foo = new \P7Graph\Config();
        $this->assertInstanceOf('\P7Graph\Config', $foo);
        $bar = new \P7Graph\Drawing();
        $this->assertInstanceOf('\P7Graph\Drawing', $bar);
        $this->assertTrue($bar != $foo);
    }
}


