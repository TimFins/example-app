<template>
    <div class="bg-white m-4 p-4 rounded-lg border-[10px]">
        <div class="flex justify-between">
            <h1 class="text-xl">List of books</h1>
            <button @click="redirectToCreate" class="bg-gray-900/30 w-fit rounded-md p-2 mt-2">Create Book</button>
        </div>
        <div class="mt-5" v-for="book in books">
            <div class="rounded-md border-[2px] bg-gray-100 p-5">
                <div class="flex justify-start">
                    <div class="text-gray-600 flex flex-col gap-1">
                        <p>Title</p>
                        <p>ISBN</p>
                        <p>Author</p>
                    </div>
                    <div class="w-[40px]" />
                    <div class="flex flex-col gap-1">
                        <p>{{ book.title }}</p>
                        <p>{{ book.isbn }}</p>
                        <p>{{ book.author }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
defineProps<{ books: any }>()

function redirectToCreate() {
    window.location.href = '/book/create';
}
</script>
