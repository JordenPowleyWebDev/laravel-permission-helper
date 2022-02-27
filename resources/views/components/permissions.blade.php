<script>
    const USER_ROLE     = @json($userRole);
    const ROLES         = @json($availableRoles);
    const PERMISSIONS   = @json($constructedPermissions);

    /**
     * @returns {boolean}
     */
    const authCheck = () => {
        return (!!USER_ROLE && USER_ROLE !== "");
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