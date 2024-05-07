<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('site_settings')->truncate();

        \DB::table('site_settings')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'footer_en' => '© 2023 - Cyber Crime Prevention Committee for Teens and a2i (Aspire to Innovate) <br />
                    <span style="font-weight: bold">
                      Developed By :
                      <a style="font-weight: bold; color:green" href="https://a2i.gov.bd/">a2i (Aspire to Innovate)</a>
                    </span>',
                    'footer_bn' => '© ২০২৩ - কিশোর কিশোরীদের জন্য সাইবার অপরাধ প্রতিরোধ কমিটি এবং a2i (Aspire to Innovate) <br />
                    <span style="font-weight: bold">
                      নির্মাণে :
                      <a style="font-weight: bold; color:green" href="https://a2i.gov.bd/">a2i (Aspire to Innovate)</a>
                    </span>',
                    'updated_at' => NOW(),
                    'created_at' => NOW(),
                )
        ));
        Schema::enableForeignKeyConstraints();
    }

}
