<template>
    <tile :position="2">
        <div class="card" v-if="mentions.length > 0">
            <div class="card-header">
                微博@
            </div>
            <div class="card-body">
        <transition-group name="card" tag="ul" class="list-group list-group-flush">

                <li class="list-group-item" :key="mention.mid"  v-for="mention in mentions">
                    <div class="row">
                        <div class="col-sm-2">
                            <img :src="mention.avatar" class="border border-light rounded-circle" alt="avatar">
                        </div>
                        <div class="col-sm-10">
                            <h5>{{ mention.username }} <small class="ml-2 text-muted">@{{ mention.location}}</small></h5>
                            <p class="weibo-mentions-text">{{ mention.text }}</p>
                            <a :href="parseLink(mention.source)" target="_blank">微博来源</a>
                        </div>
                    </div>
                </li>
        </transition-group>
            </div>

        </div>

        <div class="card mb-2 weibo-mention-card" v-if="mentions.length == 0">
            <div class="card-body">
                <p class="card-text text-center font-weight-bold">No Weibo Mentions</p>
            </div>
        </div>
    </tile>
</template>
<script>
    import Tile from '../Tile.vue';
    import SocketClient from '../../lib/SocketClient';
    import saveState from 'vue-save-state';
    export default{
        name:'weibo-mentions',
        mounted(){
            let socket = SocketClient;
            socket.on('error',(err)=>{
                console.error(err);
                socket.disconnect();
            })
            socket.on('dashboard:weibo.mentions',(data)=>{
                console.log(data);
                this.mentions = data.mentions;
            });
        },
        data(){
            return {
                mentions:[]
            }
        },
        mixins:[
            saveState
        ],
        methods:{
            parseLink(content){
                let result = content.match(/href=\"(.*)\"\s+/);
                if(result.length >1){
                    return result[1];
                }
                return '';
            },
            getSaveStateConfig(){
                return {
                    'cacheKey':'dashboard-weibo-mentions'
                };
            }
        },
        components:{
            Tile
        }
    }
</script>
<style>
    .weibo-mention-card{
        min-height: 100px;
    }
    .weibo-mentions-text{
        font-size: 0.75rem;
    }
</style>
<style scoped>
    .list-group-item{
        padding-left: 0;
        padding-right: 0;
    }
</style>