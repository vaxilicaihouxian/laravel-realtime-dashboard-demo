const SOCKET_PORT = 8099;
const REDIS = {
    "host":"127.0.0.1",
    "port":"6379"
};
let app = require('http').createServer(handler);
function handler(request, response) {
    response.writeHead(200);
    response.end('');
}
let io = require('socket.io')(app);
let ioRedis = require('ioredis');
let redis = new ioRedis(REDIS);
app.listen(SOCKET_PORT, function() {
    console.log(new Date + ' - Server is running on port ' + SOCKET_PORT + ' and listening Redis on port ' + REDIS.port + '!');
});
io.use(function(socket,next){
    if(1 > 0){
        socket.userId = 1;
        next();
    }
});
io.on('connection', function(socket) {
    console.log('A client connected');
    //join in to a channel
    let room = 'private-dashboard-user-'+socket.userId;
    console.log('room:'+room);
    socket.join(room);
});
redis.psubscribe('*', function(err, count) {
    console.log('Subscribed');
});
redis.on('pmessage', function(subscribed, channel, data) {
    data = JSON.parse(data);
    console.log(new Date);
    console.log(data);
    console.log(channel);
    io.to(channel).emit(data.event, data.data);
});