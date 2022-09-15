<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';

defineProps({
    community: Object,
    posts: Object
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
                <Link v-if="$page.props.auth.logged" :href="route('communities.posts.create', community.slug)">
                <PrimaryButton>
                    New post
                </PrimaryButton>
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <div v-for="post in posts.data" :key="post.id" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 max-w-3xl ">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{post.title}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{post.description}}</p>
                    <PrimaryButton>
                        Read More
                    </PrimaryButton>
                </div>
                <Pagination :links="posts.links"></Pagination>
            </div>
        </div>

    </GuestLayout>
</template>
