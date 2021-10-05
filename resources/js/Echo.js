import store from './store/store';


Echo.join('chat')
        .here(users => {
            store.commit('LOAD_USERS', users)
        })
        .joining(user => {
            store.commit('JOINING_USER', user)
        })
        .leaving(user => {
            store.commit('LEAVING_USER', user)
        })
        .listen('Chat.MessageCreated', e => {
            store.commit('ADD_MESSAGE', e.message)
        })
