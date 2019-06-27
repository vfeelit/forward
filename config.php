<?php

return [
    // 是否守护进程
    'daemonize' => env('DAEMONIZE', false),
    // 客户端进程名称
    'name' => env('NAME', 'Forward'),
    // 监听地址
    'listen' => env('LISTEN', 'tcp://0.0.0.0:1080'),
    // 符合规则时转发到的地址，不设置表示不转发
    'forward' => env('FORWARD', ''),
    // 进程数量
    'worker_count' => env('WORKER_COUNT', 16),
    // 最大请求数，超过限制重启进程
    'max_request' => env('MAX_REQUEST', 8000),
    // 标准输出
    'stdout' => env('STDOUT', __DIR__ . '/log/stdout'),
    // PID文件
    'pid_file' => env('PID_FILE', __DIR__ . '/var/run/pid'),
    // 一般日志文件
    'log_file' => env('LOG_FILE', __DIR__ . '/log/log'),
    // 状态输出
    'statistics_file' => env('STATISTICS_FILE', __DIR__ . '/log/statistics'),
    // 运行用户
    'worker_user' => env('WORKER_USER', ''),
    // 运行用户组
    'worker_group' => env('WORKER_GROUP', ''),
    // 最包大小，决定可以上传内容的大小，不设置默认10M
    'max_package_size' => env('MAX_PACKAGE_SIZE', 16*1024*1024),
    // 发送缓冲区大小，不设置或默认1M
    'max_send_buffer_size' => env('MAX_SEND_BUFFER_SIZE', 2*1024*1024),
    'context_option' => [
        'socket' => [
            'backlog' => env('SOCKET_BACKLOG', 102400),
        ]
    ],
    // SOCKET参数设置
    'sockets' => [
        // 发送 60秒超时
        'SO_RCVTIMEO' => ['sec' => env('SOCKET_RECV_TIMEOUT', 60), 'usec' => 0],
        // 接收 60秒超时
        'SO_SNDTIMEO' => ['sec' => env('SOCKET_SND_TIMEOUT', 60), 'usec' => 0]
    ],
];