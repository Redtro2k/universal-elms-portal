<template>
    <AdminLayout :title="props.curriculum.title">
        <template #content>
            <div class="flex justify-between justify-items-center">
                <Breadcrumb :slug="props.curriculum.title"/>
            </div>
        </template>
    </AdminLayout>
</template> 
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Components/Breadcrumbs.vue';

const props = defineProps({
    curriculum: Object
})
</script>