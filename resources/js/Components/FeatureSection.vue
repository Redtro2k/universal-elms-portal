<template>
    <div class="bg-white py-24 sm:py-32">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
          <h2 class="text-base font-semibold leading-7 text-rose-600">Setup Faster</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need for your portal app</p>
          <p class="mt-6 text-lg leading-8 text-gray-600">Our comprehensive portal app package includes all the necessary features and tools to create a seamless and user-friendly experience for your users. From customizable interfaces to secure login and data management, our solution has got you covered.</p>
        </div>
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
          <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
            <div v-for="feature in features" :key="feature.name" class="relative pl-16">
              <dt class="text-base font-semibold leading-7 text-gray-900">
                <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-rose-600">
                  <component :is="feature.icon" class="h-6 w-6 text-white" aria-hidden="true" />
                </div>
                {{ feature.name }}
              </dt>
              <dd class="mt-2 text-base leading-7 text-gray-600">{{ feature.description }}</dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ArrowPathIcon, CloudArrowUpIcon, FingerPrintIcon, BookOpenIcon } from '@heroicons/vue/24/outline'
  
  const features = [
    {
      name: 'Easy to Access',
      description:
        'ELMS solution is user-friendly and accessible with customizable interface, responsive design, multi-language support, and accessibility features such as screen readers and keyboard navigation.',
      icon: CloudArrowUpIcon,
    },
    {
      name: 'Security is a top priority',
      description:
        'Our ELMS solution prioritizes security with encryption, authentication, secure login, access control, backups, and regular security audits to protect data and ensure authorized access.',
      icon: FingerPrintIcon,
    },
    {
        name: 'Course creation & management',
        description:
        "simplifies instructor's task of setting up and managing courses, while enabling students to access course materials, complete assignments, and track progress all in one place.",
        icon: BookOpenIcon,
    }
  ]
  </script>