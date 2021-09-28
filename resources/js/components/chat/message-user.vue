<template>
    <div class="message">
        <div class="list-message-mine" v-if="message.owner">
            <div class="message-mine">
                <p><span>{{message.user.name}}</span>: {{message.body}}</p>
                <div class="date-message">
                    <small>ás {{message.created_at}}</small>
                </div>
            </div>
        </div>
        <div class="list-message-his" v-if="!message.owner">
            <div class="message-his">
                <p><span>{{message.user.name}}</span>: {{message.body}}</p>
                <div class="date-message">
                    <small>ás {{message.created_at}}</small>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    props: {
        message: {
            type: Object,
            require: true
        }
    },


}
</script>

<style>

.list-message-his {
    display: flex;
    justify-content: flex-start;
}

.message-his {
    background-color: #ffffff85;
    border-radius: 18px;
    margin: 10px;
    padding: 7px 17px;
    min-width: 38%;
    max-width: 50%;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-wrap: wrap;
    align-content: flex-start;
    font-size: 12px;
    flex-direction: column;
    word-break: break-all;
}

.message-his p {
    margin: 0;
    font-size: 13px;
}

.message-his p span {
    font-size: 14px;
    font-weight: bolder;
}

.message-his .date-message {

}

.list-message-mine {
    display: flex;
    justify-content: flex-end;
}

.message-mine {
    background-color: #8ff89885;
    border-radius: 18px;
    margin: 10px;
    padding: 7px 17px;
    min-width: 38%;
    max-width: 50%;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-wrap: wrap;
    align-content: flex-start;
    font-size: 12px;
    flex-direction: column;
    word-break: break-all;
}

.message-mine p {
    margin: 0;
    font-size: 13px;
}

.message-mine p span {
    font-size: 14px;
    font-weight: bolder;
}

</style>
