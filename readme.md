# QA
QA系統

##Web-UI Test
###Selenium Server 安裝需求
Java run time

>https://www.java.com/

selenium-server-standalone-x.xx.jar

>http://www.seleniumhq.org/download/

###安裝 Web Driver
Chrome Driver

>http://chromedriver.storage.googleapis.com/index.html

請下載適合的作業系統版本，解壓縮後跟 selenium server 放在同一目錄底下。

###起始 Selenium Server

```sh
java -jar selenium-server-standalone.jar
```

listen on 127.0.0.1:4444

###執行測試
下載 DIY

>https://github.com/lalalili/QA

將下列路徑加入Path

>\<diy>\vendor\bin

安裝測試所需套件
```sh
composer install
```

執行測試
```sh
cd \<diy>\

phpunit --testdox-html testResult.html
```
##Test File
>\<diy>\tests\CnTest.php

>\<diy>\tests\TwTest.php

###Configuration

    //站台網址
    protected $url = 'abc.xxxxxxx.com';
    //公司
    protected $company = 'xxxx';
    //帳號
    protected $user= 'xxxx';
    //密碼
    protected $password= 'xxxx';


