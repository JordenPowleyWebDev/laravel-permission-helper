<script>
    const USER_ROLE = "{{ Auth::user()->role->value }}";
    const ROLES = {
        SUPER_ADMIN:    "super_admin",
        ADMIN:          "admin",
        SURVEYOR:       "surveyor",
        INSTALLER:      "installer",
    }

    const PERMISSIONS = {
        user: {
            viewAny:    {{ Auth::user()->can('viewAny', App\Models\User::class) ? "true" : "false" }},
            create:     {{ Auth::user()->can('create', App\Models\User::class) ? "true" : "false" }},
        },
        userLeaveRequest: {
            viewAny:    {{ Auth::user()->can('viewAny', App\Models\UserLeaveRequest::class) ? "true" : "false" }},
            create:     {{ Auth::user()->can('create', App\Models\UserLeaveRequest::class) ? "true" : "false" }},
        },
        customer: {
            viewAny:    {{ Auth::user()->can('viewAny', App\Models\Customer::class) ? "true" : "false" }},
            create:     {{ Auth::user()->can('create', App\Models\Customer::class) ? "true" : "false" }},
        },
        site: {
            viewAny:    {{ Auth::user()->can('viewAny', App\Models\Site::class) ? "true" : "false" }},
            create:     {{ Auth::user()->can('create', App\Models\Site::class) ? "true" : "false" }},
        },
        companySetting: {
            viewAny:    {{ Auth::user()->can('viewAny', App\Models\CompanySetting::class) ? "true" : "false" }},
            create:     {{ Auth::user()->can('create', App\Models\CompanySetting::class) ? "true" : "false" }},
        },
        templateSetting: {
            viewAny:    {{ Auth::user()->can('viewAny', App\Models\TemplateSetting::class) ? "true" : "false" }},
            create:     {{ Auth::user()->can('create', App\Models\TemplateSetting::class) ? "true" : "false" }},
        },
        job: {
            viewAny:    {{ Auth::user()->can('viewAny', App\Models\Job::class) ? "true" : "false" }},
            create:     {{ Auth::user()->can('create', App\Models\Job::class) ? "true" : "false" }},
        }
        // TODO - When More Model Policies Added, Add Here
    }
    /**
     * @param permission
     * @param model
     * @returns {*}
     */
    const can = (permission, model) => {
        return PERMISSIONS[model][permission];
    }
    /**
     * @param role
     * @returns {*}
     */
    const hasRole = (role) => {
        return role === USER_ROLE;
    }
</script>