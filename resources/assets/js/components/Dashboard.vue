<template>
    <div class="container-fluid dashboard-box">
        <div class="row">
            <toutiao-news></toutiao-news>
            <weibo-mentions></weibo-mentions>
        </div>
    </div>
</template>

<script>
    import Approval from './tiles/Approval.vue';
    import WeiboMentions from './tiles/WeiboMention.vue';
    import ToutiaoNews from './tiles/ToutiaoNews.vue';
    export default {
        name:'Dashboard',
        mounted() {
            console.log('Component mounted.');
        },
        components:{
            Approval,
            WeiboMentions,
            ToutiaoNews
        }
    }
</script>
<style>
    .dashboard-box{

    }
</style>
