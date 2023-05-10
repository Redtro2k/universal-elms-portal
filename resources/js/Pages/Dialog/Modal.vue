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
                                    A curriculum is a plan for teaching and learning that outlines goals, objectives,
                                    content, and instructional methods to be used in a course or educational program.
                                </p>
                                <form @submit.prevent="submit">
                                    <div class="mt-4">
                                        <InputLabel for="title" value="Title" />
                                        <TextInput id="name" v-model="form.title" type="text" class="mt-1 block w-full"
                                            autofocus autocomplete="title" />
                                        <InputError class="mt-2" :message="form.errors.title" />
                                    </div>
                                    <div class="mt-4">
                                        <InputLabel for="description" value="Description" class="pb-2" />
                                        <QuillEditor theme="snow" placeholder="Description" v-model:content="form.description" contentType="html"/>
                                        <InputError class="mt-2" :message="form.errors.firstname" />
                                    </div>
                                    <div class="mt-4">
                                        <InputLabel for="Programs" value="Programs" class="pb-2" />
                                        <RadioButton :value="form.programs" :items="options" v-model="form.programs" />
                                        <InputError class="mt-2" :message="form.errors.programs" />
                                    </div>
                                    <div class="mt-4">
                                        <InputLabel for="program_outcomes" value="Program Outcomes" class="pb-2" />
                                        <QuillEditor theme="snow" placeholder="Program Outcome"
                                            v-model:content="form.program_outcomes" contentType="html"/>
                                        <InputError class="mt-2" :message="form.errors.program_outcomes" />
                                    </div>
                                    <div class="mt-4">
                                        <InputLabel for="specialize_subjects" value="Specialize Subjects" class="pb-2" />
                                        <QuillEditor theme="snow" placeholder="Specialize Subjects"
                                            v-model:content="form.specialize_subjects" contentType="html"/>
                                        <InputError class="mt-2" :message="form.errors.specialize_subjects" />
                                    </div>
                                    <div class="mt-4">
                                        <InputLabel for="admission_requirements" value="Admission Requirements"
                                            class="pb-2" />
                                        <QuillEditor theme="snow" placeholder="Admission Requirements"
                                            v-model:content="form.admission_requirements" contentType="html"/>
                                        <InputError class="mt-2" :message="form.errors.admission_requirements" />
                                    </div>
                                    <div class="mt-4 mb-2">
                                        <InputLabel from="images" value="Images" />
                                        <file-pond  ref="getfile" @change="onChangeFile" :options="option"/>
                                    </div>
                                    <div class="mt-5 flex justify-between">
                                        <button type="button"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                            @click="closeModal">
                                            Close
                                        </button>
                                        <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-rose-100 px-4 py-2 text-sm font-medium text-rose-900 hover:bg-rose-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-rose-500 focus-visible:ring-offset-2">
                                            Add Programs
                                        </button>
                                    </div>
                                </form>
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
import { useForm } from '@inertiajs/vue3'
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import RadioButton from "@/Components/RadioButton.vue";

const getfile = ref(null)

const option = {
    allowMultiple: false,
    acceptedFileTypes: ['image/png', 'image/jpeg'],
    labelIdle: 'Drag & Drop your files or browse',
}

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
    programs: null,
    program_outcomes: null,
    specialize_subjects: null,
    admission_requirements: null,
    images: null
})
const options = [
    { value: 'junior_high_school', label: 'Junior High School' },
    { value: 'senior_high_school', label: 'Senior High School' },
    { value: 'ternitary_programs', label: 'Ternitary Programs' },
];

const onChangeFile = (e) => {
    form.images = e.target.files[0];
}

const submit = () => {
    form.post(route('curriculum.store'), {
        _method: 'put',
        forceFormData: true,
        preserveScroll: true
    })
}
</script>
<style>
.ql-editor {
    min-height: 5rem;
}</style>
