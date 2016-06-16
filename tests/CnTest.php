<?php


class CnTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected $json_a;
    protected $id = 0;
    protected $qaurl = 'qa.migosoft.com';
    protected $url = 'cn.migoapp.com';

    public static function browsers()
    {
        return array(
            array(
//                'host'                => '127.0.0.1',
                'host'                => '10.0.2.211',
                'port'                => 4444,
                'browser'             => 'chrome test browser',
//                'browserName' => 'chrome',
                'browserName'         => 'firefox',
                'desiredCapabilities' => array('marionette' => true),
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
          }]
        }';

        $this->json_a = json_decode($json, true);
    }

    public function xtest_assert()
    {
        $this->currentWindow()->maximize();
        $this->url("/auth/");
        sleep(3);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(3);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(3);
        $this->byXPath("//div[3]/div/div[2]/div[2]/div/a")->click();
        sleep(3);
        $this->byCssSelector("a[name=\"5\"] > span.company-name")->click();
        sleep(3);
        $this->byCssSelector("button.close")->click();
        sleep(3);
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
        sleep(3);
        $this->byXPath("(//button[@type='button'])[3]")->click();
        sleep(3);
        $this->byLinkText("登出")->click();
    }

    public function test_blejeans()
    {
        $this->currentWindow()->maximize();
        $this->url("/auth/");
        sleep(10);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(3);
        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(10);
        $this->byXPath("//div[3]/div/div[2]/div[2]/div/a")->click();
        sleep(3);
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->id]['company_id'] . "\"] > span.company-name")->click();
        sleep(3);
        $this->byCssSelector("button.close")->click();
        sleep(3);
        $this->url('https://di.' . $this->url . '/app/#/');
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();;
        try {
            $this->assertNotEquals(' ', $assert);
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $assert = array('Assert Fail');
            array_push($assert, $e->__toString());
        }
        sleep(3);
        $this->byXPath("(//button[@type='button'])[3]")->click();
        sleep(3);
        $this->byLinkText("登出")->click();
        sleep(3);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $this->id);
        sleep(10);

    }
    
    public function test_migo()
    {
        $this->url('http://' . $this->qaurl . '/test/getcount/');
        sleep(3);
        $count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$count);
        fwrite(STDERR, $count);
        $this->currentWindow()->maximize();
        $this->url("/auth/");
        sleep(10);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(10);

        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(3);
        $this->byXPath("//div[3]/div/div[2]/div[2]/div/a")->click();
        sleep(3);
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$count]['company_id'] . "\"] > span.company-name")->click();
        sleep(3);
        $this->byCssSelector("button.close")->click();
        sleep(3);
        $this->url('https://di.' . $this->url . '/app/#/');
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $assert = array('Assert Fail');
            array_push($assert, $e->__toString());
        }
        sleep(3);
        $this->byXPath("(//button[@type='button'])[3]")->click();
        sleep(3);
        $this->byLinkText("登出")->click();
        sleep(3);
        fwrite(STDERR, $count);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $count);
        sleep(10);
    }

    public function test_migochaoshi()
    {
        $this->url("http://" . $this->qaurl . '/test/getcount/');
        sleep(3);
        $count = $this->byCssSelector("body")->text();
        fwrite(STDERR, "\n" . ++$count);
        fwrite(STDERR, $count);
        $this->currentWindow()->maximize();
        $this->url("/auth/");
        sleep(10);
        $this->byCssSelector("input[id=companyName]")->value("migo");
        $this->byCssSelector("input[id=account]")->value("migotp_jamesliang");
        $this->byCssSelector("input[id=password]")->value("admin156*");
        $this->byXPath("//input[@value='登入']")->click();
        sleep(10);

        if ($this->byLinkText("确认")->displayed()) {
            $this->byLinkText("确认")->click();
        }
        sleep(3);
        $this->byXPath("//div[3]/div/div[2]/div[2]/div/a")->click();
        sleep(3);
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$count]['company_id'] . "\"] > span.company-name")->click();
        sleep(3);
        $this->byCssSelector("button.close")->click();
        sleep(3);
        $this->url('https://di.' . $this->url . '/app/#/');
        sleep(10);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();
        try {
            $this->assertNotEquals(' ', $assert);
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $assert = array('Assert Fail');
            array_push($assert, $e->__toString());
        }
        sleep(3);
        $this->byXPath("(//button[@type='button'])[3]")->click();
        sleep(3);
        $this->byLinkText("登出")->click();
        sleep(3);
        fwrite(STDERR, $count, true);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=' . $count);
        sleep(10);
    }

}

