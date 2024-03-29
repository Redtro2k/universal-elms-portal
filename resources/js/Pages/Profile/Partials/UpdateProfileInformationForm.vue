<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import moment from 'moment/moment';
import { CalendarIcon,UserIcon } from '@heroicons/vue/24/solid';


const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    firstname: props.user.firstname,
    middlename: props.user.middlename,
    lastname: props.user.lastname,
    contact_number: props.user.contact_number,
    emergency_contact_number: props.user.emergency_contact_number,
    date_of_birth: props.user.date_of_birth,
    location: props.user.location,
    gender: props.user.gender,
    email: props.user.email,
    userid: props.user.userid,
    photo: null,
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    router.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div v-if="$page.props.jetstream.managesProfilePhotos" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    @change="updatePhotoPreview"
                >

                <InputLabel for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div v-show="! photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span
                        class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'"
                    />
                </div>

                <SecondaryButton class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </SecondaryButton>

                <SecondaryButton
                    v-if="user.profile_photo_path"
                    type="button"
                    class="mt-2"
                    @click.prevent="deletePhoto"
                >
                    Remove Photo
                </SecondaryButton>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div>
            <div class="col-span-6 sm:flex sm:space-x-4">
                <div v-if="$page.props.user.roles != null" v-for="role in $page.props.user.roles" :key="role">
                    <span class="inline-flex items-center rounded bg-blue-100 px-2 py-0.5 text-xs font-medium text-blue-800">{{role}}</span>
                </div>
            </div>
            <!-- First name Middle Name & Last Name -->
            <div class="col-span-6 sm:flex sm:space-x-2">
                <div class="col-span-4">
                    <InputLabel for="firstname" value="First Name" />
                    <TextInput
                        id="name"
                        v-model="form.firstname"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="firstname"
                    />
                </div>
                <div class="col-span-4">
                    <InputLabel for="middlename" value="Middle Name" />
                    <TextInput
                        id="name"
                        v-model="form.middlename"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="middlename"
                    />
                </div>
                <div class="col-span-4">
                    <InputLabel for="lastname" value="Last Name" />
                    <TextInput
                        id="name"
                        v-model="form.lastname"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="lastname"
                    />
                    <InputError :message="form.errors.lastname" class="mt-2" />
                </div>
            </div>
            <!-- Contact Number -->
            <div class="col-span-6 sm:flex sm:space-x-2">
                <div class="col-span-4">
                    <InputLabel for="contact_number" value="Phone Number" />
                    <TextInput
                        id="name"
                        v-model="form.contact_number"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="contact_number"
                    />
                </div>
                <div class="col-span-4">
                    <InputLabel for="emergency_contact_number" value="Emergency Contact Number" />
                    <TextInput
                        id="name"
                        v-model="form.emergency_contact_number"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="emergency_contact_number"
                    />
                </div>
            </div>
            <!-- Event -->
            <div class="col-span-6 sm:flex sm:space-x-4">
                <div class="col-span-4">
                    <InputLabel class="block" for="birthdate" value="Birth Date" />
                    <div class="flex text-gray-700 items-center space-x-2">
                        <CalendarIcon class="h-5 w-5"/><p class="font-semibold">{{moment(form.date_of_birth).format('MMMM D YYYY')}}</p>
                    </div>
                </div>
                <div class="col-span-4">
                    <InputLabel class="gender" for="gender" value="Gender" />
                    <div class="flex text-gray-700 items-center space-x-2">
                        <UserIcon class="h-5 w-5"/><p class="font-semibold">{{form.gender}}</p>
                    </div>
                </div>
            </div>
            <!-- location -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="location" value="Location" />
                <TextInput
                    id="location"
                    v-model="form.location"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="location"
                />
                <InputError :message="form.errors.location" class="mt-2" />
            </div>
            <!-- UserID -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="userid" value="User ID" />
                <TextInput
                    id="userid"
                    v-model="form.userid"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="userid"
                    :disable="true"
                />
                <InputError :message="form.errors.userid" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    autocomplete="username"
                />
                <InputError :message="form.errors.email" class="mt-2" />

                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                    <p class="text-sm mt-2">
                        Your email address is unverified.

                        <Link
                            :href="route('verification.send')"
                            method="post"
                            as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click.prevent="sendEmailVerification"
                        >
                            Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </div>
                </div>
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
