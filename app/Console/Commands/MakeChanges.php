<?php

namespace App\Console\Commands;

use App\Constants\UserRole;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\User;
use Illuminate\Console\Command;

class MakeChanges extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:changes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run various system changes';

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
     * @return int
     */
    public function handle()
    {

        $categories = ItemCategory::all();

        foreach ($categories as $category) {
            $category->code = 'RISER-'.sprintf('%03d', $category->id);
            $category->update();
        }

        $items = Item::all();

        foreach ($items as $item) {
            $item->code = 'RISER-'.sprintf('%03d', $item->category_id).'-'.sprintf('%03d', $item->id);
            $item->update();
        }

        $initialAdmin = User::find(1);

        $initialAdmin->first_name = "Initial";
        $initialAdmin->last_name = "Admin";

        $initialAdmin->update();

        $initialAdmin->assignRole(UserRole::ADMINISTRATOR);


        return Command::SUCCESS;
    }
}
