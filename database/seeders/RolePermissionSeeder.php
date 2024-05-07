<?php
namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Permission::truncate();
        
        DB::table('roles_permissions')->truncate();
        DB::table('permissions')->truncate();
        // Permission List as array
        $permissions = [

           [
                'group_parent_name' => 'role-permissions',
                'group_name' => 'role',
                'permissions' => [
                    'role.create',
                    'role.read',
                    'role.update',
                    'role.delete',
                    'role.permission.update',
                ]
            ],
            
            [
                'group_parent_name' => 'role-permissions',
                'group_name' => 'user_type',
                'permissions' => [
                    'user_type.create',
                    'user_type.read',
                    'user_type.update',
                    'user_type.delete'
                ]
            ],
            [
                'group_parent_name' => 'role-permissions',
                'group_name' => 'site_setting',
                'permissions' => [
                    'site_setting.create',
                    'site_setting.read',
                    'site_setting.update',
                    'site_setting.delete'
                ]
            ],

            // [
            //     'group_parent_name' => 'role-permissions',
            //     'group_name' => 'lang',
            //     'permissions' => [
            //         'lang.create',
            //         'lang.read',
            //         'lang.update',
            //         'lang.delete'
            //     ]
            // ],


            [
                'group_parent_name' => 'administrative_locations',
                'group_name' => 'division',
                'permissions' => [
                    'division.create',
                    'division.read',
                    'division.update',
                    'division.delete'
                ]
            ],


            [
                'group_parent_name' => 'administrative_locations',
                'group_name' => 'district',
                'permissions' => [
                    'district.create',
                    'district.read',
                    'district.update',
                    'district.delete'
                ]
            ],

            [
                'group_parent_name' => 'administrative_locations',
                'group_name' => 'upazila',
                'permissions' => [
                    'upazila.create',
                    'upazila.read',
                    'upazila.update',
                    'upazila.delete'
                ]
            ],

            [
                'group_parent_name' => 'administrative_locations',
                'group_name' => 'thana',
                'permissions' => [
                    'thana.create',
                    'thana.read',
                    'thana.update',
                    'thana.delete'
                ]
            ],

            // [
            //     'group_parent_name' => 'locations',
            //     'group_name' => 'association',
            //     'permissions' => [
            //         'association.create',
            //         'association.read',
            //         'association.update',
            //         'association.delete'
            //     ]
            // ],

            // [
            //     'group_parent_name' => 'locations',
            //     'group_name' => 'area',
            //     'permissions' => [
            //         'area.create',
            //         'area.read',
            //         'area.update',
            //         'area.delete'
            //     ]
            // ],

            // [
            //     'group_parent_name' => 'locations',
            //     'group_name' => 'branch',
            //     'permissions' => [
            //         'branch.create',
            //         'branch.read',
            //         'branch.update',
            //         'branch.delete'
            //     ]
            // ],

            // [
            //     'group_parent_name' => 'locations',
            //     'group_name' => 'branch_unit',
            //     'permissions' => [
            //         'branch_unit.create',
            //         'branch_unit.read',
            //         'branch_unit.update',
            //         'branch_unit.delete'
            //     ]
            // ],


            // [
            //     'group_parent_name' => 'users',
            //     'group_name' => 'user',
            //     'permissions' => [
            //         'user.create',
            //         'user.read',
            //         'user.view',
            //         'user.print',
            //         'user.search',
            //         'user.update',
            //         'user.delete'
            //     ]
            // ],
           
            [
                'group_parent_name' => 'users',
                'group_name' => 'admin',
                'permissions' => [
                    'admin.create',
                    'admin.read',
                    'admin.update',
                    'admin.delete',
                    'admin.change.password',
                ]
            ],
           
            // [
            //     'group_parent_name' => 'users',
            //     'group_name' => 'branch_user',
            //     'permissions' => [
            //         'branch_user.create',
            //         'branch_user.read',
            //         'branch_user.update',
            //         'branch_user.delete',
            //         'branch_user.change.password',
            //     ]
            // ],

            [
                'group_parent_name' => 'users',
                'group_name' => 'central_committee',
                'permissions' => [
                    'central_committee.create',
                    'central_committee.read',
                    'central_committee.update',
                    'central_committee.delete',
                    'central_committee.change.password',
                ]
            ],

            [
                'group_parent_name' => 'users',
                'group_name' => 'district_committee',
                'permissions' => [
                    'district_committee.create',
                    'district_committee.read',
                    'district_committee.update',
                    'district_committee.delete',
                    'district_committee.change.password',
                ]
            ],

            [
                'group_parent_name' => 'users',
                'group_name' => 'upazila_committee',
                'permissions' => [
                    'upazila_committee.create',
                    'upazila_committee.read',
                    'upazila_committee.update',
                    'upazila_committee.delete',
                    'upazila_committee.change.password',
                ]
            ],

            // [
            //     'group_parent_name' => 'master',
            //     'group_name' => 'office_type',
            //     'permissions' => [
            //         'office_type.create',
            //         'office_type.read',
            //         'office_type.update',
            //         'office_type.delete',
            //     ]
            // ],

            // [
            //     'group_parent_name' => 'master',
            //     'group_name' => 'service_type',
            //     'permissions' => [
            //         'service_type.create',
            //         'service_type.read',
            //         'service_type.update',
            //         'service_type.delete',
            //     ]
            // ],

            // [
            //     'group_parent_name' => 'master',
            //     'group_name' => 'service',
            //     'permissions' => [
            //         'service.create',
            //         'service.read',
            //         'service.update',
            //         'service.delete',
            //     ]
            // ],

            [
                'group_parent_name' => 'master',
                'group_name' => 'case_type',
                'permissions' => [
                    'case_type.create',
                    'case_type.read',
                    'case_type.update',
                    'case_type.delete',
                ]
            ],

            [
                'group_parent_name' => 'master',
                'group_name' => 'case_category',
                'permissions' => [
                    'case_category.create',
                    'case_category.read',
                    'case_category.update',
                    'case_category.delete',
                ]
            ],

            [
                'group_parent_name' => 'master',
                'group_name' => 'case_status',
                'permissions' => [
                    'case_status.create',
                    'case_status.read',
                    'case_status.update',
                    'case_status.delete',
                ]
            ],

            // [
            //     'group_parent_name' => 'master',
            //     'group_name' => 'guardian_type',
            //     'permissions' => [
            //         'guardian_type.create',
            //         'guardian_type.read',
            //         'guardian_type.update',
            //         'guardian_type.delete',
            //     ]
            // ],

            [
                'group_parent_name' => 'master',
                'group_name' => 'designation',
                'permissions' => [
                    'designation.create',
                    'designation.read',
                    'designation.update',
                    'designation.delete',
                ]
            ],

            [
                'group_parent_name' => 'master',
                'group_name' => 'office_designation',
                'permissions' => [
                    'office_designation.create',
                    'office_designation.read',
                    'office_designation.update',
                    'office_designation.delete',
                ]
            ],

            [
                'group_parent_name' => 'master',
                'group_name' => 'risk',
                'permissions' => [
                    'risk.create',
                    'risk.read',
                    'risk.update',
                    'risk.delete',
                ]
            ],


            [
                'group_parent_name' => 'applications',
                'group_name' => 'application',
                'permissions' => [
                    'application.create',
                    'application.read',
                    'application.update',
                    'application.delete',
                    'application.show',
                    'application.delete_single_file',
                    'application.update_evidence_files',
                    'application.delete_suspicious_info',
                    'application.edit_suspicious_info',
                    'application.update_suspicious_info',
                    'application.update_member',
                    'application.delete_step_info',
                    'application.edit_step_info',
                    'application.update_step_info',
                    'application.delete_addmember_info',
                    'application.edit_addmember_info',
                    'application.update_addmember_info',

                    'application.pdf_suspicious_info',
                    'application.pdf_victim_info',
                    'application.pdf_case_info',
                    'application.update_feedback_info',
                ]
            ],

            // [
            //     'group_parent_name' => 'cases',
            //     'group_name' => 'case',
            //     'permissions' => [
            //         'case.create',
            //         'case.read',
            //         'case.update',
            //         'case.delete',
            //         'case.show',
            //         'case.delete_single_file',
            //         'case.update_evidence_files',
            //         'case.delete_suspicious_info',
            //         'case.edit_suspicious_info',
            //         'case.update_suspicious_info',
            //         'case.update_member',
            //         'case.delete_step_info',
            //         'case.edit_step_info',
            //         'case.update_step_info',
            //         'case.delete_addmember_info',
            //         'case.edit_addmember_info',
            //         'case.update_addmember_info',
            //     ]
            // ],

            // [
            //     'group_parent_name' => 'applicationns',
            //     'group_name' => 'applicationn',
            //     'permissions' => [
            //         'applicationn.create',
            //         'applicationn.read',
            //         'applicationn.update',
            //         'applicationn.delete',
            //         'applicationn.show',
            //         'applicationn.delete_single_file',
            //         'applicationn.update_evidence_files',
            //         'applicationn.delete_suspicious_info',
            //         'applicationn.edit_suspicious_info',
            //         'applicationn.update_suspicious_info',
            //         'applicationn.update_member',
            //         'applicationn.delete_step_info',
            //         'applicationn.edit_step_info',
            //         'applicationn.update_step_info',
            //         'applicationn.delete_addmember_info',
            //         'applicationn.edit_addmember_info',
            //         'applicationn.update_addmember_info',
            //     ]
            // ],


            [
                'group_parent_name' => 'cases',
                'group_name' => 'casepending',
                'permissions' => [
                    'casepending.create',
                    'casepending.read',
                    'casepending.update',
                    'casepending.delete',
                    'casepending.show',
                    'casepending.delete_single_file',
                    'casepending.update_evidence_files',
                    'casepending.delete_suspicious_info',
                    'casepending.edit_suspicious_info',
                    'casepending.update_suspicious_info',
                    'casepending.update_member',
                    'casepending.delete_step_info',
                    'casepending.edit_step_info',
                    'casepending.update_step_info',
                    'casepending.delete_addmember_info',
                    'casepending.edit_addmember_info',
                    'casepending.update_addmember_info',

                    'casepending.pdf_suspicious_info',
                    'casepending.pdf_victim_info',
                    'casepending.pdf_case_info',
                    'casepending.update_feedback_info',
                    
                ]
            ],

            [
                'group_parent_name' => 'cases',
                'group_name' => 'caseongoing',
                'permissions' => [
                    'caseongoing.create',
                    'caseongoing.read',
                    'caseongoing.update',
                    'caseongoing.delete',
                    'caseongoing.show',
                    'caseongoing.delete_single_file',
                    'caseongoing.update_evidence_files',
                    'caseongoing.delete_suspicious_info',
                    'caseongoing.edit_suspicious_info',
                    'caseongoing.update_suspicious_info',
                    'caseongoing.update_member',
                    'caseongoing.delete_step_info',
                    'caseongoing.edit_step_info',
                    'caseongoing.update_step_info',
                    'caseongoing.delete_addmember_info',
                    'caseongoing.edit_addmember_info',
                    'caseongoing.update_addmember_info',

                    'caseongoing.pdf_suspicious_info',
                    'caseongoing.pdf_victim_info',
                    'caseongoing.pdf_case_info',
                    'caseongoing.update_feedback_info',
                ]
            ],

            [
                'group_parent_name' => 'cases',
                'group_name' => 'casedeclined',
                'permissions' => [
                    'casedeclined.create',
                    'casedeclined.read',
                    'casedeclined.update',
                    'casedeclined.delete',
                    'casedeclined.show',
                    'casedeclined.delete_single_file',
                    'casedeclined.update_evidence_files',
                    'casedeclined.delete_suspicious_info',
                    'casedeclined.edit_suspicious_info',
                    'casedeclined.update_suspicious_info',
                    'casedeclined.update_member',
                    'casedeclined.delete_step_info',
                    'casedeclined.edit_step_info',
                    'casedeclined.update_step_info',
                    'casedeclined.delete_addmember_info',
                    'casedeclined.edit_addmember_info',
                    'casedeclined.update_addmember_info',

                    'casedeclined.pdf_suspicious_info',
                    'casedeclined.pdf_victim_info',
                    'casedeclined.pdf_case_info',
                    'casedeclined.update_feedback_info',
                ]
            ],

            [
                'group_parent_name' => 'cases',
                'group_name' => 'caseincomplete',
                'permissions' => [
                    'caseincomplete.create',
                    'caseincomplete.read',
                    'caseincomplete.update',
                    'caseincomplete.delete',
                    'caseincomplete.show',
                    'caseincomplete.delete_single_file',
                    'caseincomplete.update_evidence_files',
                    'caseincomplete.delete_suspicious_info',
                    'caseincomplete.edit_suspicious_info',
                    'caseincomplete.update_suspicious_info',
                    'caseincomplete.update_member',
                    'caseincomplete.delete_step_info',
                    'caseincomplete.edit_step_info',
                    'caseincomplete.update_step_info',
                    'caseincomplete.delete_addmember_info',
                    'caseincomplete.edit_addmember_info',
                    'caseincomplete.update_addmember_info',

                    'caseincomplete.pdf_suspicious_info',
                    'caseincomplete.pdf_victim_info',
                    'caseincomplete.pdf_case_info',
                    'caseincomplete.update_feedback_info',
                ]
            ],

            [
                'group_parent_name' => 'cases',
                'group_name' => 'casecomplete',
                'permissions' => [
                    'casecomplete.create',
                    'casecomplete.read',
                    'casecomplete.update',
                    'casecomplete.delete',
                    'casecomplete.show',
                    'casecomplete.delete_single_file',
                    'casecomplete.update_evidence_files',
                    'casecomplete.delete_suspicious_info',
                    'casecomplete.edit_suspicious_info',
                    'casecomplete.update_suspicious_info',
                    'casecomplete.update_member',
                    'casecomplete.delete_step_info',
                    'casecomplete.edit_step_info',
                    'casecomplete.update_step_info',
                    'casecomplete.delete_addmember_info',
                    'casecomplete.edit_addmember_info',
                    'casecomplete.update_addmember_info',

                    'casecomplete.pdf_suspicious_info',
                    'casecomplete.pdf_victim_info',
                    'casecomplete.pdf_case_info',
                    'casecomplete.update_feedback_info',
                ]
            ],

            
        
        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionParentGroup = $permissions[$i]['group_parent_name'];
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $count = Permission::where(['name'=>$permissions[$i]['permissions'][$j]])->count();
                if ($count < 1) {
                    $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_parent_name' => $permissionParentGroup, 'group_name' => $permissionGroup, 'guard_name'=>'admin']);
                }
            }
        }
        
        $permissions = Permission::get();

        // foreach (Admin::DEFAULT_ROLE as $key1 => $item) {
        //     foreach ($permissions as $key => $value) {
        //         DB::insert("INSERT INTO `roles_permissions` (`role_id`,`permission_id`) VALUES ($key1, $value->id)");
        //     }
        // }

        foreach ($permissions as $key => $value) {
            DB::insert("INSERT INTO `roles_permissions` (`role_id`,`permission_id`) VALUES (1, $value->id)");
        }
        
        // foreach ($permissions as $key => $value) {
        //     DB::insert("INSERT INTO `roles_permissions` (`role_id`,`permission_id`) VALUES (2, $value->id)");
        // }
        
        // foreach ($permissions as $key => $value) {
        //     DB::insert("INSERT INTO `roles_permissions` (`role_id`,`permission_id`) VALUES (3, $value->id)");
        // }



        // foreach ($permissions as $key => $value) {
        //     DB::insert("INSERT INTO `roles_permissions` (`role_id`,`permission_id`) VALUES (5, $value->id)");
        // }

        
        // foreach ($permissions as $key => $value) {
        //     DB::insert("INSERT INTO `roles_permissions` (`role_id`,`permission_id`) VALUES (9, $value->id)");
        // }
        // foreach ($permissions as $key => $value) {
        //     DB::insert("INSERT INTO `roles_permissions` (`role_id`,`permission_id`) VALUES (10, $value->id)");
        // }
    }
}

