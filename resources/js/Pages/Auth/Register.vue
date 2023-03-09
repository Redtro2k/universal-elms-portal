<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import RadioButton from '@/Components/RadioButton.vue';
const form = useForm({
    firstname: '',
    lastname: '',
    userid: '',
    gender: '',
    gender: '',
    contact_number: '',
    emergency_contact_number: '',
    date_of_birth: '',
    location: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});
const options = [{value: 'male', label: 'Male'}, {value: 'female', label: 'Female'}, {value: 'other', label: 'Other'}]

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <!-- first name -->
            <div>
                <InputLabel for="firstname" value="First Name" />
                <TextInput
                    id="name"
                    v-model="form.firstname"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="firstname"
                />
                <InputError class="mt-2" :message="form.errors.firstname" />
            </div>
            <!-- last name -->
            <div class="mt-4">
                <InputLabel for="lastname" value="Last Name" />
                <TextInput
                    id="name"
                    v-model="form.lastname"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="lastname"
                />
                <InputError class="mt-2" :message="form.errors.lastname" />
            </div>
            <!-- userid -->
            <div class="mt-4">
                <InputLabel for="userid" value="User ID" />
                <TextInput
                    id="userid"
                    v-model="form.userid"
                    type="number"
                    class="mt-1 block w-full"
                    required
                    autocomplete="userid"
                />
                <InputError class="mt-2" :message="form.errors.userid" />
            </div>
            <!-- gender -->
            <div class="mt-4">
                <InputLabel for="gender" value="Gender" />
                <RadioButton :value="form.gender" :items="options" v-model="form.gender"/>
            </div>
            <!-- phone number -->
            <div class="mt-4">
                <InputLabel for="lastname" value="Phone Number" />
                <vue-tel-input v-model="form.contact_number" />
            </div>
            <!-- Email -->
            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <!-- Date of Birth -->
            <div class="mt-4">
                <InputLabel for="date_of_birth" value="Date Of Birth" />
                <v-date-picker class="inline-block w-full" v-model="date">
                    <template v-slot="{ inputValue, togglePopover }">
                        <div class="flex items-center">
                        <button
                        class="p-2 bg-blue-100 border border-blue-200 hover:bg-blue-200 text-blue-600 rounded-l focus:bg-blue-500 focus:text-white focus:border-blue-500 focus:outline-none"
                        @click="togglePopover()"
                        >
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        class="w-4 h-4 fill-current"
                        >
                        <path
                        d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z"
                        ></path>
                        </svg>
                        </button>
                        <input
                        :value="inputValue"
                        class="bg-white text-gray-700 w-full py-1 px-2 appearance-none border rounded-r focus:outline-none focus:border-blue-500"
                        readonly
                        />
                        </div>
                    </template>
                </v-date-picker>
            </div>
            <!-- password -->
            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <!-- password comfirmation -->
            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
