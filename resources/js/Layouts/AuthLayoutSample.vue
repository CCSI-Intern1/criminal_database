<script setup lang="ts">
import NavLink from '@/Components/NavLink.vue';
import DangerButton from '@/Components/DangerButton.vue';

</script>

<template>
    <div class="min-h-screen bg-gray-100 grid lg:grid-cols-5 gap-4">
        <nav class="col-span-1 flex lg:grid lg:grid-cols-1 border-r border-gray-100 h-auto p-4 bg-white shadow">
            <div class="border-b border-gray-100 bg-white py-4">
                <div class="flex items-center gap-2 text-2xl font-bold text-gray-800">
                    Comprehensive Credit Services Inc.
                </div>
                <div class="lg:mt-4 w-full gap-1 flex flex-col">
                    <NavLink
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                    >Dashboard</NavLink>
                    <NavLink
                        :href="route('subjects.index')"
                        :active="route().current('subjects.*')"
                    >Subjects</NavLink>
                </div>
            </div>
                <!-- <DangerButton
                    class="mt-4 w-full px-2 py-1 text-xs"
                    :href="route('logout')"
                    method="post"
                    as="button"
                    >
                    Logout
                </DangerButton> -->
        </nav>
        <main class="col-span-4">
            <slot />
        </main>
    </div>
</template>