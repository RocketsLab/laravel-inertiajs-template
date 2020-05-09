<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateInertiaPage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inertia:page {page}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a inertiajs vue Page';


    protected $stub = <<<'vue'
<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">::pageName</h1>
    <p class="mb-12 leading-normal">Sub title (optional)</p>
    <div>
      Place here page content
    </div>
  </div>
</template>

<script>
import Layout from '@/Pages/Layouts/App'

export default {
  metaInfo: { title: '::pageName' },
  layout: Layout,
}
</script>
vue;

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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $page = $this->argument('page');

        $this->info("Creating Page {$page}...");

        $pagesPath = resource_path('js/Pages');

        if ($hasDirectory = count($path = explode("\\", $page)) > 1) {
            $fileName = $path[count($path) - 1];

            collect($path)->map(function($dir) use ($fileName, $pagesPath){
                if($dir != $fileName && !is_dir($pagesPath . DIRECTORY_SEPARATOR . $dir)) {
                    return mkdir($pagesPath . DIRECTORY_SEPARATOR . $dir);
                }
                return null;
            })->filter();
        }

        $normalizedPath = $hasDirectory ? implode(DIRECTORY_SEPARATOR, $path) : $page;

        file_put_contents(
            $pagesPath . DIRECTORY_SEPARATOR . "{$normalizedPath}.vue",
            str_replace('::pageName', $fileName ?? $page, $this->stub)
        );

        $this->comment("Inertiajs Page {$page} created!");
    }
}
