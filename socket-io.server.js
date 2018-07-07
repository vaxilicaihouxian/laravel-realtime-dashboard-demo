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
//get laravel session
let laravelSession = require('node-laravel-session');
let cookie = require('cookie');
io.use(function(socket,next){
    let session = cookie.parse(socket.request.headers.cookie).laravel_session;
    laravelSession.getAppKey('./.env')
        .then((appKey) => {
            // continue
            let sessionKey = laravelSession.getSessionKey(session,appKey);
            laravelSession.getSessionFromFile(sessionKey,'./storage/framework/sessions')
                .then((session)=>{
                    socket.userId = getUserIdFromSession(session);
                    return next();
                }).catch(err=>{
                return next(new Error('Authentication error'));
            });
        });
});
io.on('connection', function(socket) {
    socket.on('error',function(){

    });
    console.log('A client connected');
    //join in to a channel
    let dashboardRoom = 'private-dashboard-user-'+socket.userId;
    console.log('room:'+dashboardRoom);
    socket.join(dashboardRoom);
    let notifyRoom = 'private-App.User.'+socket.userId;
    console.log('room:'+notifyRoom);
    socket.join(notifyRoom);
});
redis.psubscribe('*', function(err, count) {
    console.log('Subscribed');
});
redis.on('pmessage', function(subscribed, channel, data) {
    data = JSON.parse(data);
    console.log(new Date);
    console.log(data);
    console.log(channel);
    if(channel.indexOf('private') > -1){
        io.to(channel).emit(data.event, data.data);
    }else{
        io.emit(channel+':'+data.event,data.data);
    }
});


function getUserIdFromSession(session){
    for (let key in session['__attr__']) {
        let matches = key.match(/login_(.*_)?([a-zA-Z0-9]+)/gi);
        if (matches && matches.length > 0) {
            return session[matches[0]];
        }
    }
}