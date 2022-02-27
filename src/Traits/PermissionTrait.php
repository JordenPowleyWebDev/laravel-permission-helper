<?php

namespace JordenPowleyWebDev\LaravelPermissionHelper\Traits;

use Illuminate\Support\Facades\Auth;

trait PermissionTrait
{
    /**
     * PermissionTrait::getRoleNameAttribute();
     *
     * @return string
     */
    public function getRoleNameAttribute(): string
    {
        return $this->roles()->first()->name;
    }

    /**
     * PermissionTrait::getRoleNameLabelAttribute();
     *
     * @return string
     */
    public function getRoleNameLabelAttribute(): string
    {
        return config('laravel-permission-helper.roles-enum')::toLabel($this->role_name);
    }

    /**
     * PermissionTrait::getPermissionsAttribute()
     *
     * @return array
     */
    public function getPermissionsAttribute(): array
    {
        $user = Auth::user();

        return [
            'view'      => $user->can('view', $this),
            'update'    => $user->can('update', $this),
            'delete'    => $user->can('delete', $this),
            'restore'   => $user->can('restore', $this),
        ];
    }
}