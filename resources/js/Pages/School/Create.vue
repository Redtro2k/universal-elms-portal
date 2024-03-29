<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Breadcrumb from '@/Components/Breadcrumbs.vue';
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue'
import InputLabel from '@/Components/InputLabel.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import ListDown from '@/Components/ListDown.vue';
import InputError from '@/Components/InputError.vue';
import { psgc } from 'ph-locations';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {computed, watchEffect, ref} from 'vue'

const {
  regions,
  provinces,
  citiesMunicipalities,
} = psgc;
const cities = citiesMunicipalities.filter((ctm) => ctm.province === 'PH-BTN')
cities.forEach((ct) => console.log(ct));

const form = useForm({
    school_name: '',
    school_id: '',
    school_description: '',
    region: null,
    province: null,
    cities: null,
    school_address: ''
})
const regions_com = computed(() => {
  return regions.map(function(obj) {
    return {
      id: obj.code,
      name: obj.name
    };
  });
});
const getProvince = ref([])
const getcitiesMunicipalities = ref([])
watchEffect(() => {
  const getProvinces = provinces.filter((p) => p.region === form.region);
  const province_com = computed(() => getProvinces.map(function(obj) {
    return {
      id: obj.code,
      name: obj.name
    }
  }));
  getProvince.value = province_com.value
});
watchEffect(() => {
  const getCity = citiesMunicipalities.filter((c) => c.province === form.province);
  const cities_com = computed(() => getCity.map(function(obj){
    return {
      id: obj.code,
      name: obj.fullName
    }
  }))
  getcitiesMunicipalities.value = cities_com.value
})

const submit = () => {
  form.post(route('school.store'))
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <Breadcrumb/>
        </template>
        <div class="py-12">
          <form @submit.prevent="submit()">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="space-y-8 divide-y divide-gray-200 py-8 mx-8">
                      <div>
                        <div class="flex space-x-4 items-center">
                          <div>
                            <img :src="'../storage/Assets/icons/building.png'" class="h-16 w-16">
                          </div>
                          <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                            <p class="mt-1 text-sm text-gray-500">This school information will be displayed publicly so be careful what you share.</p>
                          </div>
                        </div>
                         
                
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                          <div class="sm:col-span-3">
                            <InputLabel for="school-name" value="School Name" />
                            <TextInput
                                id="school-name"
                                v-model="form.school_name"
                                type="text"
                                class="mt-1 block w-full"
                                autofocus
                                autocomplete="school-name"
                            />
                            <InputError class="mt-2" :message="form.errors.school_name" />
                          </div>
                          <div class="sm:col-span-3">
                            <InputLabel for="school-id" value="School ID" />
                            <TextInput
                                id="school-id"
                                v-model="form.school_id"
                                type="text"
                                class="mt-1 block w-full"
                                autofocus
                                autocomplete="school-name"
                            />
                            <InputError class="mt-2" :message="form.errors.school_id" />
                            <p class="mt-2 text-sm text-gray-500">Note: This ID will apply to all students, teachers, and staff.</p>
                          </div>
                          <div class="sm:col-span-6">
                            <InputLabel for="school-description" value="School Description" />
                            <TextAreaInput
                              id="school-description"
                              v-model="form.school_description"
                              type="text"
                              class="mt-1 block w-full"
                              autofocus
                              autocomplete="school-description"
                            />
                            <InputError class="mt-2" :message="form.errors.school_description" />
                            <p class="mt-2 text-sm text-gray-500">Write a few sentences about this school.</p>
                          </div>
                        </div>
                      </div>
                      <div class="pt-8">
                        <div>
                          <h3 class="text-lg font-medium leading-6 text-gray-900">School Locations</h3>
                          <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can receive mail and find out its location.</p>
                        </div>
                        <InputError class="mt-2" :message="form.errors.region" />
                        <InputError class="mt-2" :message="form.errors.province" />
                        <InputError class="mt-2" :message="form.errors.cities" />
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                          <div class="sm:col-span-2">
                            <ListDown label="Region" v-model="form.region" :options="regions_com"/>
                          </div>
                          <div class="sm:col-span-2">
                            <ListDown label="Province" v-if="getProvince.length" v-model="form.province" :options="getProvince"/>
                          </div>
                          <div class="sm:col-span-2">
                            <ListDown label="City" v-if="getcitiesMunicipalities.length" v-model="form.cities" :options="getcitiesMunicipalities"/>
                          </div>
                          <div class="sm:col-span-6">
                            <InputLabel for="school-address" value="School Address" />
                            <TextInput
                              id="school-address"
                              v-model="form.school_address"
                              type="text"
                              class="mt-1 block w-full"
                              autofocus
                              autocomplete="school-address"
                            />
                            <InputError class="mt-2" :message="form.errors.school_address" />
                          </div>
                        </div>
                        
                      </div>      
                      <div class="pt-8">
                        <div class="mt-6">
                        </div>
                      </div>
                  </div>              
                  <div class="py-5 mx-6">
                    <div class="flex justify-end">
                      <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Create
                      </PrimaryButton>
                    </div>
                  </div>
              </div>
            </div>
          </form>
            
        </div>
    </AppLayout>
</template>
