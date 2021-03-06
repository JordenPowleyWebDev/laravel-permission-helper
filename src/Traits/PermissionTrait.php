<?php

namespace JordenPowleyWebDev\LaravelPermissionHelper\Traits;

use Illuminate\Support\Facades\Auth;

trait PermissionTrait
{
    /**
     * PermissionTrait::getRoleIdAttribute();
     *
     * @return string
     */
    public function getRoleIdAttribute(): string
    {
        return $this->roles()->first()->id;
    }

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
     * PermissionTrait::getPermissionsArrayAttribute()
     *
     * @return array
     */
    public function getPermissionsArrayAttribute(): array
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