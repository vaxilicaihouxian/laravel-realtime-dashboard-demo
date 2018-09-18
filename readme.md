License: MIT

# Laravel Real Time Dashboard Demo

## Lesson 1

1. 准备环境:

php7,laravel-framework,mysql,redis,socket.io

2. 构建实时控制面板的基本思路


3. 编写一个实现基本思路的小测试

- socket.io 服务建立

- 页面内加入socket.io-client建立连接

- 页面显示来自websocket连接的数据


## Lesson 2

1. 了解Laravel如何完成事件推送

- queue

- event

- notification

2. 了解socket.io（服务端和客户端）如何发送、接收事件

- socket-io + ioredis 服务端

- socket-io client 客户端(基于Laravel 事件广播功能)

3. 构建一个事件推送和一个通知推送

- 利用laravel 内置注册/登陆部分，添加相关的用户功能

- 创建一个事件，发送事件

- 创建一个通知、发送通知

4. 构建接收、发送通知(socket.io)

- socket.io 服务端增加"订阅/推送"功能（利用redis-client来验证功能的实现）


## Lesson 3

1. 构建一个消息箱

- 能够显示当前的消息数量

- 能够显示消息的内容

2. 消息箱组件增加websocket接收通知、更新数据功能

- 消息组件内监听的频道为当前用户的Notification频道

- websocket收到“Notification”数据的时候能够实时更新数量、添加新通知内容(通过vue-tool进行模拟测试)

3. 利用Eloquent Model Observer 构建“提交-审核-批准”功能

> 使用 article 表来模拟需要审核的数据

- eloquent model observer 介绍

- 编写提交页面,审核页面,提交api,审核api

-  编写 “批准” 通知

- 编写”待审核“事件

- 创建article observer,建立 article model的事件监听，发送通知

- 编写 消息弹出窗

- 编写审核进度面板组件

## Lesson 4

1. 优化审核进度面板内容显示效果：

- 利用vuejs的transition组件，优化内容的“增加”、“减少”效果

2. 通过Laravel Task Scheduling 建立“新闻”内容的展示功能

- 构建后台新闻获取的服务

- 构建消息推送command

- 构建“新闻”内容展示组件

## Lesson 5

1. 权限问题

- socket io 任何人都可以连接，没有任何验证措施

- channel 的加入没有进行权限验证（是否登陆）

2. 修改代码，增加权限校验

- 修改dashboard抽象类的channel名称(加上-user-用户ID),修改组件内的客户端代码

- socket-io.server.js 内添加一些验证代码(io.use,io.to等)

- 修改组件内监听的代码


## Lesson 6

1. 使用第三方的api提供数据，增加两个组件

- weibo mentions

- github repository info

2. 总结
