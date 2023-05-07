<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Components/Breadcrumbs.vue';
import { Link } from '@inertiajs/vue3';
import CurriculumModal from '@/Pages/Dialog/Modal.vue';

const stats = [
  { name: 'Total Subscribers', stat: '71,897' },
  { name: 'Avg. Open Rate', stat: '58.16%' },
  { name: 'Avg. Click Rate', stat: '24.57%' },
]
</script>
<template>
    <AdminLayout title="Curriculum">
        <template #content>
            <div class="flex justify-between justify-items-center">
                <Breadcrumb/>
                <CurriculumModal/>
            </div>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div v-for="item in stats" :key="item.name" class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                  <dt class="truncate text-sm font-medium text-gray-500">{{ item.name }}</dt>
                  <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ item.stat }}</dd>
                </div>
              </dl>
        </template>
    </AdminLayout>
</template>
