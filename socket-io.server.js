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
io.on('connection', function(socket) {
    console.log('A client connected');
});
redis.psubscribe('*', function(err, count) {
    console.log('Subscribed');
});
redis.on('pmessage', function(subscribed, channel, data) {
    data = JSON.parse(data);
    console.log(new Date);
    console.log(data);
    console.log(channel);
    io.emit(channel + ':' + data.event, data.data);
});