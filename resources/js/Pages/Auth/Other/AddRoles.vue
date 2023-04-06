<script setup>
    import { Head, useForm } from "@inertiajs/vue3";
    import AuthenticationCard from "@/Components/AuthenticationCard.vue";
    import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import InputError from "@/Components/InputError.vue";
    import RadioButton from "@/Components/RadioButton.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";

    const props = defineProps({
        options: Array
    });
    const form = useForm({
        role: ''
    });
const submit = () => {
    
}
</script>
<template>
    <Head title="Add Role" />
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>
        <div class="mb-4 text-sm text-gray-600">
            It appears that there are no roles assigned to this account. Would you like to add the 'admin' role as a default?
        </div>
        <div class="flex items-center space-x-4 mb-4 justify-center sm:justify-start">
            <div v-if="$page.props.jetstream.managesProfilePhotos">
                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
            </div>
            <div>
                <h1 class="text-gray-700 font-medium">{{$page.props.auth.user.name}}</h1>
            </div>
        </div>
        
        <form @submit.prevent="submit">
            <div class="mt-4">
                <InputLabel for="add-role" value="Add Role" />
                <RadioButton
                    :value="form.role"
                    :items="props.options"
                    v-model="form.role"
                />
                <InputError class="mt-2" :message="form.errors.role" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Submit
                </PrimaryButton>
            </div>
        </form>
        
    </AuthenticationCard>
</template>