<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
class CasependingPolicy
{
    use HandlesAuthorization;

    public function grand(Admin $admin)
    {
        return $result = Role::roleHasGrantPermissions($admin->role_id, 'cases');
    }

    public function parent(Admin $admin)
    {
        return $result = Role::roleHasParentPermissions($admin->role_id, 'casepending');
    }

    public function create(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.create');
    }

    public function read(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.read');
    }

    public function update(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.update');
    }

    public function delete(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.delete');
    }

    public function show(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.show');
    }


    public function delete_single_file(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.delete_single_file');
    }

    public function delete_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.delete_suspicious_info');
    }

    public function edit_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.edit_suspicious_info');
    }

    public function update_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.update_suspicious_info');
    }

    public function update_evidence_files(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.update_evidence_files');
    }

    public function update_member(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.update_member');
    }

    public function update_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.update_step_info');
    }

    public function edit_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.edit_step_info');
    }

    public function delete_step_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.delete_step_info');
    }

    public function update_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.update_addmember_info');
    }

    public function edit_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.edit_addmember_info');
    }

    public function delete_addmember_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.delete_addmember_info');
    }

    public function pdf_suspicious_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.pdf_suspicious_info');
    }

    public function pdf_victim_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.pdf_victim_info');
    }

    public function pdf_case_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.pdf_case_info');
    }

    public function update_feedback_info(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'casepending','casepending.update_feedback_info');
    }

}
