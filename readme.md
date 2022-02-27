# laravel-permission-helper
A  basic library for backend & frontend permission checks.

## Publishing
Blade views, JS components, SCSS files and the config can be published from this package
using the following syntax:
`php artisan vendor:publish --provider="JordenPowleyWebDev\LaravelPermissionHelper\LaravelPermissionHelperServiceProvider" --tag="TAG"`

`TAG` can be replaced with the following tags to publish the corresponding files.

| Tag        | Details                                                                        |
|------------|--------------------------------------------------------------------------------|
| config     | Publishes the related config file                                              |
| enums      | Publishes the related Enum files                                               |
| views      | Publishes the Blade views files to 'resources/vendor/laravel-components/views' |

## Setup
Initially export the config using the following command:
`php artisan vendor:publish --provider="JordenPowleyWebDev\LaravelPermissionHelper\LaravelPermissionHelperServiceProvider" --tag="config"`

Adjust the `roles-enum` so that it points to a Role Enum specific to your application.
This Enum should implement the `UserRolesInterface` provided.

The `model-bindings` are all model - policy bindings that are authed by your application.

For consistency you should use the `PermissionHelper::authBinding()` within your AuthServiceProvider.
```php
public function policies(): array
{
    return array_merge(PermissionHelper::authBinding(), [
        // Include any extra model bindings here
    ]);
}
```

## Permission Component
The frontend permission component can be included in layouts using:
`<x-laravel-permission-helper-permissions />`

## JS Frontend Helpers
You can use the following commands within your frontend JS.

| Function                                     | Description                                                           |
|----------------------------------------------|-----------------------------------------------------------------------|
| `authCheck(): bool`                          | Checks if the User has been logged in.                                |
| `can(string permission, string model): bool` | Checks if the User has the supplied permission on the supplied model. |
| `hasRole(): bool`                            | Checks if the User has the supplied role.                             |
