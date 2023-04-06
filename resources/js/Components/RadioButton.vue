<script setup>
    const props = defineProps({
        items: Array,
        modelValue: String
    })

defineEmits(['update:modelValue'])

defineExpose({ focus: () => input.value.focus() });

</script>
<template>
    <div>
      <!-- <label class="text-base font-medium text-gray-900">Title</label>
      <p class="text-sm leading-5 text-gray-500">Description</p> -->
      <fieldset class="mt-4">
        <legend class="sr-only">Notification method</legend>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
          <div v-for="item in items" :key="item.value" class="flex items-center">
            <input :id="item.id" name="item" type="radio" :value="item.value" :checked="props.modelValue === item.value"
            @input="$emit('update:modelValue', $event.target.value)"
             class="h-4 w-4 border-gray-300 text-rose-600 focus:ring-rose-500"
             />
            <label :for="item.value" class="ml-3 block text-sm font-medium text-gray-700">{{ item.label }}</label>
          </div>
        </div>
      </fieldset>
    </div>
  </template>
