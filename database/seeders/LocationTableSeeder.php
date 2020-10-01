<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [

            'Baringo County‎',
            'Bomet County‎',
            'Bungoma County‎',
            'Busia County',
            'Elgeyo-Marakwet County‎',
            'Embu County',
            'Garissa County‎',
            'Homa Bay County‎',

            'Isiolo County‎',
            'Kajiado County‎',
            'Kakamega County‎',
            'Kericho County‎',
            'Kiambu County',
            'Kilifi County‎',
            'Kirinyaga County‎',
            'Kisii County‎',
            'Kisumu County‎',
            'Kitui County‎',
            'Kwale County‎',
            'Laikipia County‎',
            'Lamu County‎',
            'Machakos County‎',
            'Makueni County‎',
            'Mandera County‎',
            'Marsabit County‎',
            'Meru County‎',
            'Migori County‎',
            'Mombasa County‎',
            'Muranga County‎',
            'Nairobi‎ County',
            'Nakuru County‎',
            'Nandi County‎',
            'Narok County‎',
            'Nyamira County‎',
            'Nyandarua County‎',
            'Nyeri County‎',
            'Samburu County‎',
            'Siaya County‎',
            'Taita-Taveta County‎',
            'Tana River County‎',
            'Tharaka-Nithi County‎',
            'Trans-Nzoia County‎',
            'Turkana County‎',
            'Uasin Gishu County‎',
            'Vihiga County‎',
            'West Pokot County‎'

        ];
        foreach ($locations as $location) {
            County::create(['name' => $location]);
        }
    }
}
