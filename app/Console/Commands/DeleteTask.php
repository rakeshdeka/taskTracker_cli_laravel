<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
class DeleteTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a task';

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

        $task->delete();

        $this->info("Task deleted successfully.");
    }
}
