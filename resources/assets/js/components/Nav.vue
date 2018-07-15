<template>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDashboard" aria-controls="navbarDashboard" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Dashboard</a>

        <div v-if="hasBox" class="collapse navbar-collapse" id="navbarDashboard">
            <div class="ml-auto">
                <notification-box :data="notifications" :total="countNotifications"></notification-box>
            </div>
        </div>
    </nav>
    </div>
</template>

<script>
    import NotificationBox from './NotificationBox.vue';
    export default {
        name:"Nav",
        props:['notifications','countNotifications','hasBox'],
        components:{
            NotificationBox
        }
    }
</script>