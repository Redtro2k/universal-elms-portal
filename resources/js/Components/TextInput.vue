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
    <input
        ref="input"
        :class="[disable ? 'bg-gray-100' : '', 'border-gray-300 focus:border-rose-500 focus:ring-rose-500 rounded-md shadow-sm']"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :disabled="disable"
    />
</template>
