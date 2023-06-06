<template>
    <div class="bg-white m-4 p-4 rounded-lg border-[10px]">
        <h1 class="text-xl">Book creation</h1>
        <form id="form" @submit.prevent="submit">
            <div class="flex flex-col gap-2 mt-5">
                <input v-model="form.title" required placeholder="Titel" class="rounded-lg border-[2px] p-1 w-fit">
                <div class="flex justify-start">
                    <input v-model="form.isbn" required placeholder="ISBN" class="rounded-lg border-[2px] p-1 w-fit">
                    <p v-if="errors.isbn" class="text-sm text-red-500 mt-2 ml-2">ISBN already taken.</p>
                </div>
                <select class="rounded-lg border-[2px] p-1 w-fit" v-model="form.author_id">
                    <option v-for="author in authors" :key="author.id" :value="author.id"> {{ author.first_name + " " + author.last_name }}</option>
                </select>
                <button type="submit" class="bg-gray-900/30 w-fit rounded-md p-2" form="form">Create book</button>
            </div>
        </form>
    </div>
</template>

<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3'

defineProps<{ errors: any, authors: any }>()

const form = useForm({
    title: '',
    isbn: '',
    author_id: '',
})

function submit() {
    form.post(route('book.store'))
}
</script>
