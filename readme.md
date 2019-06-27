# FORWARD - 基于PHP WorkerMan框架，实现HTTP代理流量统一认证与转发

## 克隆项目并安装依赖
```bash
#下载
git clone https://github.com/vfeelit/forward.git
#进入目录
cd forward

#安装依赖
composer -vvv install
```

## 定义用户认证文件
在根目录下拷贝users.php.example，重命名为users.php，按照格式，定义tunnels和users。
```php
<?php

return [
    'tunnels' => [
        'tcp://127.0.0.1:4040',
        'tcp://127.0.0.1:4041',
    ],
    'users' => [
        [
            'username' => 'test',
            'password' => 'test',
            'tunnel' => '',
        ],
        [
            'username' => 'test1',
            'password' => 'test1',
            'tunnel' => 'tcp://127.0.0.1:4041',
        ],
    ],
];
```
注：如果用户指定了tunnel，那么数据总是转发到该tunnel。如果不指定，将从tunnels中随机选择。

## 定义环境变量
拷贝根目录下的.env.example，重命名为.env:
```bash
DAEMONIZE=true
NAME=FORWARD
LISTEN=tcp://0.0.0.0:1080
FORWARD=tcp://127.0.0.1:3128
WORKER_COUNT=16
MAX_REQUEST=8000
STDOUT=
PID_FILE=
LOG_FILE=
STATISTICS_FILE=
WORKER_USER=
WORKER_GROUP=
#MAX_PACKAGE_SIZE=
#MAX_SEND_BUFFER_SIZE=
SOCKET_BACKLOG=102400
SOCKET_RECV_TIMEOUT=60
SOCKET_SND_TIMEOUT=60
```
LISTEN控制监听地址，WORKER_COUNT控制Worker进程数量。

## 运行项目
```bash
#运行
php bin/forward start

#停止
php bin/forward stop

#重新加载
php bin/forward reload

#查看状态
php bin/forward status
```



