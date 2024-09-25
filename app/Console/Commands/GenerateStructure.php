<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateStructure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:structure {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a Controller, Service, Repository, and Interface';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        // Get the base name and the full namespace path
        $baseName = class_basename($name);
        $namespacePath = str_replace('\\', '/', $name);

        // Generate the Controller
        $this->generateFile(
            app_path("Http/Controllers/{$namespacePath}Controller.php"),
            $this->getControllerStub(),
            ['{{name}}' => $baseName]
        );

        // Generate the Service
        $this->generateFile(
            app_path("Services/{$namespacePath}Service.php"),
            $this->getServiceStub(),
            ['{{name}}' => $baseName]
        );

        // Generate the Repository
        $this->generateFile(
            app_path("Repository/{$namespacePath}Repository.php"),
            $this->getRepositoryStub(),
            ['{{name}}' => $baseName]
        );

        // Generate the Interface
        $this->generateFile(
            app_path("Interfaces/{$namespacePath}Interface.php"),
            $this->getInterfaceStub(),
            ['{{name}}' => $baseName]
        );

        $this->info('Structure generated successfully.');
    }

    protected function generateFile($path, $stub, $replacements)
    {
        $stub = str_replace(array_keys($replacements), array_values($replacements), $stub);

        if (!File::exists(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

        File::put($path, $stub);
    }

    protected function getControllerStub()
    {
        return <<<'EOD'
        <?php

        namespace App\Http\Controllers;

        use App\Services\{{name}}Service;

        class {{name}}Controller extends Controller
        {
            protected $service;

            public function __construct({{name}}Service $service)
            {
                $this->service = $service;
            }

            // Your controller methods here
        }
        EOD;
    }

    protected function getServiceStub()
    {
        return <<<'EOD'
        <?php

        namespace App\Services;

        use App\Repository\{{name}}Repository;

        class {{name}}Service
        {
            protected $repository;

            public function __construct({{name}}Repository $repository)
            {
                $this->repository = $repository;
            }

            // Your service methods here
        }
        EOD;
    }

    protected function getRepositoryStub()
    {
        return <<<'EOD'
        <?php

        namespace App\Repository;

        use App\Interfaces\{{name}}Interface;

        class {{name}}Repository implements {{name}}Interface
        {
            // Your repository methods here
        }
        EOD;
    }

    protected function getInterfaceStub()
    {
        return <<<'EOD'
        <?php

        namespace App\Interfaces;

        interface {{name}}Interface
        {
            // Your interface methods here
        }
        EOD;
    }
}
