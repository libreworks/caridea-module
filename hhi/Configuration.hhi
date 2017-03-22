<?hh // strict

namespace Caridea\Module;

use Caridea\Container\Properties;

class Configuration
{
    protected array<Module> $modules;
    protected Properties $config;

    public function __construct(array<string> $modules, array<string,mixed> $config)
    {
        $this->modules = $this->createModules($modules);
        $this->config = $this->createConfigContainer($config);
    }

    private function createModules(array<string> $modules): array<Module>
    {
        return [];
    }

    private function createConfigContainer(array<string,mixed> $config): Properties
    {
        return new Properties([]);
    }

    public function getConfigContainer(): Properties
    {
        return $this->config;
    }

    public function getModules(): array<Module>
    {
        return $this->modules;
    }
}
