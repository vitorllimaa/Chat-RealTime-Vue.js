import axios from "axios"

export default {

    state: {
        messages: {},
        users: {}
    },

    mutations: {
        MESSAGES_LOAD (state, messages) {
            state.messages = messages
        },

        ADD_MESSAGE (state, message) {
            state.messages.push(message)
        },

        LOAD_USERS (state, users) {
            state.users = users
        },

        JOINING_USER (state, user) {
            state.users.push(user)
        },

        LEAVING_USER (state, user) {
            state.users = state.users.filter(e => {
                return e.id != user.id
            });
        }

    },

    actions: {
        messagesLoad (context) {
            axios.get('chat/messages')
                     .then(response => context.commit('MESSAGES_LOAD', response.data))
                     .catch(() => console.log('error'))
                     .finally()
        },
        storeMessage (context, params) {
            return axios.post('chat/message', params)
                            .then(response => context.commit('ADD_MESSAGE', response.data))
                            .catch(() => console.log('error'))
                            .finally()
        }
    },

    getters: {
        messages (state) {
            return _.orderBy(state.messages, 'id', 'asc')
        }
    }
}
