<script setup>
import { ExclamationTriangleIcon } from '@heroicons/vue/20/solid'
const props = defineProps({
    title: String,
    description: String
})
</script>
<template>
    <div class="rounded-md bg-yellow-50 p-4">
      <div class="flex">
        <div class="flex-shrink-0">
          <ExclamationTriangleIcon class="h-5 w-5 text-yellow-400" aria-hidden="true" />
        </div>
        <div class="ml-3">
          <h3 class="text-sm font-medium text-yellow-800">{{props.title ? props.title : 'No Title'}}</h3>
          <div class="mt-2 text-sm text-yellow-700">
            <p>{{props.description ? props.description : 'No Description' }}</p>
          </div>
        </div>
      </div>
    </div>
  </template>