<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <slot name="logo" />
        </div>
        <div :class="[$slots.message ? '' : 'mt-6 px-6 py-4']" class="w-full sm:max-w-md bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot name="message" />
            <div :class="[$slots.message ? 'mt-6 px-6 pb-4' : '']">
                <slot/>
            </div>
        </div>
    </div>
</template>
