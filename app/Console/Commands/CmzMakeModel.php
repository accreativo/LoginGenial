<?php

namespace App\Console\Commands;

use App\Traits\CmzConsoleCommandsTrait;
use Illuminate\Console\Command;

class CmzMakeModel extends Command
{
    use CmzConsoleCommandsTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cmz-make-model {name} {path} {table} {fields}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un nuevo model bajo de estructura de Comazon';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = $this->argument('path');
        $table = $this->argument('table');
        $fields = $this->argument('fields');

        $this->handleModel($name, $path, $table, $fields);
    }
}
