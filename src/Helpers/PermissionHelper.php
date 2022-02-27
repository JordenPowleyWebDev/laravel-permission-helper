<?php

namespace JordenPowleyWebDev\LaravelPermissionHelper\Helpers;

/**
 * Class PermissionHelper
 */
class PermissionHelper
{
    /**
     * PermissionHelper::authBinding()
     *
     * @return array
     */
    public static function authBinding(): array
    {
        $processed = [];

        foreach (config('laravel-permission-helper.model-bindings') as $binding) {
            $processed[$binding['model']] = $binding['policy'];
        }

        return $processed;
    }
}