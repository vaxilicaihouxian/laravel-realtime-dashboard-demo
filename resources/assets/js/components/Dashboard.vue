<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-default">
                                    <div class="card-header">
                                        Approval Queue List
                                    </div>
                                    <div class="card-body">
                                        <approval></approval>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
