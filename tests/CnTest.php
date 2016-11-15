<?php


class CnTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected $json_a, $count;
    protected $id = 0;
//    protected $qaurl = 'qa.com';
    protected $qaurl = 'qa.migosoft.com';
    protected $url = 'cn.migoapp.com';
    protected $company_name;

    public static function browsers()
    {
        return array(
            array(
//                'host'                => '127.0.0.1',
                'host'        => '10.0.2.211',
                'port'        => 4444,
                'browser'     => 'chrome test browser',
                'browserName' => 'chrome',
//                'browserName'         => 'firefox',
//                'desiredCapabilities' => array('marionette' => true),
            ),
        );
    }

    public function setup()
    {
        $this->setBrowserUrl('https://sysmgr.' . $this->url);
        $json = '{
                 "data": [
          {
            "company_id": 1,
            "company_name": "CRM領導者 -> MIGO功典資訊1"
          },
          {
            "company_id": 1023,
            "company_name": "MIGO超市 (migochaoshi)2"
          },
          {
            "company_id": 1024,
            "company_name": "MIGO服饰 (migofashion)3"
          },
          {
            "company_id": 5,
            "company_name": "AbleJeans4"
          },
          {
            "company_id": 6,
            "company_name": "Ordifen5"
          },
          {
            "company_id": 2043,
            "company_name": "步步高 (bubugao)7"
          },
          {
            "company_id": 2044,
            "company_name": "大成 (dacheng)8"
          },
          {
            "company_id": 2042,
            "company_name": "返利网 (FanLi)9"
          },
          {
            "company_id": 2045,
            "company_name": "富莉富蕾 (follifollie)10"
          },
          {
            "company_id": 2054,
            "company_name": "富莉富蕾线下 (follifollieoffline)11"
          },
          {
            "company_id": 2051,
            "company_name": "廣州新光百貨 (simgo)12"
          },
          {
            "company_id": 2047,
            "company_name": "杭州联华华商 (lianhua)13"
          },
          {
            "company_id": 2050,
            "company_name": "杭州联华华商分业态 (lianhua2)14"
          },
          {
            "company_id": 3055,
            "company_name": "合肥百大 (hefeibaida)15"
          },
          {
            "company_id": 1027,
            "company_name": "华冠百货 (huaguan)17"
          },
          {
            "company_id": 1030,
            "company_name": "华冠超市 (huaguansm)18"
          },
          {
            "company_id": 2052,
            "company_name": "季候風服飾 (seasonwind)19"
          },
          {
            "company_id": 2053,
            "company_name": "季候風服飾臣楓 (seasonwindcf)20"
          },
          {
            "company_id": 2033,
            "company_name": "佳乐家百货 (jialejia)21"
          },
          {
            "company_id": 3057,
            "company_name": "佳乐家超市 (jlj)22"
          },
          {
            "company_id": 1026,
            "company_name": "九派百货 (kawaii)23"
          },
          {
            "company_id": 1015,
            "company_name": "宽广 (kg)24"
          },
          {
            "company_id": 4,
            "company_name": "丽婴房 (Lesenphants)25"
          },
          {
            "company_id": 1012,
            "company_name": "美食林 (Meishilin)26"
          },
          {
            "company_id": 2055,
            "company_name": "山东富群商业 (fuqun)27"
          },
          {
            "company_id": 1020,
            "company_name": "山東阳光百货 (sunshine)28"
          },
          {
            "company_id": 9,
            "company_name": "上海曼都美容美发 (Mentor)29"
          },
          {
            "company_id": 2038,
            "company_name": "岁宝百货 (shirble)30"
          },
          {
            "company_id": 3056,
            "company_name": "岁宝百货门店版 (shirblestore)31"
          },
          {
            "company_id": 2037,
            "company_name": "王府井百货 (wfj)32"
          },
          {
            "company_id": 2048,
            "company_name": "西单商场 (xidan)33"
          },
          {
            "company_id": 3058,
            "company_name": "新煮意餐饮 (xinzhuyi)34"
          },
          {
            "company_id": 1031,
            "company_name": "亚博松 (yabosong)35"
          },
          {
            "company_id": 2046,
            "company_name": "银泰百货 (intime)36"
          },
          {
            "company_id": 2035,
            "company_name": "云海肴餐饮 (yhy)37"
          },
          {
            "company_id": 2034,
            "company_name": "中百百货 (zhongbai)38"
          },
          {
            "company_id": 1011,
            "company_name": "舟山新茂 (ZhouShanXM)39"
          },
          {
            "company_id": 3065,
            "company_name": "惠友超市 (huiyou)40"
          },
          {
            "company_id": 3067,
            "company_name": "埃克斯咖啡 (aix)41"
          },
          {
            "company_id": 3062,
            "company_name": "新百伦贸易 EC (NewbalanceCNEC)42"
          },
          {
            "company_id": 3068,
            "company_name": "廣州新光百貨海珠店 (simgohj)43"
          },
          {
            "company_id": 3069,
            "company_name": "廣州新光百貨康王店 (simgokw)44"
          },
          {
            "company_id": 3071,
            "company_name": "资和信 (zihexin)45"
          },
          {
            "company_id": 3072,
            "company_name": "山东银座商城 (InzoneCN)46"
          },
          {
            "company_id": 3074,
            "company_name": "山东银座-百货 (inzonebh)47"
          },
          {
            "company_id": 3075,
            "company_name": "山东银座-超市 (inzonecs)48"
          },
          {
            "company_id": 3077,
            "company_name": "兴龙广缘 (guangyuan)49"
          },
          {
            "company_id": 3078,
            "company_name": "纪念日百货 (jinianri)50"
          },
          {
            "company_id": 3073,
            "company_name": "利客来集团 (likelai)51"
          },
          {
            "company_id": 3079,
            "company_name": "维多利百货国际广场 (wdlguoji)52"
          }
        ]
        }';

        $this->json_a = json_decode($json, true);
    }

    public function xtest_assert()
    {
        $this->currentWindow()->maximize();
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        sleep(5);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->byXPath("//div[3]/div/div[2]/div[2]/div/a/i")->click();
        sleep(5);
        $this->byCssSelector("a[name=\"5\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url("https://di.cn.migoapp.com/app/#/");
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        fwrite(STDERR, print_r($assert, true));
        fwrite(STDERR, $assert . "\n");
        try {
            $this->assertNotEquals(' ', $assert);;
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            array_push($this->verificationErrors, $e->__toString());
        }
        sleep(5);
        $this->byXPath("(//button[@type='button'])[3]")->click();
        sleep(5);
        $this->byLinkText("登出")->click();
    }

    public function save($the_string)
    {
        if (strstr($the_string, "Success")) {
            $this->url('http://' . $this->qaurl . '/test/setreport?company=' . $this->json_a['data'][$this->count]['company_name'] . '&result=PASS&server=CN&note1=' . $the_string . '&note2=' . $this->json_a['data'][$this->count]['company_id'] . '&note3=' . $this->company_name);
            sleep(5);
        } else {
            $this->url('http://' . $this->qaurl . '/test/setreport?company=' . $this->json_a['data'][$this->count]['company_name'] . '&result=FAIL&server=CN&note1=' . $the_string . '&note2=' . $this->json_a['data'][$this->count]['company_id'] . '&note3=' . $this->company_name);
            sleep(5);
        }
    }

    public function test_migo1()
    {
        $this->count = $this->id;
        $this->url('http://' . $this->qaurl . '/test/resetreport/?server=CN');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=0');
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_migochaoshi2()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_migofashion3()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_ablejeans4()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector('a.btn-sm.btn-change-company')->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector('a.btn-sm.btn-change-company')->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        //fwrite(STDERR, 'company_name = '.$this->company_name);
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();;
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_ordifen5()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

//    public function test_honghailongteng2_6()
//    {
//        $this->url('http://' . $this->qaurl . '/test/getcount/');
//        $this->currentWindow()->maximize();
//        sleep(5);
//        $this->count = $this->byCssSelector("body")->text();
//        fwrite(STDERR, "\n" . ++$this->count);
//        fwrite(STDERR, $this->count);
//        sleep(5);
//        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
//        sleep(5);
//        $this->url('https://sysmgr.' . $this->url . '/auth/');
//        $this->waitUntil(function () {
//            if ($this->byXPath("//input[@value='登入']")->displayed()) {
//                return true;
//            }
//            return null;
//        }, 60000);
//        $this->byCssSelector("input[id=companyName]")->value("migo");
//        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
//        $this->byCssSelector("input[id=password]")->value("admin156*");
//        $this->byXPath("//input[@value='登入']")->click();
//        sleep(5);
//        if ($this->byLinkText("确认")->displayed()) {
//            $this->byLinkText("确认")->click();
//        }
//        sleep(5);
//        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
//        sleep(5);
//        $this->waitUntil(function () {
//            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
//                return true;
//            }
//            return null;
//        }, 60000);
//        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
//        sleep(5);
//        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
//        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
//        sleep(5);
//        $this->byCssSelector("button.close")->click();
//        sleep(5);
//        $this->url('https://di.' . $this->url . '/app/#/');
//        $this->waitUntil(function () {
//            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
//                return true;
//            }
//            return null;
//        }, 60000);
//        sleep(5);
//        $assert = $this->byCssSelector("div.revenue-value > span")->text();
//        try {
//            $this->assertNotEquals(' ', $assert);
//            throw new PHPUnit_Framework_AssertionFailedError("Success");
//        } catch (PHPUnit_Framework_AssertionFailedError $e) {
//            $this->save($e->toString());
//        }
//    }

    public function test_bubugao7()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_dacheng8()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_FanLi9()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_follifollie10()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_follifollieoffline11()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_simgo12()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_lianhua13()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_lianhua2_14()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_hefeibaida15()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

//    public function test_honghailongteng16()
//    {
//        $this->url('http://' . $this->qaurl . '/test/getcount/');
//        $this->currentWindow()->maximize();
//        sleep(5);
//        $this->count = $this->byCssSelector("body")->text();
//        fwrite(STDERR, "\n" . ++$this->count);
//        fwrite(STDERR, $this->count);
//        sleep(5);
//        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
//        sleep(5);
//        $this->url('https://sysmgr.' . $this->url . '/auth/');
//        $this->waitUntil(function () {
//            if ($this->byXPath("//input[@value='登入']")->displayed()) {
//                return true;
//            }
//            return null;
//        }, 60000);
//        $this->byCssSelector("input[id=companyName]")->value("migo");
//        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
//        $this->byCssSelector("input[id=password]")->value("admin156*");
//        $this->byXPath("//input[@value='登入']")->click();
//        sleep(5);
//        if ($this->byLinkText("确认")->displayed()) {
//            $this->byLinkText("确认")->click();
//        }
//        sleep(5);
//        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
//        sleep(5);
//        $this->waitUntil(function () {
//            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
//                return true;
//            }
//            return null;
//        }, 60000);
//        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
//        sleep(5);
//        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
//        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
//        sleep(5);
//        $this->byCssSelector("button.close")->click();
//        sleep(5);
//        $this->url('https://di.' . $this->url . '/app/#/');
//        $this->waitUntil(function () {
//            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
//                return true;
//            }
//            return null;
//        }, 60000);
//        sleep(5);
//        $assert = $this->byCssSelector("div.revenue-value > span")->text();
//        try {
//            $this->assertNotEquals(' ', $assert);
//            throw new PHPUnit_Framework_AssertionFailedError("Success");
//        } catch (PHPUnit_Framework_AssertionFailedError $e) {
//            $this->save($e->toString());
//        }
//    }

    public function test_huaguan17()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_huaguansm18()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_seasonwind19()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_seasonwindcf20()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_jialejia21()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_jlj22()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_kawaii23()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_kg24()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_Lesenphants25()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_Meishilin26()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_fuqun27()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_sunshine28()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_Mentor29()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_shirble30()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_shirblestore31()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_wfj32()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_xidan33()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_xinzhuyi34()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_yaboson35()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_intime36()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_yhy37()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_zhongbai38()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(5);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_ZhouShanXM39()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_huiyou40()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_aix41()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_NewbalanceCNEC42()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_simgohj43()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_simgokw44()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_zihexin45()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_InzoneCN46()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_inzonebh47()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_inzonecs48()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_guangyuan49()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_jinianri50()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_likelai51()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }

    public function test_wdlguoji52()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        $this->currentWindow()->maximize();
        sleep(5);
        $this->count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$this->count);
        fwrite(STDERR, $this->count);
        sleep(5);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->count);
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/');
        $this->waitUntil(function () {
            if ($this->byXPath("//input[@value='登入']")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(5);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(5);
        $this->waitUntil(function () {
            if ($this->byCssSelector("i.icon-migo-icon-change-company")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector("i.icon-migo-icon-change-company")->click();
        sleep(5);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(5);
        $this->byCssSelector("button.close")->click();
        sleep(5);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
    }
}
