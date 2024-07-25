<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ShowTableData extends Command
{
    // Command signature and description
    protected $signature = 'db:show-table {table}';
    protected $description = 'Display the data of a specified table';

    // Execute the console command
    public function handle()
    {
        // Retrieve the table name from the arguments
        $table = $this->argument('table');

        // Fetch the data from the table
        $data = DB::table($table)->get();

        // Display the data
        if ($data->isEmpty()) {
            $this->info("The table '{$table}' is empty or does not exist.");
        } else {
            $this->table(
                array_keys((array)$data->first()), // Table headers
                $data->map(function ($item) {
                    return (array)$item;
                })->toArray() // Table data
            );
        }
    }
}