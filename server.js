var io = require('socket.io')(8088);
io.on('connection', function(socket) {
    console.log("connected");
    socket.on("disconnected", function (socket) {
        console.log("Learned");
    });
});