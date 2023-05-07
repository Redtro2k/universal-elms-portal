<template>
    <button type="button" @click="openModal"
      class="inline-flex items-center rounded-md border border-transparent bg-rose-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
      Create Curriculum
    </button>
  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModal" class="relative z-10">
      <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
        leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-black bg-opacity-25" />
      </TransitionChild>

      <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center">
          <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95">
            <DialogPanel
              class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
              <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                Create Curriculum
              </DialogTitle>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  A curriculum is a plan for teaching and learning that outlines goals, objectives, content, and instructional methods to be used in a course or educational program.
                </p>
                <div class="mt-4">
                  <InputLabel for="title" value="Title" />
                  <TextInput
                      id="name"
                      v-model="form.title"
                      type="text"
                      class="mt-1 block w-full"
                      autofocus
                      autocomplete="title"
                  />
                  <InputError class="mt-2" :message="form.errors.title" />
                </div>
                <div class="mt-4">
                  <InputLabel for="description" value="Description" />
                  <QuillEditor theme="snow" placeholder="Description"/>
                  <InputError class="mt-2" :message="form.errors.firstname" />
                </div>
              </div>
              <div class="mt-4">
                <button type="button"
                  class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                  @click="closeModal">
                  Got it, thanks!
                </button>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup>
import { ref } from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'
import {useForm} from '@inertiajs/vue3'
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";


const isOpen = ref(false)

function closeModal() {
  isOpen.value = false
}
function openModal() {
  isOpen.value = true
}
const form = useForm({
  title: '',
  description: null,
  program_outcomes: null,
  specialize_subjects: null,
  admission_requirement: null
})
</script>
<style>
.ql-editor{
  min-height: 5rem;
}
</style>
