<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
class MarkInProgress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:mark-in-progress {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark a task as in progress';

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

        $task->status = 'in-progress';
        $task->save();

        $this->info("Task marked as in progress.");
    }
}
