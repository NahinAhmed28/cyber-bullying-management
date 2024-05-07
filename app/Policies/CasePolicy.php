<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
class CasePolicy
{
    use HandlesAuthorization;

    public function grand(Admin $admin)
    {
        return $result = Role::roleHasGrantPermissions($admin->role_id, 'cases');
    }

    public function parent(Admin $admin)
    {
        return $result = Role::roleHasParentPermissions($admin->role_id, 'case');
    }

    public function create(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.create');
    }

    public function read(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.read');
    }

    public function update(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.update');
    }

    public function delete(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.delete');
    }

    public function show(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.show');
    }


    public function delete_single_file(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.delete_single_file');
    }

    public function delete_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.delete_suspicious_info');
    }

    public function edit_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.edit_suspicious_info');
    }

    public function update_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.update_suspicious_info');
    }

    public function update_evidence_files(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.update_evidence_files');
    }

    public function update_member(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.update_member');
    }

    public function update_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.update_step_info');
    }

    public function edit_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.edit_step_info');
    }

    public function delete_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.delete_step_info');
    }

    public function update_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.update_addmember_info');
    }

    public function edit_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.edit_addmember_info');
    }

    public function delete_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'case','case.delete_addmember_info');
    }

}
