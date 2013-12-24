<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            body{
                font: 14px;
            }    
            div{
                border: 1px #090 solid;
                border-radius: 4px;
                width: 800px;
                height:500px;
                margin: 0px auto;
                text-align: center;
                padding-top: 30px;
            }
        </style>
    </head>
    <body>
        <div>
            <dl>
                <dt>欢迎光临管理后台</dt>
                <dd>
                    <span>用户名:</span>
                    <span><?php echo Yii::app()->user->name;?></span>
                </dd>
                <dd>
                    <span>登陆时间:</span>
                    <span><?php echo date('Y-m-d H:i:s',Yii::app()->session['loginTime'] );?></span>
                </dd>
                <dd>
                    <span>客户端IP:</span>
                    <span><?php echo Yii::app()->request->userHostAddress; ?></span>
                </dd>
            </dl>
            <dl>
                <dt>服务器端信息</dt>
                <dd>
                    <span>服务器环境:</span>
                    <span><?php echo $_SERVER['SERVER_SOFTWARE'];?></span>
                </dd>
                <dd>
                    <span>PHP版本:</span>
                    <span><?php echo PHP_VERSION;?></span>
                </dd>
                <dd>
                    <span>服务器IP:</span>
                    <span><?php echo $_SERVER['SERVER_ADDR'];?></span>
                </dd>
                <dd>
                    <span>数据库信息:</span>
                    <span><?php echo strstr(mysql_get_client_info(),'-dev',true); ?></span>
                </dd>                
            </dl>            
        </div>
    </body>
</html>