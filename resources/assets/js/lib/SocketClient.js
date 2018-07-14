import io from 'socket.io-client';

let client = false;

if(!client){
    client = io('http://127.0.0.1:8099');
}

export default client;