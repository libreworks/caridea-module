<?hh // strict

namespace Caridea\Module;

use Caridea\Container\Properties;
use Caridea\Container\Objects;

class System extends Configuration
{
    protected Objects $backend;

    protected Objects $frontend;

    public function __construct(array<string> $modules, array<string,mixed> $config)
    {
        parent::__construct($modules, $config);
        $this->backend = $this->createBackendContainer($this->config);
        $this->frontend = $this->createFrontendContainer($this->backend);
    }

    private function createBackendContainer(Properties $parent): Objects
    {
        $builder = Objects::builder();
        return $builder->build($parent);
    }

    private function createFrontendContainer(Objects $parent): Objects
    {
        $builder = Objects::builder();
        return $builder->build($parent);
    }

    public function getBackendContainer(): Objects
    {
        return $this->backend;
    }

    public function getFrontendContainer(): Objects
    {
        return $this->frontend;
    }
}
