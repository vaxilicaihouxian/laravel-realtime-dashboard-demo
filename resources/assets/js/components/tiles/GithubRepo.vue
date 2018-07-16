<template>
        <div class="card">
           <div class="card-header">Github Repo</div>
            <div class="card-body">
                <h5 class="card-title">{{ repo.name}}</h5>
                <div class="mb-2">
                    <img :src="repo.avatar" class="github-repo-avatar rounded-circle" alt="avatar">
                    <span>{{ repo.ownerName }}</span>
                    <a :href="repo.url">Go To Github</a>
                </div>
                <ul class="list-group list-group-flush">
                   <li class="list-group-item">ISSUES: <span class="float-right">{{ repo.issues}}</span> </li>
                    <li class="list-group-item">STARS: <span class="float-right">{{ repo.stars}}</span> </li>
                    <li class="list-group-item">FORKS: <span class="float-right">{{ repo.forks}}</span> </li>
                </ul>
            </div>
        </div>
</template>
<script>
    import SocketClient from '../../lib/SocketClient';
    import saveState from 'vue-save-state';
    export default {
        name:'GithubRepo',
        data(){
            return {
                repo:{
                    name:'',
                    url:'',
                    issues:0,
                    stars:0,
                    avatar:'',
                    ownerName:'',
                    forks:0

                }
            }
        },
        mounted(){
            let socket = SocketClient;
            socket.on('dashboard:github.repo',(data)=>{
                this.repo = data.repo;
            });
            socket.on('error',(err)=>{
                console.error(err);
                socket.disconnect();
            });
        },
        methods:{
            getSaveStateConfig(){
                return {
                    'cacheKey':'dashboard-github-repo'
                };
            }
        },
        mixins:[
            saveState
        ],
        components:{
        }
    }
</script>
<style>
.github-repo-avatar{
    width: 32px;
}
</style>