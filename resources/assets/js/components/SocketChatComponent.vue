<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group mt-5">
                    <textarea rows="6" class="form-control" readonly>{{ dataMessages.join('\n') }}</textarea>
                </div>

                <div class="input-group mb-3">
                    <input type="text" v-model="message" class="form-control" placeholder="Написать сообщение...">
                    <div class="input-group-append">
                        <button @click="sendMessage" class="btn btn-outline-secondary" type="button">Отправить</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                dataMessages: [],
                message: ''
            }
        },
        mounted() {
            var socket = io('http://localhost:3000');

            socket.on('news-action:App\\Events\\NewMessage', function(data) {
                this.dataMessages.push(data.message);
            }.bind(this));
        },
        methods: {
            sendMessage: function() {
                axios({
                    method: 'get',
                    url: '/start/send-msg',
                    params: {message: this.message}
                }).then((response) => {
                    this.message = '';
            });
            }
        }
    }
</script>
