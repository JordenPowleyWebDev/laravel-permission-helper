<?php

namespace JordenPowleyWebDev\LaravelPermissionHelper\Traits;

use Illuminate\Support\Facades\Auth;

trait PermissionTrait
{
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