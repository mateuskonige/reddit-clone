<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';

defineProps({
    communities: Array,
})

const destroy = (id) => {
    form.delete(route('communities.destroy', id));
};
</script>

<template>

    <Head title="All communities" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    All communities
                </h2>
                <Link :href="route('communities.create')">
                <PrimaryButton>
                    New
                </PrimaryButton>
                </Link>
            </div>
        </template>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-if="$page.props.flash.message">
                <div class="p-4 mt-8 ring-1 ring-green-200 text-base text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <span class="font-medium">Success!</span> {{ $page.props.flash.message }}
                </div>
            </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-x-auto relative rounded">
                    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Slug
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody v-for="community in communities.data" :key="community.id">
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{community.name}}
                                </th>
                                <td class="py-4 px-6">
                                    {{community.slug}}
                                </td>
                                <td class="py-4 px-6">
                                    <Link class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4"
                                        :href="route('frontend.communities.show', community.slug)">Show</Link>
                                    <Link class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4"
                                        :href="route('communities.edit', community.id)">Edit</Link>
                                    <Link method="delete" as="button" type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                        :href="route('communities.destroy', community.id)">Delete</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <Pagination :links="communities.links"></Pagination>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
