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
                    uniqid: 'carlicense',
                    label: 'Registration Number',
                    field: 'carlicense',
                    visible: true,
                    sortable: true,
                    sortOrder: 'asc',
                    align: 'center',
                    classes: 'py-2 font-bold text-blue-600',
                    headerClass: 'py-4',
                    },
                    {
                    uniqid: 'terid',
                    label: 'Device ID',
                    field: 'terid',
                    visible: true,
                    sortable: true,
                    sortOrder: 'asc',
                    align: 'center',
                    classes: 'py-2',
                    headerClass: 'py-4',
                    },
                    {
                    uniqid: 'registerip',
                    label: 'IP Address',
                    field: 'registerip',
                    visible: true,
                    align: 'center',
                    format: (val, row) => `IPADDRESS UNTUK ID ${row.id}: ${val}:${row.registerport}`,
                    classes: 'py-2',
                    headerClass: 'py-4',
                    },
                    {
                    uniqid: 'transmitip',
                    label: 'IP Address',
                    field: (row) => row.transmitip,
                    visible: true,
                    align: 'center',
                    // format: (val, row) => `${val}:${row.transmitport}`,
                    classes: 'py-2',
                    headerClass: 'py-4',
                    },
                    {
                    uniqid: 'state',
                    label: 'Device State',
                    field: 'state',
                    visible: true,
                    align: 'center',
                    classes: 'py-2',
                    headerClass: 'py-4',
                    },
                    {
                    uniqid: 'updated_at',
                    label: 'Last Modified',
                    field: 'updated_at',
                    visible: true,
                    align: 'center',
                    classes: 'py-2',
                    headerClass: 'py-4',
                    },
                    {
                    uniqid: 'actions',
                    label: 'Actions',
                    field: 'id',
                    visible: true,
                    align: 'center',
                    classes: 'py-2',
                    headerClass: 'py-4',
                    }
                ]
            }
        }
    }
</script>
