<?php

namespace JordenPowleyWebDev\LaravelPermissionHelper\Enums;

use BenSampo\Enum\Enum;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserRoles
 */
final class UserRoles extends Enum implements UserRolesInterface
{
    const SUPER_ADMIN   = 'super_admin';
    const ADMIN         = 'admin';
    const USER          = 'user';

    /**
     * UserRoles::asJsArray()
     *
     * @return string[]
     */
    public static function asJsArray(): array
    {
        return [
            'SUPER_ADMIN'   => self::SUPER_ADMIN,
            'ADMIN'         => self::ADMIN,
            'USER'          => self::USER,
        ];
    }

    /**
     * UserRoles::toLabel()
     *
     * @param $value
     * @return string
     */
    public static function toLabel($value): string
    {
        switch ($value) {
            case self::SUPER_ADMIN:
                return "Super Admin";
            case self::ADMIN:
                return "Admin";
            case self::USER:
                return "User";
            default:
                return $value;
        }
    }

    /**
     * UserRoles::toInputArray()
     *
     * @return array
     */
    public static function toInputArray(): array
    {
        $response = [];
        $values = self::getValues();

        $authedUser = Auth::user();

        foreach ($values as $value) {
            if (filled($authedUser) && $value === self::SUPER_ADMIN && $authedUser->role->value !== self::SUPER_ADMIN) {
                // Do not include Super Admin Role
            } else {
                $response[] = [
                    "label" => self::toLabel($value),
                    "value" => $value,
                ];
            }
        }

        return $response;
    }
}