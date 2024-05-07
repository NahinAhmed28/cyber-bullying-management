<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
class OfficeDesignationPolicy
{
    use HandlesAuthorization;


    public function grand(Admin $admin)
    {
        return $result = Role::roleHasGrantPermissions($admin->role_id, 'master');
    }

    public function parent(Admin $admin)
    {
        return $result = Role::roleHasParentPermissions($admin->role_id, 'office_designation');
    }

    public function create(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'office_designation','office_designation.create');
    }

    public function read(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'office_designation','office_designation.read');
    }

    public function update(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'office_designation','office_designation.update');
    }

    public function delete(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'office_designation','office_designation.delete');
    }

}
