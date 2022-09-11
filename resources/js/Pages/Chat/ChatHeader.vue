<script>
    export default {
        props: {
            currentRoom: {
                type: Object,
                required: true,
            },
        },
    };
</script>

<template>
    <div class="chat-header clearfix">
        <div class="row">
            <div class="col-lg-6">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                </a>
                <div class="chat-about">
                    <h6 class="m-b-0">{{ currentRoom.name }}</h6>
                    <small>Last seen: 2 hours ago</small>
                </div>
            </div>
        </div>
    </div>
</template>
