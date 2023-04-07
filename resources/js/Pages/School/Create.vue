<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Breadcrumb from '@/Components/Breadcrumbs.vue';
// import { regions, provinces, citiesMunicipalities } from 'ph-locations';

// const cities = citiesMunicipalities.filter((ctm) => ctm.province === 'PH-BTN')
// cities.forEach((ct) => console.log(ct))

// const getProvince = provinces.filter((province) => province.region === 'PH-02');
// getProvince.forEach((p) => {
//     console.log(p)
// })


// regions.forEach((region) => {
//     console.log(`${region.code}, ${region.name}`)
//     const regionProvinces = provinces.filter((province) => province.region === region.code);
    
//     regionProvinces.forEach((province) => {
//     console.log(`- ${province.name}`);
//   });
// })
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <Breadcrumb/>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                </div>
            </div>
        </div>
    </AppLayout>
</template>
