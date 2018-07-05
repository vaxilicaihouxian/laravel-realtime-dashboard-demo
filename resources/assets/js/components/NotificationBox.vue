<template>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="notificationBoxMenuButton">
            Notifications
            <span v-if="totalNum > 0" class="badge badge-light badge-pill">{{ totalNum }}</span>
        </button>
        <div v-if="totalNum > 0" class="dropdown-menu" aria-labelledby="notificationBoxMenuButton">
            <a v-for=" notification in notifications" class="dropdown-item" href="#">{{ notification.data.message }}</a>
        </div>
    </div>
</template>
<script>
    import io from 'socket.io-client';
    export default {
        props:['total','data'],
        name:'NotificationBox',
        mounted(){
            let socket = io('http://localhost:8099');
            let channel = 'Illuminate\\Notifications\\Events\\BroadcastNotificationCreated';
            socket.on(channel,(data)=>{
                this.notifications.unshift({data});
                this.totalNum = 1 + this.totalNum;
                window.flash(data.message);
            })
        },
        data(){
            return {
                notifications: this.data,
                totalNum: this.total
            };
        }
    }
</script>