<?php

namespace App\Console\Commands;

use App\Traits\CmzConsoleCommandsTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CmzMakeController extends Command
{
    use CmzConsoleCommandsTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cmz-make-controller {name} {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un nuevo controlador bajo de estructura de Comazon';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = $this->argument('path');

        $this->handleController($name, $path);
    }
}
