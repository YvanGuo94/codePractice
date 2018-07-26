var http = require('http')
var axios = require('axios')
var syncRequest = require('sync-request')


http.createServer(function (request, response1) {

    http.get('http://localhost:8866/echo.php',function(req,res){
        var html='';
        req.on('data',function(data){
            html+=data;
        });
        req.on('end',function(){
            console.info(html);
        });
    });

    var res = syncRequest('GET', 'http://localhost:8866/echo.php', {});


    // 发送 HTTP 头部
    // HTTP 状态值: 200 : OK
    // 内容类型: text/plain
    response1.writeHead(200, {'Content-Type': 'text/plain'});

    // 发送响应数据 "Hello World"
    response1.end(res.getBody('utf8')+"\n");

    // axios.get('http://localhost:8866/echo.php')
    //     .then(function (response) {
    //         console.log(response.data)
    //     })
    //     .catch(function (err) {
    //     })

}).listen(38000);

// 终端打印如下信息
console.log('Server running at http://127.0.0.1:38000/');
