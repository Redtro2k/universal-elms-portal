<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Components/Breadcrumbs.vue';
import CurriculumModal from '@/Pages/Dialog/Modal.vue';
import { Menu, MenuButton, MenuItem, MenuItems, Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
import { ChevronDownIcon, FunnelIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
  curriculum: Object
})

const stats = [
  { name: 'Students', stat: '1,409' },
  { name: 'Teachers', stat: '58' },
  { name: 'Cources', stat: '254' },
]


</script>
<template>
    <AdminLayout title="Curriculum">
        <template #content>
            <div class="flex justify-between justify-items-center">
                <Breadcrumb/>
            </div>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
              <div v-for="item in stats" :key="item.name" class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">{{ item.name }}</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ item.stat }}</dd>
              </div>
            </dl>
            <!-- tables -->
            <div class="mx-2 mt-4 block lg:flex space-y-2 lg:space-x-2 justify-items-center">
              <div class="relative mt-2 rounded-md lg:w-1/2">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <!-- Heroicon name: mini/envelope -->
        
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-4 w-4 font-semibold text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                  </svg>
                </div>
                <input type="text" class="block w-full rounded-md border-gray-300 pl-10 font-inter text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Search" />
              </div>
              <CurriculumModal/>
            </div>
            <div class="mx-2 mt-2">
              <div class="flex space-x-2 w-full sm:w-1/2 lg:w-1/4 mt-2">
                <Menu as="div" class="relative inline-block text-left w-full font-inter">
                  <div>
                    <MenuButton class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                      <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400" aria-hidden="true" />
                      Actions
                    </MenuButton>
                  </div>
              
                  <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                    <MenuItems class="absolute left-0 z-10 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                      <div class="py-1">
                        <MenuItem v-slot="{ active }">
                          <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Refresh</a>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                          <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Delete All</a>
                        </MenuItem>
                      </div>
                    </MenuItems>
                  </transition>
                </Menu>
                <Popover class="relative inline-block text-left w-full font-inter">
                  <PopoverButton class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    <FunnelIcon class="-mr-1 h-5 w-5 text-gray-300" />
                    Filter
                    <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400 ui-open:rotate-180 ui-open:transform" />
                  </PopoverButton>
                  <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                  <PopoverPanel class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="grid grid-cols-1">
                      <div class="relative items-start p-2 space-y-2">
                        <div class="min-w-0 flex-1 text-sm space-x-2 items-center">
                          <input id="person-1" name="person-1" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                          <label for="person-1" class="select-none font-medium text-gray-700">Senior high</label>
                        </div>
                        <div class="min-w-0 flex-1 text-sm space-x-2 items-center">
                          <input id="person-1" name="person-1" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                          <label for="person-1" class="select-none font-medium text-gray-700">Junior High </label>
                        </div>
                        <div class="min-w-0 flex-1 text-sm space-x-2 items-center">
                          <input id="person-1" name="person-1" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                          <label for="person-1" class="select-none font-medium text-gray-700">Ternitary Programs</label>
                        </div>
                      </div>
                    </div>
                  </PopoverPanel>
                  </transition>
                </Popover>
              </div>
            </div>
            <div class="px-4 font-inter sm:px-6 lg:px-8">
              <div class="mt-2 flex flex-col">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                      <table class="min-w-full divide-gray-300">
                        <thead class="bg-gray-100">
                          <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left font-inter text-sm font-medium uppercase text-gray-700 sm:pl-6">Name</th>
                            <th scope="col" class="px-3 py-3.5 text-left font-inter text-sm font-medium uppercase text-gray-600">Title</th>
                            <th scope="col" class="px-3 py-3.5 text-left font-inter text-sm font-medium uppercase text-gray-600">Email</th>
                            <th scope="col" class="px-3 py-3.5 text-left font-inter text-sm font-medium uppercase text-gray-600">Role</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 uppercase sm:pr-6">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                          <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-600 sm:pl-6">Lindsay Walton</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Front-end Developer</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">lindsay.walton@example.com</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Member</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                              <a href="#" class="text-blue-600 hover:text-blue-900">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                  <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                                </svg>
        
                                <span class="sr-only">, Lindsay Walton</span></a
                              >
                            </td>
                          </tr>
                          <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-600 sm:pl-6">Lindsay Walton</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Front-end Developer</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">lindsay.walton@example.com</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Member</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                              <a href="#" class="text-blue-600 hover:text-blue-900">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                  <path d="M3 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM8.5 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM15.5 8.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                                </svg>
        
                                <span class="sr-only">, Lindsay Walton</span></a
                              >
                            </td>
                          </tr>
                          <!-- More people... -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
              <div class="flex flex-1 justify-between sm:hidden">
                <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
              </div>
              <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                  <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">1</span>
                    to
                    <span class="font-medium">10</span>
                    of
                    <span class="font-medium">97</span>
                    results
                  </p>
                </div>
                <div>
                  <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                      <span class="sr-only">Previous</span>
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                      </svg>
                    </a>
                    <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                    <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">1</a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                    <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                    <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                    <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-500 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                      <span class="sr-only">Next</span>
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                      </svg>
                    </a>
                  </nav>
                </div>
              </div>
            </div>
        </template>
    </AdminLayout>
</template>
