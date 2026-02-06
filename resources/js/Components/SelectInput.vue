<script setup>
import { ref, watch } from 'vue'

const props = defineProps({
    modelValue: String,
    options: Array,
    placeholder: String,
    required: Boolean,
})

const emit = defineEmits(['update:modelValue'])

const isOther = ref(false)
const customValue = ref('')

watch(
    () => props.modelValue,
    (value) => {
        if (value !== '' && value !== null && value !== undefined) {
            // If the value matches a known option, hide input
            const isKnown = props.options.some(
                (opt) => opt.value === value
            )

            isOther.value = !isKnown
            customValue.value = isOther.value ? value : ''
        } else {
            isOther.value = false
            customValue.value = ''
        }
    },
    { immediate: true }
)

const onSelectChange = (value) => {
    if (value === 'other') {
        isOther.value = true
        customValue.value = ''
        emit('update:modelValue', '')
    } else {
        isOther.value = false
        emit('update:modelValue', value)
    }
}
</script>

<template>
    <div class="space-y-2">
        <select
            class="border rounded px-3 py-2 w-full"
            :value="modelValue"
            @change="onSelectChange($event.target.value)"
        >
            <option v-if="placeholder" disabled value="">
                {{ placeholder }}
            </option>

            <option
                v-for="option in options"
                :key="option.value"
                :value="option.value"
            >
                {{ option.label }}
            </option>

            <option value="other">Other…</option>
        </select>

        <input
            v-if="isOther"
            type="text"
            class="border rounded px-3 py-2 w-full"
            placeholder="Enter case status"
            v-model="customValue"
            @input="emit('update:modelValue', customValue)"
    </div>
</template>
