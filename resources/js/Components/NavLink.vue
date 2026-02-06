<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'flex items-center gap-2 w-full px-4 py-2 bg-blue-100 text-blue-900 font-medium rounded-md transition duration-150 ease-in-out'
        : 'flex items-center gap-2 w-full px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-md transition duration-150 ease-in-out',
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
