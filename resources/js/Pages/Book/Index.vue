<template>
    <div class="bg-white m-4 p-4 rounded-lg border-[10px]">
        <div class="flex justify-between">
            <h1 class="text-xl">List of books</h1>
            <button @click="redirectToCreate" class="bg-gray-900/30 w-fit rounded-md p-2 mt-2">Create Book</button>
        </div>
        <input v-model="searchForm.title" required placeholder="Titel" class="rounded-lg border-[2px] p-1 w-fit">
        <div class="mt-5" v-for="book in books">
            <div class="rounded-md border-[2px] bg-gray-100 p-5">
                <div class="flex justify-start" @click="show(book)">
                    <div class="text-gray-600 flex flex-col gap-1">
                        <p>Title</p>
                        <p>Author</p>
                    </div>
                    <div class="w-[40px]" />
                    <div class="flex flex-col gap-1">
                        <p>{{ book.title }}</p>
                        <p>{{ book.author.first_name + " " + book.author.last_name + ", " + new Date(book.author.birthdate).toLocaleDateString() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { router } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import { watch } from 'vue'

defineProps<{ books: any }>()

const searchForm = useForm({
    title: '',
})

watch(
    () => searchForm.title,
    () => {
        router.reload({
            data: { title: searchForm.title },
        })
    }
)

function redirectToCreate() {
    window.location.href = '/book/create';
}

function show(book: any) {
    window.location.href = '/book/' + book.id;
}
</script>
