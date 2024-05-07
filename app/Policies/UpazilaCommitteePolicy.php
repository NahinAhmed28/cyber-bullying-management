<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
class UpazilaCommitteePolicy
{
    use HandlesAuthorization;

    public function grand(Admin $admin)
    {
        return $result = Role::roleHasGrantPermissions($admin->role_id, 'users');
    }

    public function parent(Admin $admin)
    {
        return $result = Role::roleHasParentPermissions($admin->role_id, 'upazila_committee');
    }

    public function create(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'upazila_committee','upazila_committee.create');
    }

    public function read(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'upazila_committee','upazila_committee.read');
    }

    public function update(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'upazila_committee','upazila_committee.update');
    }

    public function delete(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'upazila_committee','upazila_committee.delete');
    }

    public function change_password(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'upazila_committee','upazila_committee.change.password');
    }
}
