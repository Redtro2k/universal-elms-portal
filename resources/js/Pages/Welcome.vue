<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Dialog, DialogPanel } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { ref, computed } from 'vue'
import ApplicationMark from '@/Components/ApplicationMark.vue'
import Footer from '@/Components/Footer.vue'
import FeatureSection from '@/Components/FeatureSection.vue';


const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    schools: Object
});
const user = computed(() => usePage().props.auth.user)

let navigation = [
  { name: `About ${props.schools.school_name}`, href: '#' }, // under the announcement, blogs, history or brief
  { name: 'School', href: '#' }, //info of the school, programs
]

if(user.value != null){
    navigation.push({ name: 'Dashboard', href: 'dashboard' })

}else{
    if(props.canLogin){
        navigation.push({ name: 'Login', href: 'login' })
    }
    if(props.canRegister){
        navigation.push({ name: 'Register', href: 'register' })
    }
}

const mobileMenuOpen = ref(false)

</script>

<template>
<Head title="Welcome" />
  <div class="relative bg-white">
    <div class="mx-auto max-w-7xl">
      <div class="relative z-10 lg:w-full lg:max-w-2xl">
        <svg class="absolute inset-y-0 right-8 hidden h-full w-80 translate-x-1/2 transform fill-white lg:block" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          <polygon points="0,0 90,0 50,100 0,100" />
        </svg>
        <div class="relative px-6 pt-6 lg:pl-8 lg:pr-0">
          <nav class="flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <Link href="#" class="-m-1.5 p-1.5">
              <span class="sr-only">{{props.schools.school_name}}</span>
              <ApplicationMark class="h-10 w-auto"/>
            </Link>
            <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 lg:hidden" @click="mobileMenuOpen = true">
              <span class="sr-only">Open main menu</span>
              <Bars3Icon class="h-6 w-6" aria-hidden="true" />
            </button>
            <div class="hidden lg:ml-12 lg:block lg:space-x-14">
              <Link v-for="item in navigation" :key="item.name" :href="item.href" class="text-sm font-semibold leading-6 text-gray-900">{{ item.name }}</Link>
            </div>
          </nav>
          <Dialog as="div" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
            <DialogPanel class="fixed inset-0 z-10 overflow-y-auto bg-white px-6 py-6 lg:hidden">
              <div class="flex flex-row-reverse items-center justify-between">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
                  <span class="sr-only">Close menu</span>
                  <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                </button>
                <Link href="#" class="-m-1.5 p-1.5">
                  <span class="sr-only">{{props.schools.school_name}}</span>
                  <ApplicationMark class="h-10"/>
                </Link>
              </div>
              <div class="mt-6 space-y-2">
                <a v-for="item in navigation" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">{{ item.name }}</a>
              </div>
            </DialogPanel>
          </Dialog>
        </div>
        <div class="relative py-32 px-6 sm:py-40 lg:py-56 lg:px-8 lg:pr-0">
          <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-xl">
            <div class="hidden sm:mb-10 sm:flex">
              <div class="relative rounded-full py-1 px-3 text-sm leading-6 text-gray-500 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                Anim aute id magna aliqua ad ad non deserunt sunt. <a href="#" class="whitespace-nowrap font-semibold text-rose-600"><span class="absolute inset-0" aria-hidden="true" />Read more <span aria-hidden="true">&rarr;</span></a>
              </div>
            </div>
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{$page.props.signed.school.school_name}}</h1>
            <p class="mt-6 text-lg leading-8 text-gray-600">{{$page.props.signed.school.school_description}}</p>
            <div class="mt-10 flex items-center gap-x-6">
              <a href="#" class="rounded-md bg-rose-600 px-3.5 py-1.5 text-base font-semibold leading-7 text-white shadow-sm hover:bg-rose-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-600">Apply Now</a>
              <a href="#" class="text-base font-semibold leading-7 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-gray-50 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
      <img class="aspect-[3/2] object-cover lg:aspect-auto lg:h-full lg:w-full" src="https://wallpapers.com/images/hd/coffee-and-laptop-for-homework-bja4gzo2ofhdslmz.jpg" alt="" />
    </div>
  </div>
<FeatureSection/>
<Footer :navigation="navigation"/>
</template>