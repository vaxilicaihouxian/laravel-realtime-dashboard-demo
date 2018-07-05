<template>
   <div>
      <ul v-if="articles.length > 0" class="list-group" >
         <li v-for="article in articles" class="list-group-item">{{ article.title }}</li>
      </ul>
      <div v-if="articles.length === 0">No Approval Articles</div>
   </div>
</template>
<script>
    import io from 'socket.io-client';
   export default{
       name:'Approval',
       mounted(){
           axios.post('/approval/list').then(res =>{
               this.articles = res.data;
               let socket = io('http://localhost:8099');
               socket.on('private-dashboard:'+'user-'+window.user.id+'.article.need-approval',(data)=>{
                   this.articles.unshift(data.article);
               });
               socket.on('private-dashboard:'+'user-'+window.user.id+'.article.has-been-approval',(data)=>{
                   let index = this.findIndexOfArticle(data.article);
                   if(index !== false)
                     this.articles.splice(index,1);
               });
           })
       },
       data(){
           return {
               articles:[]
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
       }
   }
</script>