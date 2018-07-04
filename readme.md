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

- eloquent model observer 介绍

- 编写 消息弹出窗

- 编写提交页面

- 编写审核页面

- 编写审核进度面板

- 编写提交api

- 编写审核api

- 建立 article model的事件监听，发送通知

- 编写 “提交” 通知

- 编写 “批准” 通知


2. 测试以上内容

## Lesson 5

1. 权限问题

2. 修改代码，增加权限校验


## Lesson 6

todo