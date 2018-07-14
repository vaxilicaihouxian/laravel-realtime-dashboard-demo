<template>
    <div class="container dashboard-box">
        <div class="row">
            <approval></approval>
            <weibo-mentions></weibo-mentions>
        </div>
    </div>
</template>

<script>
    import Approval from './tiles/Approval.vue';
    import WeiboMentions from './tiles/WeiboMention.vue';
    export default {
        name:'Dashboard',
        mounted() {
            console.log('Component mounted.');
        },
        components:{
            Approval,
            WeiboMentions
        }
    }
</script>
<style>
    .dashboard-box{

    }
</style>
