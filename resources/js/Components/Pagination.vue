<template>
    <nav aria-label="Page navigation example" >
        <ul class="inline-flex space-x-4 mt-4">
            <template v-for="(link, key) in links" :key="key">
                <div v-if="link.url === null" v-html="link.label"
                    class="py-2 px-3 leading-tight text-gray-300 cursor-not-allowed bg-white  dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white shadow-sm rounded">
                </div>
                <Link v-else v-html="link.label" :href="link.url"
                    class="py-2 px-3 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white shadow-sm rounded" :class="{ 'bg-gray-800 text-white' : link.active }">
                </Link>
            </template>
        </ul>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    links: Array,
})
</script>
