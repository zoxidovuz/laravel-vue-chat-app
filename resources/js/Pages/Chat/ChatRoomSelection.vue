<template>
    <div id="plist" class="people-list">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Search...">
        </div>
        <ul class="list-unstyled chat-list mt-2 mb-0">
            <li v-for="room in rooms" :key="room.id" @click="roomChanged(room)" :class="room.id === currentRoom.id ? 'clearfix active' : 'clearfix'" >
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                <div class="about">
                    <div class="name">{{ room.name }}</div>
                    <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        rooms: {
            type: Array,
            required: true,
        },
        currentRoom: {
            type: Object,
            required: true,
        },
    },
    data: function () {
        return {
            selectedRoom: '',
        };
    },
    created() {
        this.selectedRoom = this.currentRoom;
    },
    methods: {
        roomChanged(room) {
            this.$emit('roomChanged', room);
        },
    }
};
</script>
