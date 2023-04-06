<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import RadioButton from "@/Components/RadioButton.vue";
import { CalendarIcon } from "@heroicons/vue/24/solid";
const form = useForm({
    firstname: "",
    middlename: "",
    lastname: "",
    userid: "",
    gender: "",
    contact_number: "",
    emergency_contact: "",
    date_of_birth: "",
    location: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});
const options = [
    { value: "male", label: "Male" },
    { value: "female", label: "Female" },
    { value: "other", label: "Other" },
];

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
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
                    autofocus
                    autocomplete="firstname"
                />
                <InputError class="mt-2" :message="form.errors.firstname" />
            </div>
            <!-- middlename -->
            <div>
                <InputLabel for="middlename" value="Middle Name" />
                <TextInput
                    id="name"
                    v-model="form.middlename"
                    type="text"
                    class="mt-1 block w-full"
                    autofocus
                    autocomplete="middlename"
                />
                <InputError class="mt-2" :message="form.errors.middlename" />
            </div>
            <!-- last name -->
            <div class="mt-4">
                <InputLabel for="lastname" value="Last Name" />
                <TextInput
                    id="name"
                    v-model="form.lastname"
                    type="text"
                    class="mt-1 block w-full"
                    autofocus
                    autocomplete="lastname"
                />
                <InputError class="mt-2" :message="form.errors.lastname" />
            </div>
            <!-- location -->
            <div>
                <InputLabel for="lastname" value="Last Name" />
                <TextInput
                    id="name"
                    v-model="form.location"
                    type="text"
                    class="mt-1 block w-full"
                    autofocus
                    autocomplete="Location"
                />
                <InputError class="mt-2" :message="form.errors.location" />
            </div>
            <!-- userid -->
            <div class="mt-4">
                <InputLabel for="userid" value="User ID" />
                <TextInput
                    id="userid"
                    v-model="form.userid"
                    type="number"
                    class="mt-1 block w-full"
                    autocomplete="userid"
                />
                <InputError class="mt-2" :message="form.errors.userid" />
            </div>
            <!-- gender -->
            <div class="mt-4">
                <InputLabel for="gender" value="Gender" />
                <RadioButton
                    :value="form.gender"
                    :items="options"
                    v-model="form.gender"
                />
                <InputError class="mt-2" :message="form.errors.gender" />
            </div>
            <!-- phone number -->
            <div class="mt-4">
                <InputLabel for="lastname" value="Phone Number" />
                <vue-tel-input v-model="form.contact_number" />
                <InputError class="mt-2" :message="form.errors.contact_number" />
            </div>
            <!-- Emergency Contact -->
            <div class="mt-4">
                <InputLabel for="emergency_contact" value="Emergency Contact" />
                <vue-tel-input v-model="form.emergency_contact" />
                <InputError class="mt-2" :message="form.errors.emergency_contact" />
            </div>
            <!-- Email -->
            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <!-- Date of Birth -->
            <div class="mt-4">
                <InputLabel for="date_of_birth" value="Date Of Birth" />
                <v-date-picker
                    class="inline-block w-full"
                    v-model="form.date_of_birth"
                >
                    <template v-slot="{ inputValue, togglePopover }">
                        <div class="flex items-center">
                            <button
                                type="button"
                                class="p-2 bg-rose-100 border border-rose-200 hover:bg-rose-200 text-rose-600 rounded-l focus:bg-rose-500 focus:text-white focus:border-rose-500 focus:outline-none"
                                @click="togglePopover()"
                            >
                                <CalendarIcon class="h-4 w-4 text-gray-700" />
                            </button>
                            <input
                                :value="inputValue"
                                class="bg-white text-gray-700 w-full py-1 px-2 appearance-none border rounded-r focus:outline-none focus:border-rose-500"
                                readonly
                            />
                        </div>
                    </template>
                </v-date-picker>
                <InputError class="mt-2" :message="form.errors.date_of_birth" />
            </div>
            <!-- password -->
            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <!-- password comfirmation -->
            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />
                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>
            <!-- policy -->
            <div
                v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
                class="mt-4"
            >
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox
                            id="terms"
                            v-model:checked="form.terms"
                            name="terms"
                            required
                        />

                        <div class="ml-2">
                            I agree to the
                            <a
                                target="_blank"
                                :href="route('terms.show')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >Terms of Service</a
                            >
                            and
                            <a
                                target="_blank"
                                :href="route('policy.show')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >Privacy Policy</a
                            >
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>
            <!-- links -->
            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"
                >
                    Already registered?
                </Link>
                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
