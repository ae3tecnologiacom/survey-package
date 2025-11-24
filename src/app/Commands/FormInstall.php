<?php

namespace Ae3\Survey\app\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use function Laravel\Prompts\info;

class FormInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'form:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info('Instalando o módulo de formulários...');
        Artisan::call('migrate', [
            '--force' => true
        ]);
        Artisan::call('vendor:publish', [
            '--tag' => 'form-config'
        ]);
        info('Módulo de formulários instalado com sucesso!');
    }
}
