<template>
   <tile :position="1">
      <transition-group name="card" tag="div">
         <div class="card mb-2 approval-card " :key="article.id" v-if="articles.length > 0" v-for="article in articles">
            <div class="card-body">
               <h5 class="text-center">{{ article.title }}</h5>
               <p class="card-text">some text</p>
            </div>
         </div>
      </transition-group>

      <div class="card mb-2 approval-card" v-if="articles.length == 0">
         <div class="card-body">
            <p class="card-text text-center font-weight-bold">No Approval Articles</p>
         </div>
      </div>
   </tile>

</template>
<script>
    import Tile from '../Tile.vue';
    import SocketClient from '../../lib/SocketClient';
   export default{
       name:'Approval',
       mounted(){
           axios.post('/approval/list').then(res =>{
               this.articles = res.data;
               let socket = SocketClient;
               socket.on('error',(err)=>{
                   console.error(err);
                   socket.disconnect();
               })
               socket.on('article.need-approval',(data)=>{
                   this.articles.unshift(data.article);
               });
               socket.on('article.has-been-approval',(data)=>{
                   let index = this.findIndexOfArticle(data.article);
                   if(index !== false)
                       this.articles.splice(index,1);
               });
           })
       },
       data(){
           return {
               articles:[],
           }
       },
       methods:{
           findIndexOfArticle(article){
              for(let i = 0;i < this.articles.length;i++){
                  if(this.articles[i].id === article.id)
                      return i;
              }
              return false;
           }
       },
       components:{
           Tile
       }
   }
</script>
<style>
   .approval-card{
      min-height:200px;

   }
</style>