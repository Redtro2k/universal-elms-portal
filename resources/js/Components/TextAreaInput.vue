<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
    disable: {
        type: Boolean,
        default: () => false,
    }
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <textarea
        ref="input"
        :class="[disable ? 'bg-gray-100' : '', 'rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm']"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :disabled="disable"
        rows="3"
    />
    <!-- <textarea id="about" name="about" rows="3" class="block w-full " /> -->

</template>
