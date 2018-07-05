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
               socket.on('private-dashboard:article.need-approval',(data)=>{
                   this.articles.unshift(data.article);
               });
           })
       },
       data(){
           return {
               articles:[]
           }
       }
   }
</script>