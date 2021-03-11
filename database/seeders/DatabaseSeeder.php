<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Direction;
use App\Models\Inventory;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(AddressSeeder::class);

        $this->call(CustomerSeeder::class);

        $this->call(DirectionSeeder::class);

        $this->call(StockSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(InventorySeeder::class);

        $this->call(ProductoSeeder::class);

        $this->call(Inventory_ProductoSeeder::class);
    }
}
