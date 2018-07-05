<template>
   <div>
      <ul v-if="articles.length > 0" class="list-group" >
         <li v-for="article in articles" class="list-group-item">{{ article.title }}</li>
      </ul>
      <div v-if="articles.length === 0">No Approval Articles</div>
   </div>
</template>
<script>
   export default{
       name:'Approval',
       mounted(){
           axios.post('/approval/list').then(res =>{
               this.articles = res.data;
           })
       },
       data(){
           return {
               articles:[]
           }
       }
   }
</script>