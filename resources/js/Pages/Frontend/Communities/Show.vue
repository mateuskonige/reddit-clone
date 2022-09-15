<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    community: Object,
})
</script>

<template>
    <Head :title="community.name" />

    <GuestLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{community.name}}
                </h2>
                <Link v-if="$page.props.auth.logged" href="">
                <PrimaryButton>
                    New post
                </PrimaryButton>
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        this is {{community.name}} community page

                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
