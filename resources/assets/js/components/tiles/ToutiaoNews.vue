<template>
      <div class="card h-100 card-shadow">
         <div class="card-header">
            新闻
         </div>
         <div class="card-body overflow-scroll-auto">
            <transition-group name="card" tag="div">
               <div class="card mb-2 toutiao-news-card card-shadow" :key="article.itemId" v-if="articles.length > 0" v-for="article in articles">
                  <div class="card-body">
                     <h5 class="">{{ article.title }}</h5>
                     <h6 class="text-subtitle text-muted">{{ article.mediaName }}
                        <span class="float-right">{{ article.datetime }}</span></h6>
                     <div class="text-center p-2">
                        <img :src="img.url" class="img-fluid mb-2" alt="news-pic" v-for="img in article.imageList">
                     </div>
                     <p class="card-text">{{ article.abstract }}</p>
                  </div>
                  <div class="card-footer">
                     <a :href="article.displayUrl" target="_blank">详细链接</a>
                  </div>
               </div>
            </transition-group>

            <div class="card mb-2 toutiao-news-card" v-if="articles.length == 0">
               <div class="card-body">
                  <p class="card-text text-center font-weight-bold">No News</p>
               </div>
            </div>
         </div>
      </div>


</template>
<script>
    import SocketClient from '../../lib/SocketClient';
    import saveState from 'vue-save-state';
   export default{
       name:'ToutiaoNews',
       mounted(){
           let socket = SocketClient;
           socket.on('dashboard:toutiao.news',(data)=>{
               this.articles = data.news;
           });
           socket.on('error',(err)=>{
               console.error(err);
               socket.disconnect();
           });
       },
       data(){
           return {
               articles:[],
           }
       },
       methods:{
           getSaveStateConfig(){
               return {
                   'cacheKey':'dashboard-toutiao-news'
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
   .toutiao-news-card{
      min-height:200px;
   }
</style>