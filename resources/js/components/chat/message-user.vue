<template>
    <div class="message">
        <p><span>{{message.user.name}}</span> : {{message.body}} ás {{message.user.created_at}}</p>
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

</style>
