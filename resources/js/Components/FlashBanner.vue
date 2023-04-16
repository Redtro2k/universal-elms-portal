<template>
    <div :class="[flashMessege ? 'bg-green-600' : 'bg-rose-600']">
      <div class="mx-auto max-w-7xl py-3 px-3 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between">
          <div class="flex w-0 flex-1 items-center">
            <span :class="[flashMessege ? 'bg-green-800': 'bg-rose-800', 'flex rounded-lg p-2']">
              <component :is="flashMessege ? CheckCircleIcon : ExclamationCircleIcon" class="h-6 w-6 text-white" aria-hidden="true" />
            </span>
            <p class="ml-3 truncate font-medium text-white">
              <span class="md:hidden">{{flashMessege ? 'Success' : 'Failed'}}</span>
              <span class="hidden md:inline">{{flashMessege ? texts.success : texts.failed}}</span>
            </p>
          </div>
          <div v-if="incButton">
            <div class="order-3 mt-2 w-full flex-shrink-0 sm:order-2 sm:mt-0 sm:w-auto">
                <a href="#" :class="[flashMessege ? 'text-green-600  hover:bg-green-50': 'text-rose-600  hover:bg-rose-50', 'flex items-center justify-center rounded-md border border-transparent bg-white px-4 py-2 text-sm font-medium shadow-sm']">Learn more</a>
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                <button type="button" :class="[flashMessege ? 'hover:bg-green-500': 'hover:bg-rose-500','-mr-1 flex rounded-md p-2  focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2']">
                <span class="sr-only">Dismiss</span>
                <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { MegaphoneIcon, ExclamationCircleIcon, CheckCircleIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import { computed } from '@vue/reactivity';
  const props = defineProps({
    texts: Object,
    incButton: {
        type: Boolean,
        default: () => false
    }
  })
  const flashMessege = computed(() => {
    return props.texts.success != null && props.texts.failed == null
  })
  </script>