<template>
    <div :class="getTileClass()">
        <slot></slot>
    </div>
</template>

<script>
    export default{
        name:'Tile',
        props: ['position'],
        methods:{
            getTileClass(){
                if(this.position){
                    return 'col-md-'+ this.position*2;
                }
                return 'col-md-4';
            }
        }
    }
</script>