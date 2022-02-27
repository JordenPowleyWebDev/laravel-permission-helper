<?php

namespace JordenPowleyWebDev\LaravelPermissionHelper\Enums;

/**
 * Interface UserRolesInterface
 */
interface UserRolesInterface
{
    /**
     * UserRolesInterface::asJsArray()
     *
     * @return array
     */
    public static function asJsArray(): array;

    /**
     * UserRolesInterface::toLabel()
     *
     * @param string $template
     * @return string
     */
    public static function toLabel(string $template): string;

    /**
     * UserRolesInterface::toInputArray()
     *
     * @return array
     */
    public static function toInputArray(): array;
}