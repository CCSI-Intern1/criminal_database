<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AuthLayoutSample from '@/Layouts/AuthLayoutSample.vue';
import { Head, router } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SubjectModal from '@/Components/SubjectModal.vue';

defineProps({
    subjects: {
        type: Array,
        default: () => [],
    },
});

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const deleteSubject = (id) => {
    if (confirm('Are you sure you want to delete this subject?')) {
        router.delete(route('subjects.destroy', id), {
            onSuccess: () => {
                router.visit(route('subjects.index'));
            },
        });
    }
};
</script>

<style>

</style>

<template>
    <Head title="Subjects" />

    <AuthLayoutSample>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Subjects
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-6 forms">
                    <PrimaryButton @click="openModal">
                        Create New Subject
                    </PrimaryButton>
                </div>

                <!-- Subjects Table -->
                <div class="bg-white rounded-lg shadow">
                    <div v-if="subjects.length > 0" class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-100 border-b">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Full Name</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Birth Date</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Case</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Case Status</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Court</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="subject in subjects" :key="subject.id" class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ subject.first_name }} {{ subject.middle_name || '-' }} {{ subject.last_name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ subject.birth_date }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ subject.case}}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ subject.case_status }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ subject.court }}</td>
                                    <td class="px-6 py-4 text-sm space-x-2">
                                        <a :href="route('subjects.edit', subject.id)" class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <button @click="deleteSubject(subject.id)" class="text-red-600 hover:text-red-900">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div v-else class="px-6 py-12 text-center text-gray-500">
                        No subjects found. <a href="#" class="text-blue-600 hover:text-blue-900" @click.prevent="openModal">Create one</a>
                    </div>
                </div>
            </div>
        </div>
        <SubjectModal :show="showModal" @close="closeModal" />
    </AuthLayoutSample>
</template>
