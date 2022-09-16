<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    community: Object,
    post: Object
})
</script>

<template>

    <Head :title="community.name" />

    <GuestLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    r/{{community.name}}
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2 space-y-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 max-w-3xl ">
                            <a href="#">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>r/{{community.name}}</b>
                                    - post by <b>{{post.username}}</b></p>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{post.title}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{post.description}}</p>
                        </div>
                    </div>
                    <div>
                        <div class="bg-white shadow rounded p-4">
                            <p>Latest posts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </GuestLayout>
</template>
