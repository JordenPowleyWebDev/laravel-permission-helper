<?php

namespace JordenPowleyWebDev\LaravelPermissionHelper\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

/**
 * Class Permissions
 * @package JordenPowleyWebDev\LaravelPermissionHelper\View\Components
 */
class Permissions extends Component
{
    /**
     * @var string
     */
    public string $userRole = "";

    /**
     * @var array
     */
    public array $availableRoles = [];

    /**
     * @var array|string[]
     */
    public array $permissions = [
        'viewAny',
        'create',
    ];

    /**
     * @var array
     */
    public array $constructedPermissions = [];

    /**
     * Permissions::__construct()
     */
    public function __construct()
    {
        $this->availableRoles   = config('laravel-permission-helper.roles-enum')::asJsArray();

        $permissionConfig       = config('laravel-permission-helper.model-bindings');

        if (Auth::check()) {
            $this->userRole = Auth::user()->role->value;

            foreach ($permissionConfig as $key => $binding) {
                $this->constructedPermissions[$key] = [];

                foreach ($this->permissions as $permission) {
                    $this->constructedPermissions[$key][$permission] = Auth::user()->can($permission, $binding['model']);
            }
            }
        }
    }

    /**
     * Permissions::render()
     *
     * @return \Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|\Closure|Application
    {
        return view('laravel-permission-helper::components.permissions');
    }
}