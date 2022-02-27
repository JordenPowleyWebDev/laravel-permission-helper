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
    private string $userRole = "";

    private array $availableRoles = [];

    private array $permissions = [];

    /**
     * Permissions::__construct()
     */
    public function __construct()
    {
        if (Auth::check()) {
            $this->userRole = Auth::user()->role->value;
        }

        dd(config('laravel-permission-helper.roles-enum'));
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