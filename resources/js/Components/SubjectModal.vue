<script setup>
import { useForm, router } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['close']);

const form = useForm({
    first_name: '',
    middle_name: '',
    last_name: '',
});

const submitForm = () => {
    form.post(route('subjects.store'), {
        onSuccess: () => {
            form.reset();
            emit('close');
            router.visit(route('subjects.index'));
        },
    });
};

const closeModal = () => {
    form.reset();
    emit('close');
};
</script>

<template>
    <Modal :show="show" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create New Subject
            </h2>

            <form @submit.prevent="submitForm" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="first_name" value="First Name" />
                    <TextInput
                        id="first_name"
                        v-model="form.first_name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                    />
                </div>

                <div>
                    <InputLabel for="middle_name" value="Middle Name" />
                    <TextInput
                        id="middle_name"
                        v-model="form.middle_name"
                        type="text"
                        class="mt-1 block w-full"
                    />
                </div>

                <div>
                    <InputLabel for="last_name" value="Last Name" />
                    <TextInput
                        id="last_name"
                        v-model="form.last_name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                    />
                </div>

                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        @click="closeModal"
                        class="px-4 py-2 text-gray-500 hover:text-gray-700"
                    >
                        Cancel
                    </button>
                    <PrimaryButton :disabled="form.processing">
                        Create Subject
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </Modal>
</template>
