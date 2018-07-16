<template>
    <div :class="getTileClass()" class="tile">
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
                    return 'col-sm-'+ this.position*3;
                }
                return 'col-sm-4';
            }
        }
    }
</script>