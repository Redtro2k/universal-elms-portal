<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Breadcrumb from '@/Components/Breadcrumbs.vue';
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue'
import InputLabel from '@/Components/InputLabel.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import ListDown from '@/Components/ListDown.vue';

import { psgc } from 'ph-locations';

import {computed, watchEffect, ref} from 'vue'

const {
  regions,
  provinces,
  citiesMunicipalities,
} = psgc;
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
const form = useForm({
    school_name: '',
    school_id: '',
    school_description: '',
    region: null,
    province: null
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
watchEffect(() => {
  const getProvinces = provinces.filter((p) => p.region === form.region);
  const province_com = computed(() => getProvinces.map(function(obj) {
    return {
      id: obj.code,
      name: obj.name
    }
  }));
  getProvince.value = province_com.value
  console.log(getProvince.value)
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <Breadcrumb/>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="space-y-8 divide-y divide-gray-200 py-8 mx-8">
                        <div>
                          <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                            <p class="mt-1 text-sm text-gray-500">This school information will be displayed publicly so be careful what you share.</p>
                          </div>
                  
                          <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                              <InputLabel for="school-name" value="School Name" />
                              <TextInput
                                  id="school-name"
                                  v-model="form.school_name"
                                  type="text"
                                  class="mt-1 block w-full"
                                  required
                                  autofocus
                                  autocomplete="school-name"
                              />
                            </div>
                            <div class="sm:col-span-3">
                              <InputLabel for="school-id" value="School ID" />
                              <TextInput
                                  id="school-id"
                                  v-model="form.school_id"
                                  type="text"
                                  class="mt-1 block w-full"
                                  required
                                  autofocus
                                  autocomplete="school-name"
                              />
                              <p class="mt-2 text-sm text-gray-500">Note: This ID will apply to all students, teachers, and staff.</p>
                            </div>
                            <div class="sm:col-span-6">
                              <InputLabel for="school-description" value="School Description" />
                              <TextAreaInput
                                id="school-description"
                                v-model="form.school_description"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="school-description"
                              />
                              <p class="mt-2 text-sm text-gray-500">Write a few sentences about this school.</p>
                            </div>
                          </div>
                        </div>
                  
                        <div class="pt-8">
                          <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">School Locations</h3>
                            <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can receive mail and find out its location.</p>
                          </div>
                          <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                  
                            <div class="sm:col-span-2">
                              <ListDown label="Region" v-model="form.region" :options="regions_com"/>
                            </div>
                            <div class="sm:col-span-2">
                              <ListDown label="Province" v-if="getProvince.length" v-model="form.province" :options="getProvince"/>
                            </div>
                  
                            <div class="sm:col-span-6">
                              <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
                              <div class="mt-1">
                                <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                              </div>
                            </div>
                  
                            <div class="sm:col-span-2">
                              <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                              <div class="mt-1">
                                <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                              </div>
                            </div>
                  
                            <div class="sm:col-span-2">
                              <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                              <div class="mt-1">
                                <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                              </div>
                            </div>
                  
                            <div class="sm:col-span-2">
                              <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                              <div class="mt-1">
                                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                              </div>
                            </div>
                          </div>
                        </div>
                  
                        <div class="pt-8">
                          <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Notifications</h3>
                            <p class="mt-1 text-sm text-gray-500">We'll always let you know about important changes, but you pick what else you want to hear about.</p>
                          </div>
                          <div class="mt-6">
                            <fieldset>
                              <legend class="sr-only">By Email</legend>
                              <div class="text-base font-medium text-gray-900" aria-hidden="true">By Email</div>
                              <div class="mt-4 space-y-4">
                                <div class="relative flex items-start">
                                  <div class="flex h-5 items-center">
                                    <input id="comments" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                  </div>
                                  <div class="ml-3 text-sm">
                                    <label for="comments" class="font-medium text-gray-700">Comments</label>
                                    <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                  </div>
                                </div>
                                <div class="relative flex items-start">
                                  <div class="flex h-5 items-center">
                                    <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                  </div>
                                  <div class="ml-3 text-sm">
                                    <label for="candidates" class="font-medium text-gray-700">Candidates</label>
                                    <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                                  </div>
                                </div>
                                <div class="relative flex items-start">
                                  <div class="flex h-5 items-center">
                                    <input id="offers" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                  </div>
                                  <div class="ml-3 text-sm">
                                    <label for="offers" class="font-medium text-gray-700">Offers</label>
                                    <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                                  </div>
                                </div>
                              </div>
                            </fieldset>
                            <fieldset class="mt-6">
                              <legend class="contents text-base font-medium text-gray-900">Push Notifications</legend>
                              <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p>
                              <div class="mt-4 space-y-4">
                                <div class="flex items-center">
                                  <input id="push-everything" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                  <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700">Everything</label>
                                </div>
                                <div class="flex items-center">
                                  <input id="push-email" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                  <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700">Same as email</label>
                                </div>
                                <div class="flex items-center">
                                  <input id="push-nothing" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                  <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700">No push notifications</label>
                                </div>
                              </div>
                            </fieldset>
                          </div>
                        </div>
                      </div>
                  
                      <div class="py-5 mx-6">
                        <div class="flex justify-end">
                          <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                          <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
