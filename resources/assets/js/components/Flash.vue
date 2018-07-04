<template>
    <div v-show="!!this.body" class="alert fixed-message" :class="this.type()" role="alert">
        <ul v-for="message in body.message">
            <li>
                {{ message }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default{
        props:['message', 'isError'],
        data(){
            return {
                body:'',
                hasError:this.isError,
                show:false,
            }
        },
        created(){
            if(this.message){
                this.flash(this.message,this.hasError);
            }
            window.events.$on('flash',message => {
                this.flash(message.context,message.isError);
            });
        },
        methods:{
            type(){
                if(this.hasError){
                    return 'alert-danger';
                }
                return 'alert-success';
            },
            parse(input){
                if(typeof input == "string"){
                    try{
                        let json =  JSON.parse(input);
                        if(json.message.length  <= 0)
                            return {message:[input]};
                        return json
                    }
                    catch(e){
                        return {message:[input]};
                    }
                }
                return input;
            },
            flash(message,isError){
                this.body = this.parse(message);
                this.show = true;
                this.hasError = isError;
                this.hide();
            },
            hide(){
                setTimeout(()=>{
                    if(typeof this.body.redirect !== "undefined" && this.body.redirect.length >0){
                        //console.log(this.body.redirect);
                        window.location.href=this.body.redirect;
                    }
                    this.close();
                },3000);
            },
            close(){
                this.show=false;
                this.body='';
                this.hasError=false;
            }
        }


    }
</script>

<style>
    .fixed-message{
        position:fixed;
        top: 60px;
        width:auto;
        margin: auto;
        -webkit-animation-name: slideLeft;
        -moz-animation-name: slideLeft;
        -o-animation-name: slideLeft;
        animation-name: slideLeft;
        -webkit-animation-duration: 1s;
        -moz-animation-duration: 1s;
        -o-animation-duration: 1s;
        animation-duration: 1s;
        padding-right: 50px;

    }
    @keyframes slideLeft {
        0% { left: -100%; }

        100% { left: 0%; }
    }
</style>