<template>
        <div class="row h-100">
            <tile :position="1">
                <toutiao-news></toutiao-news>
            </tile>
            <tile :position="1">
                <weibo-mentions></weibo-mentions>
            </tile>
            <tile :position="1">
                <github-repo></github-repo>
            </tile>
        </div>
</template>

<script>
    import Approval from './tiles/Approval.vue';
    import WeiboMentions from './tiles/WeiboMention.vue';
    import ToutiaoNews from './tiles/ToutiaoNews.vue';
    import GithubRepo from './tiles/GithubRepo.vue';
    import Tile from './Tile.vue';
    export default {
        name:'Dashboard',
        mounted() {
            console.log('Component mounted.');
        },
        components:{
            Approval,
            WeiboMentions,
            ToutiaoNews,
            GithubRepo,
            Tile
        }
    }
</script>
<style>
</style>
