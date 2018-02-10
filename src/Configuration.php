<?php
declare(strict_types=1);
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
 * @copyright 2017-2018 LibreWorks contributors
 * @license   Apache-2.0
 */
namespace Caridea\Module;

use Caridea\Container\Properties;

/**
 * A bootstrapper for reading in module and configuration info.
 *
 * Once constructed, this object is immutable.
 */
class Configuration
{
    /**
     * @var array<Module>  Instantiated modules
     */
    protected $modules;
    /**
     * @var Properties  The config container
     */
    protected $config;

    /**
     * Creates a new Configuration.
     *
     * This constructor expects an array full of class names in the `$modules`
     * parameter. Each class name *must* extend `Caridea\Module\Module` or an
     * `UnexpectedValueException` will be thrown.
     *
     * @param array<string> $modules  An array of module class names
     * @param array<string,mixed> $config  The system configuration
     * @throws \UnexpectedValueException if a module class doesn't extend `Caridea\Module\Module`
     */
    public function __construct(array $modules, array $config)
    {
        $this->modules = $this->createModules($modules);
        $this->config = $this->createConfigContainer($config);
    }

    private function createModules(array $sysModules)
    {
        $modules = [];
        foreach ($sysModules as $className) {
            if (!is_a($className, Module::class, true)) {
                throw new \UnexpectedValueException("Not a module class: '$className'");
            } else {
                $modules[] = new $className();
            }
        }
        return $modules;
    }

    private function createConfigContainer(array $config): Properties
    {
        $sysConfig = [];
        // first set module defaults
        foreach ($this->modules as $module) {
            $sysConfig = array_merge($sysConfig, $module->getConfig());
        }
        // then bring in user-specified values
        $sysConfig = array_merge($sysConfig, $config);
        return new Properties($sysConfig);
    }

    /**
     * Gets the configuration settings container.
     *
     * @return \Caridea\Container\Properties  The config container
     */
    public function getConfigContainer(): Properties
    {
        return $this->config;
    }

    /**
     * Gets the loaded modules.
     *
     * @return array<\Caridea\Module\Module> The loaded modules
     */
    public function getModules(): array
    {
        return $this->modules;
    }
}
