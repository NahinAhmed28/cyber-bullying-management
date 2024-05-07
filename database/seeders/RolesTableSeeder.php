<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('roles')->truncate();
        DB::table('roles')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'sort' => '1',
                    'code' => '1',
                    'name' => 'Master Admin',
                    'title_en' => 'Master Admin',
                    'title_bn' => 'মাস্টার এডমিন',
                    'status' => 1,
                    'guard_name' => 'MasterAdmin',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                ),
            1 =>
                array(
                    'id' => 2,
                    'sort' => '2',
                    'code' => '2',
                    'name' => 'System Admin',
                    'title_en' => 'System Admin',
                    'title_bn' => 'সিস্টেম এডমিন',
                    'status' => 1,
                    'guard_name' => 'SystemAdmin',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                ),
            2 =>
                array(
                    'id' => 3,
                    'sort' => '3',
                    'code' => '3',
                    'name' => 'Admin',
                    'title_en' => 'Admin',
                    'title_bn' => 'এডমিন',
                    'status' => 1,
                    'guard_name' => 'Admin',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                ),
            3 =>
                array(
                    'id' => 4,
                    'sort' => '4',
                    'code' => '4',
                    'name' => 'Central Committee',
                    'title_en' => 'Central Committee',
                    'title_bn' => 'কেন্দ্রীয় কমিটি',
                    'status' => 1,
                    'guard_name' => 'CentralCommittee',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                ),
            4 =>
                array(
                    'id' => 5,
                    'sort' => '5',
                    'code' => '5',
                    'name' => 'Warking Group',
                    'title_en' => 'Warking Group',
                    'title_bn' => 'ওয়ার্কিং গ্রুপ',
                    'status' => 1,
                    'guard_name' => 'CentralCommittee',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                ),
            5 =>
                array(
                    'id' => 6,
                    'sort' => '6',
                    'code' => '6',
                    'name' => 'District Committee',
                    'title_en' => 'District Committee',
                    'title_bn' => 'জেলা কমিটি',
                    'status' => 1,
                    'guard_name' => 'DistrictCommittee',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                ),
            6 =>
                array(
                    'id' => 7,
                    'sort' => '7',
                    'code' => '7',
                    'name' => 'Upazila Committee',
                    'title_en' => 'Upazila Committee',
                    'title_bn' => 'উপজেলা কমিটি',
                    'status' => 1,
                    'guard_name' => 'UpazilaCommittee',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                ),
            7 =>
                array(
                    'id' => 8,
                    'sort' => '8',
                    'code' => '8',
                    'name' => 'Volunteer',
                    'title_en' => 'Volunteer',
                    'title_bn' => 'স্বেচ্ছাসেবক',
                    'status' => 1,
                    'guard_name' => 'Volunteer',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                ),
            8 =>
                array(
                    'id' => 9,
                    'sort' => '9',
                    'code' => '9',
                    'name' => 'Operator',
                    'title_en' => 'Operator',
                    'title_bn' => 'অপারেটর',
                    'status' => 1,
                    'guard_name' => 'Operator',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                )
        ));
        
        Schema::enableForeignKeyConstraints();

    }
}