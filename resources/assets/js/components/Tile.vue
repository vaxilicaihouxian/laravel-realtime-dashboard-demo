<template>
    <div :class="getTileClass()">
        <slot></slot>
    </div>
</template>

<script>
    export default{
        name:'Tile',
        methods:{
            getTileClass(){
                return 'col-md-4';
            }
        }
    }
</script>