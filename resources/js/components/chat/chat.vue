<template>
    <div>
        <Message></Message>
        <div class="form-inline">
            <textarea @keypress="keypressMessage" v-model="body" placeholder="Sua Messagem..." class="form-control" cols="1" rows="3"></textarea>
            <a @click.prevent="sendMessage" href="" v-if="!loading" class="btn btn-success">Enviar <box-icon name='send' type='solid' color='#f1ececa8'></box-icon></a>
            <a @click.prevent="sendMessage" href="" v-else class="btn btn-success disable">Enviar <box-icon name='send' type='solid' color='#f1ececa8'></box-icon></a>
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
            if(this.body != '' && this.body && !this.loading){
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
        }

    },
    components: {
        PulseLoader
    }
}
</script>

<style>
.form-inline {
    flex-flow: row;
}

.form-inline textarea {
    height: 38px;
    border-radius: 60px;
    width: 100%!important;
}

.btn-success.disable {
    cursor: no-drop!important;
}

.form-inline a {
    padding: 8px;
    border-radius: 60px;
    margin: 5px;
    height: 38px;
    width: 76px;
    font-size: 13px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    align-content: center;
}

.v-spinner {
    margin-left: 18px;
    padding: 5px;
}
</style>

