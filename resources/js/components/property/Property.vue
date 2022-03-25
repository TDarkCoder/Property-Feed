<template>
    <el-row :gutter="20">
        <el-col :lg="5" :md="6">
            <el-card>
                <div slot="header">
                    <h5>Filter</h5>
                </div>
                <filters :price-range="priceRange" @change="applyChanges"/>
            </el-card>
        </el-col>
        <el-col :lg="19" :md="18">
            <el-card v-loading="loading">
                <div slot="header">
                    <h5>Properties</h5>
                </div>
                <property-list
                    :total="total"
                    :properties="properties"
                    :pagination="pagination"/>
            </el-card>
        </el-col>
    </el-row>
</template>

<script>
import Filters from './includes/filters';
import PropertyList from './includes/list';

export default {
    components: {
        Filters,
        PropertyList,
    },
    data: () => ({
        loading: false,
        filters: null,
        pagination: {
            page: 1,
            limit: 10,
        },
        priceRange: {
            min: 0,
            max: 100,
        },
        properties: [],
        total: 0,
    }),
    watch: {
        'pagination': {
            handler() {
                this.fetchProperties();
            },
            deep: true,
        },
    },
    mounted() {
        this.fetchProperties();
    },
    methods: {
        applyChanges(filters) {
            this.filters = {...filters};
            this.fetchProperties();
        },
        fetchProperties() {
            this.loading = true;

            const {pagination, filters} = this;

            axios.get('properties', {
                params: {
                    ...pagination,
                    ...filters,
                },
            })
                .then(({data}) => {
                    this.properties = data.data;
                    this.total = data.total;

                    this.priceRange = {
                        min: Number(data.min),
                        max: Number(data.max),
                    };
                })
                .catch(error => {
                    if (error.response.data.message) {
                        this.$message.error(error.response.data.message);
                    } else {
                        this.$message.error('Unknown server error');
                    }
                })
                .finally(() => this.loading = false)
        },
    },
}
</script>

<style scoped>
h5 {
    margin: 0;
}
</style>
