<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Comprehensive Credit Services Inc." />
    <div class="bg-gray-50 bg text-black/50 dark:bg-black dark:text-white/50">
        <!-- <img
            id="background"
            class="absolute inset-0 bg"
            src="images/bg/landing_page_bg.jpg"
        /> -->
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-1 items-center gap-2 py-10 lg:grid-cols-2"
                >
                    <div class="flex items-center gap-2 text-2xl font-bold text-black dark:text-white">
                        Comprehensive Credit Services Inc.
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex lg:flex-1 lg:justify-end">
                        <!-- <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard {{ hello }}
                        </Link> -->

                        <!-- <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template> -->
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="grid grid-cols-1 items-center gap-6 lg:grid-cols-3">
                        <div class="flex flex-col items-start gap-6 lg:col-span-2">
                            <div class="flex flex-col gap-2 flex-1 flex-direction-row">
                                <h1
                                    class="text-3xl font-bold text-black dark:text-white sm:text-4xl"
                                >
                                    Criminal Database
                                </h1>
                                <h2 class="text-xl font-semibold text-black dark:text-white">
                                    Comprehensive Platform for Criminal Information Handling
                                </h2>
                            </div>

                            <p class="text-sm/relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus malesuada maximus nunc eget finibus. Curabitur pulvinar lectus porta libero faucibus eleifend. Ut hendrerit elit est, vitae interdum arcu molestie non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                            </p>

                            <p class="text-sm/relaxed">
                                Ut nec nunc eu est faucibus lacinia vitae auctor neque. Curabitur finibus risus risus, sit amet consectetur eros condimentum vitae.
                            </p>
                        </div>
                        <form @submit.prevent="submit" class="w-4/5 max-w-sm form flex flex-col items-center">
                            <h1 class="text-2xl font-bold text-black dark:text-white title">
                                Log in to your account
                            </h1>
                                <div>
                                    <InputLabel for="email" value="Email" class="text-white"/>

                                    <TextInput
                                        id="email"
                                        type="email"
                                        class="mt-1 input w-full text-black"
                                        v-model="form.email"
                                        required
                                        autofocus
                                        autocomplete="username"
                                    />

                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="password" value="Password" class="text-white"/>

                                    <TextInput
                                        id="password"
                                        type="password"
                                        class="mt-1 block input w-full text-black"
                                        v-model="form.password"
                                        required
                                        autocomplete="current-password"
                                    />

                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>

                                <div class="mt-4 block">
                                    <label class="flex items-center">
                                        <Checkbox name="remember" v-model:checked="form.remember" />
                                        <span class="ms-2 text-sm text-gray-600" text-white
                                            >Remember me</span
                                        >
                                    </label>
                                </div>

                                <div class="mt-4 flex items-center justify-end">
                                    <Link
                                        v-if="canResetPassword"
                                        :href="route('password.request')"
                                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    >
                                        Forgot your password?
                                    </Link>

                                    <PrimaryButton
                                        class="ms-4"
                                        :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing"
                                    >
                                        Log in
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>

                </main>

                <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                >
                    <!-- Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }}) -->
                </footer>
            </div>
        </div>
    </div>
</template>


