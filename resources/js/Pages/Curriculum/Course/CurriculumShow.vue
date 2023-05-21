<template>
    <AdminLayout :title="props.curriculum.title">
        <template #content>
            <div class="flex justify-between justify-items-center">
                <Breadcrumb :slug="props.curriculum.title"/>
                
            </div>
            <div class="relative py-16 sm:py-24">
                <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-2 lg:items-start lg:gap-24 lg:px-8">
                  <div class="relative sm:py-16 lg:py-0">
                    <div aria-hidden="true" class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
                      <div class="absolute inset-y-0 right-1/2 w-full rounded-r-3xl bg-gray-50 lg:right-72" />
                      <svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12" width="404" height="392" fill="none" viewBox="0 0 404 392">
                        <defs>
                          <pattern id="02f20b47-fd69-4224-a62a-4c9de5c763f7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                          </pattern>
                        </defs>
                        <rect width="404" height="392" fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)" />
                      </svg>
                    </div>
                    <div class="relative mx-auto max-w-md px-6 sm:max-w-3xl lg:max-w-none lg:px-0 lg:py-20">
                      <!-- Testimonial card-->
                      <div class="relative overflow-hidden rounded-2xl pt-64 pb-10 shadow-xl">
                        <img class="absolute inset-0 h-full w-full object-cover" :src="props.curriculum.picture" alt="" />
                        <div class="absolute inset-0 bg-blue-200 mix-blend-multiply" />
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-500 via-blue-300 opacity-90" />
                        <div class="relative px-8">
                          <blockquote class="mt-8">
                            <div class="relative text-lg font-medium text-white md:flex-grow">
                              <p class="relative">{{props.curriculum.excerpt}}</p>
                            </div>
            
                            <footer class="mt-4">
                              <p class="text-base font-semibold text-indigo-200">{{props.curriculum.label_program}}</p>
                            </footer>
                          </blockquote>
                        </div>
                      </div>
                      <div class="custom-paragraph mt-6" v-html="props.curriculum.admission_requirements"></div>
                    </div>
                  </div>
            
                  <div class="relative mx-auto max-w-md px-6 sm:max-w-3xl lg:px-0">
                    <!-- Content area -->
                    <div class="pt-12 sm:pt-16 lg:pt-20">
                      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{props.curriculum.title}}</h2>
                      <div class="mt-6 space-y-6 text-gray-500">
                        <div class="custom-paragraph" v-html="props.curriculum.description">
                        </div>
                      </div>
                      <h4 class="font-semibold mt-4">Program Outcomes</h4>
                      <div class="ml-6 custom-list" v-html="props.curriculum.program_outcomes"></div>
                      <h4 class="font-semibold mt-4">Specialize Subjects</h4>
                      <div class="ml-6 custom-list" v-html="props.curriculum.specialize_subjects"></div>
                    </div>
            
                    <!-- Stats section -->
                    <div class="mt-10">
                      <div class="mt-10 text-blue-600 flex items-center space-x-2">
                        <ArrowUturnLeftIcon class="w-4 h-4 font-semibold"/>
                        <Link :href="route('curriculum.index')" class="text-base font-medium">
                          Back
                        </Link>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </template>
    </AdminLayout>
</template> 
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Components/Breadcrumbs.vue';
import {ArrowUturnLeftIcon} from '@heroicons/vue/20/solid'
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    curriculum: Object
})
</script>
<style>
.custom-paragraph p{
  font-size: 1rem;
  line-height: 1.5rem; 
  line-height: 1.75rem; 
}
.custom-list ul{
  list-style-type: disc;
  font-size: 0.875rem;
  line-height: 1.25rem; 
  color: #6B7280;  
}
.custom-list ul li{
  margin-top: 0.25rem; 
}
.custom-paragraph p{
  color: #6B7280;
  font-size: 1rem;
  line-height: 1.5rem; 
  line-height: 1.75rem; 
}
.custom-paragraph ul li{
  list-style-type: disc;
  margin-left: 1.5rem;  
  font-size: 0.875rem;
  line-height: 1.25rem; 
  color: #6B7280;
}
</style>