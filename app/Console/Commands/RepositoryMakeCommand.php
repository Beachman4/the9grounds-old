<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class RepositoryMakeCommand extends GeneratorCommand
{
    /*
     * TODO: Fix this
     */
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository
                            {name : The Name of the repository}
                            {model : The Model for the repository}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a repository';

    protected $type = 'Repository';

    public function getStub()
    {
        return __DIR__.'/Stubs/repository.stub';
    }

    public function fire()
    {
        $name = $this->parseName($this->getNameInput());

        $path = $this->getPath($name);

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type.' already exists!');

            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($name));

        $this->info($this->type.' created successfully.');
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $model = $this->argument('model');

        //return $this->replaceModel($stub, $model)->replaceClass($stub, $name);
        return str_replace("DummyModel", $model, parent::buildClass($name));
    }
}
