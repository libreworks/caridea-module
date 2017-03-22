<?hh // strict

namespace Caridea\Module;

abstract class Module
{
    public function getMeta(): array<string,string>
    {
        return [];
    }

    public function getConfig(): array<string,mixed>
    {
        return [];
    }

    public function setupBackend(\Caridea\Container\Builder $builder, \Caridea\Container\Properties $properties): void
    {
    }

    public function setupFrontend(\Caridea\Container\Builder $builder, \Caridea\Container\Properties $properties): void
    {
    }
}
