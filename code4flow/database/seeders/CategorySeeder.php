<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array('Szomorú','Vicces', 'Élet', 'Vidám', 'Gyerek', 'Általános', 'Társadalom');

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                [
                    'name' => $cat,
                ]
            );
        }
    }

}
