<?php

namespace JordenPowleyWebDev\LaravelPermissionHelper\Enums;

use BenSampo\Enum\Enum;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserRoles
 * @package App\Enums
 */
final class UserRoles extends Enum
{
    const SUPER_ADMIN   = 'super_admin';
    const ADMIN         = 'admin';
    const USER          = 'user';

    /**
     * UserRoles::toArray()
     *
     * @return string[]
     */
    public static function toArray(): array
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::USER,
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
                return "user";
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