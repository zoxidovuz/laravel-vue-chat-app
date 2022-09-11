<template>
    <li class="clearfix">
        <div :class="'message-data' + (auth.id === message.user.id ? ' text-right' : '')">
            <span class="message-data-time">10:10 AM, Today</span>
            <img v-if="auth.id === message.user.id" :src="message.user.profile_photo_url" alt="avatar">
        </div>
        <div :class="'message ' + (auth.id === message.user.id ? 'other-message float-right' : 'my-message')"> {{ message.message }} </div>
    </li>
</template>

<script>

export default {
    props: {
        message: {
            type: Object,
            required: true,
        },
        auth: {
            type: Object,
            required: true,
        }
    }
};
</script>
