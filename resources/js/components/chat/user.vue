<template>
    <div>
        <h3>{{users.length}} Online</h3>
        <div class="search-user">
            <input type="text" name="searc" id="search" placeholder="Pesquisar..."><box-icon name='search-alt-2'></box-icon>
        </div>
        <div class="list-users">
            <div class="users" v-for="user in users" :key="user.id">
                <div class="img-user" v-if="user.image">
                    <img :src="`/storage/users/${user.image}`" :alt="user.name">
                </div>
                <div class="img-user" v-else>
                    <img :src="`/storage/users/anônimo.png`" alt="anônimo">
                </div>
                <div class="name-user">
                    <p v-text="user.name"></p>
                    <small>Online<span class="header-message-content-online">0</span></small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        users () {
            return this.$store.state.chat.users;
        }
    }
}
</script>

<style>
h3 {
    text-align: center;
}

.search-user {
    text-align: center;
    display: inline-flex;
}

.search-user input {
    width: 20vw;
    border: 0;
    border-radius: 10px 0 0 10px;
    background-color: #f5f5dceb;
    padding: 0 0 0 20px;

}

.search-user input:active {
    outline: 0;
}

.search-user input:focus {
    outline: 0;
}

.search-user box-icon {
    background-color: #f5f5dceb;
    border-radius: 0 10px 10px 0;
    border: 0;
    padding: 2px;
}

.list-users {
    max-height: 400px;
    min-height: 400px;
    overflow-y: scroll;
    overflow-x: hidden;
}

.users {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    justify-content: flex-start;
    max-width: 246px;
    min-width: 184px;
    align-content: center;
    flex-direction: row;
    background-color: #f8fafc45;
    border-radius: 3px;
    margin: 10px;
    padding: 7px;
    box-shadow: 1px 1px 1px 1px #00000017;
}

.users .img-user img {
    width: 44px;
    height: 40px;
    border-radius: 50%;
}

.users .name-user {
    text-align: center;
    font-weight: 600;
    padding: 0 7px;
}

.list-users::-webkit-scrollbar {
    width: 8px;
  }

.list-users::-webkit-scrollbar-track {
  background: rgb(196, 195, 195, 0.5);        /* color of the tracking area */
  border-radius: 5px;
}

.list-users::-webkit-scrollbar-thumb {
  background-color: rgb(85, 85, 85, .4);    /* color of the scroll thumb */
  border-radius: 20px;       /* roundness of the scroll thumb */
  border: 3px rgb(85, 85, 85, .3);  /* creates padding around scroll thumb */
}

/* usuário online */

.header-message-content-online{
    background-color: green;
    color: green;
    border-radius: 100%;
    font-size: 0px;
    padding: 4px;
    margin: 7px;
}

.name-user p {
    margin: 0;
}

.name-user small {
    display: flex;
}
</style>
