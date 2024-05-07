<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DivisionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('divisions')->truncate();
        DB::insert("INSERT INTO `divisions` (`id`, `name`, `title_bn`, `title_en`, `bbs_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, NULL, 'বরিশাল', 'Barisal', '10', 1, 0, 0, NOW(), NOW()),
        (2, NULL, 'চট্টগ্রাম', 'Chittagong', '20', 1, 0, 0, NOW(), NOW()),
        (3, NULL, 'ঢাকা', 'Dhaka', '30', 1, 0, 0, NOW(), NOW()),
        (4, NULL, 'খুলনা', 'Khulna', '40', 1, 0, 0, NOW(), NOW()),
        (5, NULL, 'রাজশাহী', 'Rajshahi', '50', 1, 0, 0, NOW(), NOW()),
        (6, NULL, 'রংপুর', 'Rangpur', '60', 1, 0, 0, NOW(), NOW()),
        (7, NULL, 'সিলেট', 'Sylhet', '70', 1, 0, 0, NOW(), NOW()),
        (9, NULL, 'ময়মনসিংহ', 'Mymensingh', '45', 1, 0, 0, NOW(), NOW())");
        


        // DB::table('divisions')->insert(array (
                //     0 => 
            //     array (
            //         'id' => 1,
            //         'title_en' => 'Barisal',
            //         'title_bn' => 'বরিশাল',
            //         'bbs_code' => '10',
            //         'status' => 1,
            //         'created_by' => null,
            //         'updated_by' => null,
            //         'created_at' => '2015-11-17 06:01:41',
            //         'updated_at' => '2016-02-09 14:06:15',
            //     ),
            //     1 => 
            //     array (
            //         'id' => 2,
            //         'title_en' => 'Chittagong',
            //         'title_bn' => 'চট্টগ্রাম',
            //         'bbs_code' => '20',
            //         'status' => 1,
            //         'created_by' => null,
            //         'updated_by' => null,
            //         'created_at' => '2015-11-17 06:01:41',
            //         'updated_at' => '2016-02-09 14:06:15',
            //     ),
            //     2 => 
            //     array (
            //         'id' => 3,
            //         'title_en' => 'Dhaka',
            //         'title_bn' => 'ঢাকা',
            //         'bbs_code' => '30',
            //         'status' => 1,
            //         'created_by' => null,
            //         'updated_by' => null,
            //         'created_at' => '2015-11-17 06:01:41',
            //         'updated_at' => '2016-02-09 14:06:15',
            //     ),
            //     3 => 
            //     array (
            //         'id' => 4,
            //         'title_en' => 'Khulna',
            //         'title_bn' => 'খুলনা',
            //         'bbs_code' => '40',
            //         'status' => 1,
            //         'created_by' => null,
            //         'updated_by' => null,
            //         'created_at' => '2015-11-17 06:01:41',
            //         'updated_at' => '2016-02-09 14:06:15',
            //     ),
            //     4 => 
            //     array (
            //         'id' => 5,
            //         'title_en' => 'Rajshahi',
            //         'title_bn' => 'রাজশাহী',
            //         'bbs_code' => '50',
            //         'status' => 1,
            //         'created_by' => null,
            //         'updated_by' => null,
            //         'created_at' => '2015-11-17 06:01:41',
            //         'updated_at' => '2016-02-09 14:06:15',
            //     ),
            //     5 => 
            //     array (
            //         'id' => 6,
            //         'title_en' => 'Rangpur',
            //         'title_bn' => 'রংপুর',
            //         'bbs_code' => '60',
            //         'status' => 1,
            //         'created_by' => null,
            //         'updated_by' => null,
            //         'created_at' => '2015-11-17 06:01:41',
            //         'updated_at' => '2016-02-09 14:06:15',
            //     ),
            //     6 => 
            //     array (
            //         'id' => 7,
            //         'title_en' => 'Sylhet',
            //         'title_bn' => 'সিলেট',
            //         'bbs_code' => '70',
            //         'status' => 1,
            //         'created_by' => null,
            //         'updated_by' => null,
            //         'created_at' => '2015-11-17 06:01:41',
            //         'updated_at' => '2016-02-09 14:06:15',
            //     ),
            //     7 => 
            //     array (
            //         'id' => 9,
            //         'title_en' => 'Mymensingh',
            //         'title_bn' => 'ময়মনসিংহ',
            //         'bbs_code' => '45',
            //         'status' => 1,
            //         'created_by' => null,
            //         'updated_by' => null,
            //         'created_at' => '2015-11-17 06:01:41',
            //         'updated_at' => '2016-02-09 14:06:15',
            //     ),
        // ));



        Schema::enableForeignKeyConstraints();

    }
}