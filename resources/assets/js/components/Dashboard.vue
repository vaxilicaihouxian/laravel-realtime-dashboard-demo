<template>
    <div class="container dashboard-box">
        <div class="row">
            <approval></approval>
            <approval></approval>
            <approval></approval>

        </div>
    </div>
</template>

<script>
    import Approval from './tiles/Approval.vue';

    export default {
        name:'Dashboard',
        mounted() {
            console.log('Component mounted.');
        },
        components:{
            Approval
        }
    }
</script>
<style>
    .dashboard-box{

    }
</style>
