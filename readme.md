# Laravel Real Time Dashboard Demo

## Lesson 1

1. 准备环境:

php7,laravel-framework,mysql,redis,socket.io

2. 构建实时控制面板的基本思路


3. 编写一个实现基本思路的小测试


## Lesson 2

1. 构建一个消息箱

- 能够显示当前的消息数量

- 有新消息产生的时候实时更新消息数量和内容

2. 构建一个消息推送的服务

- 模拟推送:用户提交的申请通过了审核

3. 测试相关服务

## Lesson 3

1. 了解Laravel如何完成事件推送

- queue

- event

- notification

2. 消息箱组件增加websocket接收通知、更新数据功能

3. 修改消息获取方式

- 利用laravel 内置注册/登陆部分，添加相关的用户功能

- 页面刷新时获取当前用户的消息(之前为获取全部消息)

- 消息组建内监听的频道为当前用户频道(之前为临时写定的UID=1的用户)

4. 测试相关服务

## Lesson 4

1. 利用Eloquent Model Observer 构建“提交-审核-批准”功能

> 使用 article 表来模拟需要审核的数据

- eloquent model observer 介绍

- 编写 消息弹出窗

- 编写提交页面

- 编写审核页面

- 编写审核进度面板

- 编写提交api

- 编写审核api

- 建立 article model的事件监听，发送通知

- 编写 “批准” 通知


2. 测试以上内容

## Lesson 5

1. 权限问题

- approval queue list 中显示的是全部的待审核的数据，用户应该只能看到自己的数据

- approval queue list 组件所在频道，把全部用户的新建article事件都监听了

- socket io 任何人都可以连接，没有任何验证措施

- channel 的加入没有进行权限验证（是否登陆）

2. 修改代码，增加权限校验

- 修改approval 获取的query(加上user_id条件)

- 修改dashboard抽象类的channel名称(加上-user-用户ID),修改组件内的客户端代码

- socket-io.server.js 内添加一些验证代码(io.user,io.to等)

- 修改组件内监听的代码

## Lesson 6

总结