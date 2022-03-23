<template>
    <el-form label-position="top" size="mini">
        <el-form-item label="Property name">
            <el-input v-model="filters.name"/>
        </el-form-item>
        <el-form-item label="# of bedrooms">
            <el-input
                type="number"
                :step="1"
                :min="1"
                v-model="filters.bedrooms"/>
        </el-form-item>
        <el-form-item label="# of bathrooms">
            <el-input
                type="number"
                :step="1"
                :min="1"
                v-model="filters.bathrooms"/>
        </el-form-item>
        <el-form-item label="# of storeys">
            <el-input
                type="number"
                :step="1"
                :min="1"
                v-model="filters.storeys"/>
        </el-form-item>
        <el-form-item label="# of garages">
            <el-input
                type="number"
                :step="1"
                :min="1"
                v-model="filters.garages"/>
        </el-form-item>
        <el-form-item label="Price range">
            <el-slider
                :min="priceRange.min"
                :max="priceRange.max"
                range
                v-model="filters.priceRange"/>
        </el-form-item>
        <el-divider/>
        <div class="d-flex justify-content-between">
            <el-button
                type="default"
                size="small"
                @click="applyChanges(true)">
                Reset
            </el-button>
            <el-button
                type="primary"
                size="small"
                @click="applyChanges()">
                Apply
            </el-button>
        </div>
    </el-form>
</template>

<script>
let initFilters = {
    name: '',
    bedrooms: null,
    bathrooms: null,
    garages: null,
    storeys: null,
};

export default {
    props: {
        priceRange: {
            type: Object,
            default: null,
        },
    },
    watch: {
        priceRange(value) {
            const priceRange = this.filters.priceRange;

            if (priceRange[0] === 0 && priceRange[1] === 100) {
                this.filters.priceRange = [value.min, value.max];
            }
        },
    },
    data() {
        return {
            filters: {...initFilters},
        };
    },
    methods: {
        applyChanges(reset = false) {
            if (reset) {
                this.filters = {...initFilters};
            }

            this.$emit('change', this.filters);
        },
    },
}
</script>
