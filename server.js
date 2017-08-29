//var app = require('express')();
//var server = require('http').Server(app);
//var io = require('socket.io')(server);
//var redis = require('redis');
//
//server.listen(3000);
//io.on('connection', function (socket) {
//
//    //console.log("client connected");
//    var redisClient = redis.createClient();
//    redisClient.subscribe('message');
//
//    redisClient.on("message", function(channel, data) {
//        try{
//            data=JSON.parse(data)
//        }
//        catch(e){
//            return console.log('data is not an JSON string',data)
//        }
//
//        console.log("mew message add in queue "+ data['message'] + " channel");
//        socket.emit(channel, data);
//    });
//
//    socket.on('disconnect', function() {
//        redisClient.quit();
//    });
//
//});

var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('test-channel');

redis.on('message', function(channel, message) {
    message = JSON.parse(message);

    console.log(message.data);

    io.emit(channel + ':' + message.event, message.data);
});

server.listen(3000);