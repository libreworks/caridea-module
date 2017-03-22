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

use Caridea\Container\Builder;
use Caridea\Container\Objects;
use Caridea\Container\Properties;

/**
 * It really is just for code coverage
 */
class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Caridea\Module\Module
     */
    public function testBasic()
    {
        $obj = new class() extends Module {
        };
        $this->assertEquals([], $obj->getMeta());
        $this->assertEquals([], $obj->getConfig());
        $builder = $this->createMock(Builder::class);
        $properties = $this->createMock(Properties::class);
        $obj->setupBackend($builder, $properties);
        $obj->setupFrontend($builder, $properties);
        $this->verifyMockObjects();
    }
}