<script setup>
    import { Head, router } from "@inertiajs/vue3";
    import AuthenticationCard from "@/Components/AuthenticationCard.vue";
    import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
    import Alert from '@/Components/AlertWithDescription.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    const logout = () => {
    router.post(route('logout'));
};
</script>
<template>
    <Head title="Add Role" />
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>
        <!-- alertbox -->
        <template #message>
            <Alert title="Your Account Will Process" description="please wait for response on the admin."/>
        </template>
        <div class="flex items-center space-x-4 mb-4 justify-center sm:justify-start">
            <div v-if="$page.props.jetstream.managesProfilePhotos">
                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
            </div>
            <div>
                <h1 class="text-gray-700 font-medium">{{$page.props.auth.user.name}}</h1>
            </div>
        </div>
        <!-- loading w/ animation -->
        <div class="flex justify-center py-2">
            <svg class="h-16 w-16 animate-spin" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#e11d48"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.0001 12C20.0001 13.3811 19.6425 14.7386 18.9623 15.9405C18.282 17.1424 17.3022 18.1477 16.1182 18.8587C14.9341 19.5696 13.5862 19.9619 12.2056 19.9974C10.825 20.0328 9.45873 19.7103 8.23975 19.0612" stroke="#e11d48" stroke-width="3.55556" stroke-linecap="round"></path> </g></svg>
        </div>
        <!-- desciption -->
        <div class="mb-4 text-sm text-gray-600">
            We would like to inform you that your account is currently being processed and will undergo examination by our administration team. Please be advised that your account will be updated accordingly. Kindly wait for further notification and thank you for your patience.
        </div>
        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <form method="POST" class="ml-4" @submit.prevent="logout">
                <PrimaryButton as="button">
                    Log Out
                </PrimaryButton>
            </form>
        </div>
    </AuthenticationCard>
</template>