<script setup>
import { defineComponent, h } from 'vue'
import moment from 'moment'
const props = defineProps({
  navigation: Object
})
const currentDate = moment();
</script>
<template>
    <footer class="bg-white">
      <div class="mx-auto max-w-7xl overflow-hidden py-20 px-6 sm:py-24 lg:px-8">
        <nav class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
          <div v-for="item in navigation" :key="item.name" class="pb-6">
            <a :href="item.href" class="text-sm leading-6 text-gray-600 hover:text-gray-900">{{ item.name }}</a>
          </div>
        </nav>
        <p class="mt-10 text-center text-xs leading-5 text-gray-500">&copy; {{ currentDate.format('YYYY') }} {{ $page.props.signed.school.school_name }}, Inc. All rights reserved.</p>
      </div>
    </footer>
  </template>
  