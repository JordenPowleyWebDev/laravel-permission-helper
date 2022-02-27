<script>
    const USER_ROLE     = @json($userRole);
    const ROLES         = @json($availableRoles);
    const PERMISSIONS   = @json($constructedPermissions);

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