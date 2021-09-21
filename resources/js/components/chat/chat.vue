<template>
    <div>
        <Message></Message>
        <div class="form-inline">
            <textarea @keypress="keypressMessage" v-model="body" placeholder="Sua Messagem..." class="form-control" cols="1" rows="3"></textarea>
            <a @click.prevent="sendMessage" href="" class="btn btn-success">Enviar <box-icon name='send' type='solid' color='rgba(0,0,0,0.2)'></box-icon></a>
        </div>
            <pulse-loader :loading="loading" :color="'#2fa360'" :size="'8PX'"></pulse-loader>
    </div>
</template>

<script>
import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
export default {
    data() {
        return {
            body: '',
            loading: false
            }
    },
    methods: {
        keypressMessage(e) {
            if(e.code === 'Enter' && !e.shiftKey){
                e.preventDefault();
                this.sendMessage();
            }
        },
        sendMessage() {
            this.loading = true;
            this.$store.dispatch('storeMessage', {body: this.body})
                .then(() => {
                    this.body = '';
                }).catch((err) => {
                    console.log(err);
                }).finally(() => {
                    this.loading = false;
                });
        }

    },
    components: {
        PulseLoader
    }
}
</script>

