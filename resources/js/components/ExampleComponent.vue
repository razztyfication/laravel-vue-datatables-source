<template>
    <laravel-vue-datatables
        route="/table"
        :columns.sync="columns"
    >
    </laravel-vue-datatables>
</template>

<script>
    import LaravelVueDatatables from 'laravel-vue-datatables'
    require('laravel-vue-datatables/dist/laravel-vue-datatables.css');

    export default {
        components: {
            LaravelVueDatatables
        },
        data() {
            return {
                columns: [
                    {
                        uniqid: "first_name",
                        label: "Full Name",
                        field: "first_name",
                        visible: true,
                        sortable: true,
                        sortOrder: "asc",
                        align: "center",
                        format: (val, row) => `${val} ${row.last_name}`,
                        classes: "py-2 font-bold text-blue-600",
                        headerClass: "py-4",
                    },
                    {
                        uniqid: "email",
                        label: "Email Address",
                        field: "email",
                        visible: true,
                        sortable: false,
                        sortOrder: "asc",
                        classes: "py-2",
                        headerClass: "py-4",
                    },
                    {
                        uniqid: "username",
                        label: "Username",
                        field: "username",
                        visible: true,
                        sortable: false,
                        sortOrder: "asc",
                        align: "center",
                        classes: "py-2",
                        headerClass: "py-4",
                    },
                    {
                        uniqid: "phone_number",
                        label: "Phone Number",
                        field: "phone_number",
                        sortable: false,
                        sortOrder: "asc",
                        visible: true,
                        classes: "py-2",
                        headerClass: "py-4",
                    },
                    {
                        uniqid: "address",
                        label: "Address",
                        field: "address",
                        sortable: false,
                        visible: true,
                        classes: "py-2",
                        headerClass: "py-4",
                    },
                    {
                        uniqid: "company",
                        label: "Company Name",
                        field: "company",
                        sortable: false,
                        sortOrder: "asc",
                        visible: true,
                        classes: "py-2",
                        headerClass: "py-4",
                    },
                    {
                        uniqid: "updated_at",
                        label: "Last Modified",
                        field: "updated_at",
                        visible: true,
                        align: "center",
                        sortable: false,
                        sortOrder: "asc",
                        classes: "py-2",
                        headerClass: "py-4",
                    },
                    {
                        uniqid: "actions",
                        label: "Actions",
                        field: "id",
                        visible: true,
                        align: "center",
                        classes: "py-2",
                        headerClass: "py-4",
                    },
                ],
            }
        }
    }
</script>
