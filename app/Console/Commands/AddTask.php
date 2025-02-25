<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class AddTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:add {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new task';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $task = Task::create(['title' => $this->argument('title')]);
        $this->info("Task added successfully (ID: {$task->id})");
    }}
