<template>
    <div>
        <el-table :data="properties">
            <el-table-column
                label="Name"
                min-width="130px"
                prop="name"/>
            <el-table-column
                label="# of bedrooms"
                min-width="130px"
                prop="bedrooms"/>
            <el-table-column
                label="# of bathrooms"
                min-width="130px"
                prop="bathrooms"/>
            <el-table-column
                label="# of garages"
                min-width="130px"
                prop="garages"/>
            <el-table-column
                label="# of storeys"
                min-width="130px"
                prop="storeys"/>
            <el-table-column label="Price" prop="price"/>
        </el-table>
        <div class="text-end mt-4">
            <el-pagination
                :page-size.sync="pagination.limit"
                :current-page.sync="pagination.page"
                :page-sizes="pageSizes"
                layout="sizes, prev, pager, next"
                :total="total"/>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        pagination: {
            type: Object,
            default: null,
        },
        properties: {
            type: Array,
            default() {
                return [];
            },
        },
        total: {
            type: Number,
            default: 0,
        },
    },
    data: () => ({
        pageSizes: [
            10,
            20,
            30,
            50,
            80,
            100,
        ],
    })
}
</script>
