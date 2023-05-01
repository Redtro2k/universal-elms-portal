<template>
    <AppLayout title="Dashboard">
        <template #header>
            <Breadcrumb/>
        </template>
        <div class="hidden space-x-8 bg-gradient-to-t from-gray-50 to-gray-100 p-8 pt-14 md:flex">
            <img class="h-64 cursor-pointer rounded-md object-cover shadow-md transition duration-500 hover:scale-110" src="https://th.bing.com/th/id/R.82c3cc17622b17da9dd4f83257ad1216?rik=anTK7vvxqrNgug&riu=http%3a%2f%2fwww.vistadome.com%2fworcester%2fststephen_school.jpg&ehk=KbhdsMNC%2fFxTgpO4XTmlXTfmTlhaDl1o21K48UPVhW4%3d&risl=&pid=ImgRaw&r=0" alt="" />
            <div class="block space-y-3 self-center">
                <h2 class="text-4xl font-bold text-sky-500">STI College Fairview</h2>
                <div class="inline-flex items-center space-x-1 rounded-md bg-red-500 p-1 text-sm font-semibold text-slate-50 shadow-sm">
                    <MapPinIcon class="h-4 w-6"/>
                    <p>Quezon City / Manila</p>
                </div>
                <p class="leading-relaxed">STI College is a Philippine school system known for its educational programs in information technology and business. STI was founded as the Systems Technology Institute College in 1983 by four entrepreneurs: Augusto C. Lagman, Herman T.</p>
            </div>
        </div>
        <div class="px-2 py-2">
            <div class="flex justify-center py-2">
                <h2 class="text-2xl font-bold uppercase text-orange-700 antialiased">School Information</h2>
            </div>
            <div class="flex space-x-8 justify-center">
                <div class="w-full md:max-w-xl">
                    <div class="ml-4 block space-y-4 pt-2">
                        <div class="flex justify-items-center space-x-6">
                            <MapPinIcon class="h-10 rounded-full bg-orange-200 p-2 text-orange-500" />
                            <p class="mt-2 w-64 text-sm font-semibold text-slate-500">#70 Regalado Avenue, North Fairview, Quezon City, 1121 Metro Manila</p>
                        </div>
                        <div class="flex justify-items-center space-x-6">
                            <PhoneIcon class="h-10 rounded-full bg-orange-200 p-2 text-orange-500"/>
                            <p class="mt-2 w-64 text-sm font-semibold text-slate-500">8875-9249 / 8573-9962 / 8260-7231</p>
                        </div>
                        <div class="flex justify-items-center space-x-6">
                            <TagIcon class="h-10 rounded-full bg-orange-200 p-2 text-orange-500"/>
                            <p class="mt-2 w-64 text-sm font-semibold text-slate-500">401553</p>
                        </div>
                    </div>
                    <div class="mt-8">
                        <div class="flex items-center justify-between rounded-xl bg-orange-100 p-2">
                            <h1 class="text-md pl-2 font-semibold text-orange-600">Senior High School</h1>
                            <ChevronUpIcon class="h-7 font-semibold text-orange-600 hover:animate-pulse" />
                        </div>
                        <ul class="ml-4 list-disc space-y-2 px-6 py-4 text-gray-500">
                            <li>Accountancy, Business, and Management</li>
                            <li>Science, Technology, Engineering, and Mathematics</li>
                            <li>Humanities and Social Sciences</li>
                            <li>IT in Mobile App and Web Development</li>
                            <li>Tourism Operations</li>
                            <li>Culinary Arts</li>
                        </ul>
                    </div>
                    <div>
                        <div class="flex items-center justify-between rounded-xl bg-sky-100 p-2">
                          <h1 class="text-md pl-2 font-semibold text-sky-600">Senior High School</h1>
                          <ChevronDownIcon class="h-7 font-semibold text-sky-600 hover:animate-pulse" />
                        </div>
                      </div>
                      <div class="grid grid-cols-1 gap-2 px-6 py-2 md:grid-cols-3">
                        <div class="flex items-center space-x-4">
                          <UserGroupIcon class="h-12 rounded-full bg-orange-200 p-2 text-orange-500" />
                          <div>
                            <h1 class="mt-2 font-semibold text-slate-700">Course</h1>
                            <span class="text-xs font-semibold text-green-600">1300</span>
                          </div>
                        </div>
                        <div class="flex items-center space-x-4">
                        <UserGroupIcon class="h-12 rounded-full bg-orange-200 p-2 text-orange-500" />
                          <div>
                            <h1 class="mt-2 font-semibold text-slate-700">Teachers</h1>
                            <span class="text-xs font-semibold text-green-600">1300</span>
                          </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <UserGroupIcon class="h-12 rounded-full bg-orange-200 p-2 text-orange-500" />
                          <div>
                            <h1 class="mt-2 font-semibold text-slate-700">Students</h1>
                            <span class="text-xs font-semibold text-green-600">1300</span>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="hidden md:grid grid-cols-1 space-y-2">
                    <div>
                        <h1 class="py-2 text-xl font-bold text-orange-700">Recent Post</h1>
                        <div class="flex space-x-4 pb-2 justify-items-center transform transition hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">
                            <img class="h-16 w-16 rounded-sm" src="https://www.elegantthemes.com/blog/wp-content/uploads/2020/02/000-Online-Code-Editors.png" alt="">
                            <div>
                                <a href="#">
                                    <h1 class="font-bold text-slate-700 hover:text-gray-600 cursor-pointer">testing</h1>
                                    <p class="text-sm text-slate-800">this is example paragram</p>
                                </a>
                            </div>
                        </div>
                        <div class="flex space-x-4 pb-2 justify-items-center transform transition hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">
                            <img class="h-16 w-16 rounded-sm" src="https://www.elegantthemes.com/blog/wp-content/uploads/2020/02/000-Online-Code-Editors.png" alt="">
                            <div>
                                <a href="#">
                                    <h1 class="font-bold text-slate-700 hover:text-gray-600 cursor-pointer">testing</h1>
                                    <p class="text-sm text-slate-800">this is example paragram</p>
                                </a>
                            </div>
                        </div>
                        <div class="flex space-x-4 pb-2 justify-items-center transform transition hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">
                            <img class="h-16 w-16 rounded-sm" src="https://www.elegantthemes.com/blog/wp-content/uploads/2020/02/000-Online-Code-Editors.png" alt="">
                            <div>
                                <a href="#">
                                    <h1 class="font-bold text-slate-700 hover:text-gray-600 cursor-pointer">testing</h1>
                                    <p class="text-sm text-slate-800">this is example paragram</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="py-2 text-xl font-bold text-orange-700">Announcement</h1>
                        <div class="flex space-x-4 pb-2 justify-items-center transform transition hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">
                            <img class="h-16 w-16 rounded-sm" src="https://www.elegantthemes.com/blog/wp-content/uploads/2020/02/000-Online-Code-Editors.png" alt="">
                            <div>
                                <a href="#">
                                    <h1 class="font-bold text-slate-700 hover:text-gray-600 cursor-pointer">testing</h1>
                                    <p class="text-sm text-slate-800">this is example paragram</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Breadcrumb from '@/Components/Breadcrumbs.vue';
import { MapPinIcon, PhoneIcon, TagIcon, UserGroupIcon, ChevronUpIcon, ChevronDownIcon } from '@heroicons/vue/24/solid';
import TextInput from "@/Components/TextInput.vue";
import {useForm} from '@inertiajs/vue3'
</script>