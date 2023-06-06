<template>
    <div class="bg-white m-4 p-4 rounded-lg border-[10px]">
        <div class="flex justify-between">
            <h1 class="text-xl">Book</h1>
            <button @click="redirectToIndex" class="bg-gray-900/30 w-fit rounded-md p-2 mt-2">Library</button>
        </div>
        <div class="flex justify-start mt-4">
            <div class="text-gray-600 flex flex-col gap-1">
                <p>Title</p>
                <p>ISBN</p>
                <p>Author</p>
                <p>Created at</p>
            </div>
            <div class="w-[40px]" />
            <div class="flex flex-col gap-1">
                <p>{{ book.title }}</p>
                <p>{{ book.isbn }}</p>
                <p>{{ book.author.first_name + " " + book.author.last_name + ", " + new Date(book.author.birthdate).toLocaleDateString() }}</p>
                <p>{{ new Date(book.created_at ).toLocaleString() }}</p>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
defineProps<{ book: any }>()

function redirectToIndex() {
    window.location.href = '/book';
}
</script>
