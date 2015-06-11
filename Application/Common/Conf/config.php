<?php
return array(
    //'配置项'=>'配置值'
    'DEFAULT_MODULE'=>'Admin',

//
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'one', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'tp_',
    'DB_CHARSET'=> 'utf8',

//    'DB_TYPE'   => 'pdo',
//    'DB_USER'   => 'root',
//    'DB_PWD'    => '',
//    'DB_PREFIX' => 'tp_',
////    'DB_DSN'    => 'mysql:host=localhost;dbname=thinkphp;charset=UTF8',
//    'DB_DSN' => 'mysql://root:@localhost:3306/thinkphp#utf8',

    'SHOW_PAGE_TRACE'=>true,
//  'CONTROLLER_LEVEL'      =>  2,
//    'TMPL_FILE_DEPR'=>'_',
//    'VIEW_PATH'=>'./Theme/',
//    'DEFAULT_THEME'    =>    'default',
    'LOG_RECORD' => true, // 开启日志记录
    'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR',
    'LOG_TYPE'              =>  'File',
    TMPL_PARSE_STRING=>array(
        '__BOOT__'=>__ROOT__.'/Public/STATIC/bootstrap',
        '__JQUERY__'=>__ROOT__.'/Public/STATIC/jquery',
            '__PUB__'=>__ROOT__.'/Public',
        '__ICON__'=>__ROOT__.'/Public/icon',
        '__JS__'=>__ROOT__.'/Public/js',
        '__STATIC__'=>__ROOT__.'/Public/STATIC',
    )

);