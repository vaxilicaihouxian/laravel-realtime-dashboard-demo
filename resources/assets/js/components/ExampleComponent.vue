<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import io from 'socket.io-client';
    export default {
        mounted() {
            console.log('Component mounted.');
            const socket = io('http://localhost:8099');
            socket.on("public-message:App\\Events\\MessageNotificationEvent",function(data){
                alert(data);
                console.dir(data);
            });
            console.log(socket);
        }
    }
</script>
