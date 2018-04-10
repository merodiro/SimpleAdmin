<?php

namespace Merodiro\SimpleRoles;

trait HasRoles
{
    public function hasRole($role)
    {
        $roles = config('simple_roles.roles');
        if (!array_key_exists($role, $roles)) {
            throw new Exception("Role doesn't exist");
        }

        return $this->role == $roles[$role];
    }

    public function setRole($role)
    {
        $roles = config('simple_roles.roles');
        if (!array_key_exists($role, $roles)) {
            throw new Exception("Role doesn't exist");
        }

        $this->role = $roles[$role];

    }
    public function removeRole()
    {
        $this->role = 0;
    }
}
