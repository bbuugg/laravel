<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ConvertBlog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:blog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Filesystem $filesystem)
    {
        foreach ($filesystem->files(public_path('blog')) as $fileInfo) {
            $file = file_get_contents($fileInfo->getRealPath());
            try {
                $m = preg_match('/---([\s\S]*?)---([\s\S]*)/', $file, $matches);
                if ($m) {
                    $header = explode("\n", $matches[1]);
                    $title  = '';
                    $date   = '';
                    foreach ($header as $value) {
                        $res   = explode(':', $value, 2);
                        $key   = $res[0];
                        $value = trim($res[1] ?? '');
                        $$key  = $value;
                    }
                    Article::query()->create(['title' => $title, 'created_at' => $date, 'content' => trim($matches[2])]);
                    $this->info('成功：' . $title);
                } else {
                    $this->error('失败：' . $fileInfo->getRealPath());
                }
            } catch (\Exception $e) {
                $this->error('失败：' . $fileInfo->getRealPath());
            }
        }

        return Command::SUCCESS;
    }
}
