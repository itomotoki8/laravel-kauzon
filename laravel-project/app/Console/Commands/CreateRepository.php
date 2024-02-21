<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {repositoryClassName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

            /**
     * @const string repository dir path
     */
    public const REPOSITORIES_PATH = 'app/Repositories/';

    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $repositoryFileName;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->className = $this->argument('repositoryClassName');

        if (!$this->className) {
            $this->error('Repository Class Name invalid');

            return;
        }

        $this->repositoryFileName = self::REPOSITORIES_PATH . $this->className . '.php';
        if ($this->isExistFiles()) {
            $this->error('Repository already exist');

            return;
        }

        $this->createRepositoryFile();
        $this->info('Repository created successfully');
    }

    /**
     * Create Repository File.
     */
    private function createRepositoryFile(): void
    {
        $content = "<?php\n\ndeclare(strict_types=1);\n\nnamespace App\\Repositories;\nuse App\\Repositories\\BaseRepositories;\n\nclass {$this->className} extends BaseRepository\n{\n\n    public function __construct()\n    {\n        \n    }\n}";

        file_put_contents($this->repositoryFileName, $content);
    }

    /**
     * Check if the same file exists.
     * @return bool
     */
    private function isExistFiles(): bool
    {
        return file_exists($this->repositoryFileName);
    }
}
