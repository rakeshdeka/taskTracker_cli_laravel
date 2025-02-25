<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class ListTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:list {status?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all tasks or filter by status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $status = $this->argument('status');

        if ($status) {
            $tasks = Task::where('status', $status)->get();
        } else {
            $tasks = Task::all();
        }

        if ($tasks->isEmpty()) {
            $this->info("No tasks found.");
            return;
        }

        $this->table(['ID', 'Title', 'Status'], $tasks->toArray());
    }
}
