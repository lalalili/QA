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
            "company_id": 5,
            "company_name": "AbleJeans"
          },
          {
            "company_id": 1,
            "company_name": "CRM領導者 -> MIGO功典資訊"
          },
          {
            "company_id": 1023,
            "company_name": "MIGO超市 (migochaoshi)"
          },
          {
            "company_id": 1024,
            "company_name": "MIGO服饰 (migofashion)"
          },
          {
            "company_id": 6,
            "company_name": "Ordifen"
          },
          {
            "company_id": 2032,
            "company_name": "北京洪海龙腾电子商务 (honghailongteng2)"
          },
          {
            "company_id": 2043,
            "company_name": "步步高 (bubugao)"
          },
          {
            "company_id": 2044,
            "company_name": "大成 (dacheng)"
          },
          {
            "company_id": 2042,
            "company_name": "返利网 (FanLi)"
          },
          {
            "company_id": 2045,
            "company_name": "富莉富蕾 (follifollie)"
          },
          {
            "company_id": 2054,
            "company_name": "富莉富蕾线下 (follifollieoffline)"
          },
          {
            "company_id": 2051,
            "company_name": "廣州新光百貨 (simgo)"
          },
          {
            "company_id": 2047,
            "company_name": "杭州联华华商 (lianhua)"
          },
          {
            "company_id": 2050,
            "company_name": "杭州联华华商分业态 (lianhua2)"
          },
          {
            "company_id": 3055,
            "company_name": "合肥百大 (hefeibaida)"
          },
          {
            "company_id": 1029,
            "company_name": "洪海龍騰 (honghailongteng)"
          },
          {
            "company_id": 1027,
            "company_name": "华冠百货 (huaguan)"
          },
          {
            "company_id": 1030,
            "company_name": "华冠超市 (huaguansm)"
          },
          {
            "company_id": 2052,
            "company_name": "季候風服飾 (seasonwind)"
          },
          {
            "company_id": 2053,
            "company_name": "季候風服飾臣楓 (seasonwindcf)"
          },
          {
            "company_id": 2033,
            "company_name": "佳乐家百货 (jialejia)"
          },
          {
            "company_id": 3057,
            "company_name": "佳乐家超市 (jlj)"
          },
          {
            "company_id": 1026,
            "company_name": "九派百货 (kawaii)"
          },
          {
            "company_id": 1015,
            "company_name": "宽广 (kg)"
          },
          {
            "company_id": 4,
            "company_name": "丽婴房 (Lesenphants)"
          },
          {
            "company_id": 1012,
            "company_name": "美食林 (Meishilin)"
          },
          {
            "company_id": 2055,
            "company_name": "山东富群商业 (fuqun)"
          },
          {
            "company_id": 1020,
            "company_name": "山東阳光百货 (sunshine)"
          },
          {
            "company_id": 9,
            "company_name": "上海曼都美容美发 (Mentor)"
          },
          {
            "company_id": 2038,
            "company_name": "岁宝百货 (shirble)"
          },
          {
            "company_id": 3056,
            "company_name": "岁宝百货门店版 (shirblestore)"
          },
          {
            "company_id": 2037,
            "company_name": "王府井百货 (wfj)"
          },
          {
            "company_id": 2048,
            "company_name": "西单商场 (xidan)"
          },
          {
            "company_id": 3058,
            "company_name": "新煮意餐饮 (xinzhuyi)"
          },
          {
            "company_id": 1031,
            "company_name": "亚博松 (yabosong)"
          },
          {
            "company_id": 2046,
            "company_name": "银泰百货 (intime)"
          },
          {
            "company_id": 2035,
            "company_name": "云海肴餐饮 (yhy)"
          },
          {
            "company_id": 2034,
            "company_name": "中百百货 (zhongbai)"
          },
          {
            "company_id": 1011,
            "company_name": "舟山新茂 (ZhouShanXM)"
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
            $this->url('http://' . $this->qaurl . '/test/setreport?company=' . $this->json_a['data'][$this->count]['company_name'] . '&result=PASS&server=CN&note1=' . $the_string . '&note2=' . $this->json_a['data'][$this->count]['company_id'].'&note3='.$this->company_name);
            sleep(5);
        } else {
            $this->url('http://' . $this->qaurl . '/test/setreport?company=' . $this->json_a['data'][$this->count]['company_name'] . '&result=FAIL&server=CN&note1=' . $the_string. '&note2=' . $this->json_a['data'][$this->count]['company_id'].'&note3='.$this->company_name);
            sleep(5);
        }
    }

    public function test_ablejeans()
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

    public function test_migo()
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

    public function test_migochaoshi()
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

    public function test_migofashion()
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

    public function test_ordifen()
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

    public function test_honghailongteng2()
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

    public function test_bubugao()
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

    public function test_dacheng()
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

    public function test_FanLi()
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

    public function test_follifollie()
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

    public function test_follifollieoffline()
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

    public function test_simgo()
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

    public function test_lianhua()
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

    public function test_lianhua2()
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

    public function test_hefeibaida()
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

    public function test_honghailongteng()
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

    public function test_huaguan()
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

    public function test_huaguansm()
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

    public function test_seasonwind()
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

    public function test_seasonwindcf()
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

    public function test_jialejia()
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

    public function test_jlj()
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

    public function test_kawaii()
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

    public function test_kg()
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

    public function test_Lesenphants()
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

    public function test_Meishilin()
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

    public function test_fuqun()
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

    public function test_sunshine()
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

    public function test_Mentor()
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

    public function test_shirble()
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

    public function test_shirblestore()
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

    public function test_wfj()
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

    public function test_xidan()
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

    public function test_xinzhuyi()
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

    public function test_yaboson()
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

    public function test_intime()
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

    public function test_yhy()
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

    public function test_zhongbai()
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

    public function test_ZhouShanXM()
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
}
