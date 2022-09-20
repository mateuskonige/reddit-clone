<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ArrowLeftIcon } from '@heroicons/vue/24/outline';
import PrimaryButton from '@/Components/PrimaryButton.vue';


defineProps({
    community: Object,
    post: Object
})
</script>

<template>

    <Head :title="community.name" />

    <GuestLayout>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div
                    class="bg-white px-4 font-bold py-2 w-fit rounded-full shadow mb-4 hover:bg-gray-100 transition-all ease-out">
                    <Link :href="route('frontend.communities.show', community.slug)">
                    <ArrowLeftIcon class="h-5 w-5 inline-flex mr-1" />
                    <img class="h-8 inline-flex rounded-full"
                        :src="`https://ui-avatars.com/api/?name=${community.name}`" alt="">
                    r/{{community.name}} </Link>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="col-span-2 space-y-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 max-w-3xl ">
                            <a href="#">
                                <div class="flex items-center justify-between">
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        <b>r/{{community.name}}</b>
                                        - post by <b>{{post.user.name}}</b>
                                    </p>
                                    <div class="space-x-3">
                                        <Link :href="route('communities.posts.edit', [community.slug, post.slug])">
                                        <PrimaryButton>Edit</PrimaryButton>
                                        </Link>
                                        <PrimaryButton>Delete</PrimaryButton>
                                    </div>
                                </div>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{post.title}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{post.description}}</p>
                            <a
                                class="mb-3 font-normal text-blue-700 hover:text-blue-600 hover:underline dark:text-gray-400 cursor-pointer">{{post.url}}</a>
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
