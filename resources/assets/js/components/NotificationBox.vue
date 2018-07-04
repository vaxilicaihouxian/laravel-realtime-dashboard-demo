<template>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="notificationBoxMenuButton">
            Notifications
            <span v-if="totalNum > 0" class="badge badge-light badge-pill">{{ totalNum }}</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="notificationBoxMenuButton">
            <a v-for=" notification in notifications" class="dropdown-item" href="#">{{ notification.message }}</a>
        </div>
    </div>
</template>
<script>
    export default {
        props:['total','data'],
        name:'NotificationBox',
        data(){
            return {
                notifications: this.data,
                totalNum: this.total
            };
        }
    }
</script>