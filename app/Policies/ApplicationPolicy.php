<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
class ApplicationPolicy
{
    use HandlesAuthorization;

    public function grand(Admin $admin)
    {
        return $result = Role::roleHasGrantPermissions($admin->role_id, 'applications');
    }

    public function parent(Admin $admin)
    {
        return $result = Role::roleHasParentPermissions($admin->role_id, 'application');
    }

    public function create(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.create');
    }

    public function read(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.read');
    }

    public function update(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.update');
    }

    public function delete(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.delete');
    }

    public function show(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.show');
    }


    public function delete_single_file(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.delete_single_file');
    }

    public function delete_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.delete_suspicious_info');
    }

    public function edit_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.edit_suspicious_info');
    }

    public function update_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.update_suspicious_info');
    }

    public function update_evidence_files(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.update_evidence_files');
    }

    public function update_member(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.update_member');
    }

    public function update_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.update_step_info');
    }

    public function edit_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.edit_step_info');
    }

    public function delete_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.delete_step_info');
    }

    public function update_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.update_addmember_info');
    }

    public function edit_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.edit_addmember_info');
    }

    public function delete_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.delete_addmember_info');
    }

    public function pdf_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.pdf_suspicious_info');
    }

    public function pdf_victim_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.pdf_victim_info');
    }

    public function pdf_case_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.pdf_case_info');
    }

    public function update_feedback_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'application','application.update_feedback_info');
    }

}
