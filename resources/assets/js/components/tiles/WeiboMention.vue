<template>
    <tile :position="1">
        <transition-group name="card" tag="div">
            <div class="card mb-2 weibo-mention-card " :key="mention.mid" v-if="mentions.length > 0" v-for="mention in mentions">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <img :src="mention.avatar" class="border border-light rounded-circle" alt="avatar">
                        </div>
                        <div class="col-sm-10">
                            <h5 class="card-title">{{ mention.username }} <small class="ml-2 text-muted">@{{ mention.location}}</small></h5>
                            <p class="card-text">{{ mention.text }}</p>
                        </div>
                        </div>
                    </div>

            </div>
        </transition-group>

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
        components:{
            Tile
        }
    }
</script>
<style>
    .weibo-mention-card{
        min-height: 100px;
    }
</style>