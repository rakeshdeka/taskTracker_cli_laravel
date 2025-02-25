<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class UpdateTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:update {id} {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update a task';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $task = Task::find($this->argument('id'));

        if (!$task) {
            $this->error("Task not found!");
            return;
        }

        $task->title = $this->argument('title');
        $task->save();

        $this->info("Task updated successfully.");
    }
}
