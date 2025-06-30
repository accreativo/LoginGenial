<?php

namespace App\Console\Commands;

use App\Traits\CmzConsoleCommandsTrait;
use Illuminate\Console\Command;

class CmzMakeEntity extends Command
{
    use CmzConsoleCommandsTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cmz-make-entity {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un nueva entidad bajo de estructura de Comazon';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = $name;
        $this->handleController($name.'Controller',$path);
        $this->handleRequest($name.'Request',$path);
        $this->handleMiddleware($name.'Middleware',$path);
        $this->handleModel($name.'Model',$path);
    }
}
