<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
class UserPolicy
{
    use HandlesAuthorization;


    public function grand(Admin $admin)
    {
        return $result = Role::roleHasGrantPermissions($admin->role_id, 'users');
    }

    public function parent(Admin $admin)
    {
        return $result = Role::roleHasParentPermissions($admin->role_id, 'user');
    }

    public function create(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'user','user.create');
    }

    public function read(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'user','user.read');
    }

    public function view(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'user','user.view');
    }

    public function print(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'user','user.print');
    }

    public function search(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'user','user.search');
    }

    public function update(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'user','user.update');
    }

    public function delete(Admin $admin)
    {
        return $result = Role::roleHasChildPermissions($admin->role_id,'user','user.delete');
    }
}
