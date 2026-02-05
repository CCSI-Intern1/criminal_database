<script setup>
import { useForm, router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    subject: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    first_name: props.subject.first_name,
    middle_name: props.subject.middle_name,
    last_name: props.subject.last_name,
});

const submitForm = () => {
    form.put(route('subjects.update', props.subject.id), {
        onSuccess: () => {
            router.visit(route('subjects.index'));
        },
    });
};

const cancelEdit = () => {
    router.visit(route('subjects.index'));
};
</script>

<template>
    <Head title="Edit Subject" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Subject
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <form @submit.prevent="submitForm" class="space-y-6">
                        <!-- First Name -->
                        <div>
                            <InputLabel for="first_name" value="First Name" />
                            <TextInput
                                id="first_name"
                                v-model="form.first_name"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <div v-if="form.errors.first_name" class="mt-2 text-sm text-red-600">
                                {{ form.errors.first_name }}
                            </div>
                        </div>

                        <!-- Middle Name -->
                        <div>
                            <InputLabel for="middle_name" value="Middle Name" />
                            <TextInput
                                id="middle_name"
                                v-model="form.middle_name"
                                type="text"
                                class="mt-1 block w-full"
                            />
                            <div v-if="form.errors.middle_name" class="mt-2 text-sm text-red-600">
                                {{ form.errors.middle_name }}
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <InputLabel for="last_name" value="Last Name" />
                            <TextInput
                                id="last_name"
                                v-model="form.last_name"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <div v-if="form.errors.last_name" class="mt-2 text-sm text-red-600">
                                {{ form.errors.last_name }}
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-end gap-2 pt-4">
                            <button
                                type="button"
                                @click="cancelEdit"
                                class="px-4 py-2 text-gray-500 hover:text-gray-700"
                            >
                                Cancel
                            </button>
                            <PrimaryButton :disabled="form.processing">
                                Update Subject
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
