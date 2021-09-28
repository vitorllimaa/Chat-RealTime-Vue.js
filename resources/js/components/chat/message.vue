<template>
    <div>
         <div class="head-message">
            <header-message></header-message>
        </div>
        <div class="table-message" ref="messages">
            <message-user v-for="message in listMessages" :key="message.id" :message="message"></message-user>
        </div>
        <div class="messages-load">
            <moon-loader :loading="loading" :color="'#2fa360'" :size="'38PX'"></moon-loader>
            <span v-if="loading"><small> Carregando...</small></span>
        </div>
    </div>
</template>

<script>
import moonLoader from 'vue-spinner/src/MoonLoader.vue'
export default {
    created () {
        this.messages()
    },

    data () {
        return{
           loading: false
        }
    },

    computed: {
        listMessages () {
            return this.$store.getters.messages
        }
    },

    methods: {
        messages() {
                this.loading = true
                this.$store.dispatch('messagesLoad')
                        .finally(() => {
                            this.loading = false
                            this.scrollMessages();
                           })
        },

        scrollMessages () {
            setTimeout(() => {
                /* let scroll = document.querySelector('.table-message')
                scroll.scrollTo(0, scroll.scrollHeight) */
                this.$refs.messages.scroll({
                    top:this.$refs.messages.scrollHeight,
                    let: 0,
                    behavior: 'smooth'
                })
            }, 1000);

        }
    },

    watch: {
        listMessages () {
            this.scrollMessages()

        }
    },

    components: {
        moonLoader
    }

}
</script>

<style>
.messages-load {
    padding: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.messages-load .v-spinner {
    margin-left: 0px;
}

.messages-load span small {
    color: lightslategray;
}

</style>

<style scoped>
.table-message {
    max-height: 333px;
    overflow-y: scroll;
    overflow-x: hidden;
}

.table-message::-webkit-scrollbar {
    width: 8px;
  }

.table-message::-webkit-scrollbar-track {
  background: rgb(196, 195, 195, 0.5);        /* color of the tracking area */
  border-radius: 5px;
}

.table-message::-webkit-scrollbar-thumb {
  background-color: rgb(85, 85, 85, .4);    /* color of the scroll thumb */
  border-radius: 20px;       /* roundness of the scroll thumb */
  border: 3px rgb(85, 85, 85, .3);  /* creates padding around scroll thumb */
}

#header-message header {
    background-color: #a0a09feb ;
}

#header-message header img {
    width: 50px;
    height: 50px;
}

</style>
