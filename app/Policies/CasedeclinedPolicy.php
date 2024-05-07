<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
class CasedeclinedPolicy
{
    use HandlesAuthorization;

    public function grand(Admin $admin)
    {
        return $result = Role::roleHasGrantPermissions($admin->role_id, 'cases');
    }

    public function parent(Admin $admin)
    {
        return $result = Role::roleHasParentPermissions($admin->role_id, 'casedeclined');
    }

    public function create(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.create');
    }

    public function read(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.read');
    }

    public function update(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.update');
    }

    public function delete(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.delete');
    }

    public function show(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.show');
    }


    public function delete_single_file(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.delete_single_file');
    }

    public function delete_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.delete_suspicious_info');
    }

    public function edit_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.edit_suspicious_info');
    }

    public function update_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.update_suspicious_info');
    }

    public function update_evidence_files(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.update_evidence_files');
    }

    public function update_member(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.update_member');
    }

    public function update_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.update_step_info');
    }

    public function edit_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.edit_step_info');
    }

    public function delete_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.delete_step_info');
    }

    public function update_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.update_addmember_info');
    }

    public function edit_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.edit_addmember_info');
    }

    public function delete_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.delete_addmember_info');
    }

    public function pdf_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.pdf_suspicious_info');
    }

    public function pdf_victim_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.pdf_victim_info');
    }

    public function pdf_case_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.pdf_case_info');
    }

    public function update_feedback_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casedeclined','casedeclined.update_feedback_info');
    }

}
