<template>
    <div class="header-message">
        <header>
            <img src="/img/perfil.jpg" alt="">
            <div class="header-message-content">
                <h1>Pedro Gustavo da Silva</h1>
                <small>Online<span class="header-message-content-online">0</span></small>
            </div>
        </header>
    </div>
</template>

<script>

export default ({

})
</script>

<style scoped>
.header-message {
    background-color: #d0d0d0cf;
    border-radius: 13px;
    margin: 10px;

}

.header-message header {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    align-content: center;
    flex-wrap: nowrap;
}

.header-message header img {
    width: 44px;
    height: 40px;
    border-radius: 50%;
    margin-left: 24px;
}

.header-message-content {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    align-content: stretch;
    justify-content: center;
    flex-wrap: nowrap;
    margin: 10px 0 5px 0;
}

.header-message-content h1 {
    margin-bottom: 0;
    padding-left: 46px;
    font-size: 20px;
    font-weight: unset;
}

.header-message-content small {
    padding-left: 46px;
    display: flex;
}

.header-message-content-online {
    background-color: green;
    color: green;
    border-radius: 100%;
    font-size: 0px;
    padding: 4px;
    margin: 7px;
}

.header-message-content-offline {
    background-color: #e3342f;
    color: #e3342f;
    border-radius: 100%;
    font-size: 0px;
    padding: 4px;
    margin: 7px;
}


</style>
