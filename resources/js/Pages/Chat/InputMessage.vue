<template>
    <div class="chat-message clearfix">
        <div class="input-group mb-0">
            <div class="input-group-prepend" @click="sendMessage()">
                <span class="input-group-text"><i class="fa fa-send"></i></span>
            </div>
            <input
                type="text"
                v-model="message"
                @keyup.enter="sendMessage()"
                class="form-control"
                placeholder="Enter text here...">
        </div>
    </div>
</template>

<script>
export default {
    props: {
        room: {
            type: Object,
            required: true,
        },
    },
    data: function () {
        return {
            message: '',
        };
    },
    methods: {
        sendMessage() {

            if(this.message === '') {
                return;
            }

            axios.post('/chat/room/' + this.room.id + '/message', {
                message: this.message,
            })
                .then(response => {
                    if(response.status === 201) {
                        this.message = '';
                        this.$emit('messageSent');
                    }
                }).catch(error => {
                console.log(error);
            });
        },
    }
};
</script>
