<?php
/**
 * Caridea Module
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 *
 * @copyright 2015-2017 Appertly
 * @copyright 2017 LibreWorks contributors
 * @license   Apache-2.0
 */
namespace Caridea\Module;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Caridea\Module\Configuration
     * @covers \Caridea\Module\Module
     */
    public function testBasic()
    {
        $config = ['foo' => 'bar'];
        $object = new Configuration(['\Caridea\Module\TestModule1'], $config);
        $this->assertEquals('bar', $object->getConfigContainer()->get('foo'));
        $this->assertEquals('foo', $object->getConfigContainer()->get('bar'));
        $this->assertContainsOnly('\Caridea\Module\TestModule1', $object->getModules());
    }

    /**
     * @covers \Caridea\Module\Configuration
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Not a module class: 'Caridea\Module\ConfigurationTest'
     */
    public function testError()
    {
        new Configuration([__CLASS__], []);
    }
}

class TestModule1 extends Module
{
    public function getConfig(): array
    {
        return ['foo' => null, 'bar' => 'foo'];
    }
}
