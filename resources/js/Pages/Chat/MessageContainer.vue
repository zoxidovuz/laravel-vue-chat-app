<template>
    <div class="h-96 w-full">
        <div class="h-full p-2 flex flex-col-reverse overflow-scroll">
            <div class="chat-history">
                <ul class="m-b-0" >
                    <MessageItem v-for="(message, index) in messages" :key="index" :message="message" :auth="auth" />
                </ul>
            </div>
        </div>
    </div>

</template>

<script>

import MessageItem from "./MessageItem.vue";
export default {
    components: {
        MessageItem,
    },
    props: {
        messages: {
            type: Array,
            required: true,
        },
        auth: {
            type: Object,
            required: true,
        }
    },
};
</script>
