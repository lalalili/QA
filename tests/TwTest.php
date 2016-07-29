<?php


class TwTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected $json_a, $count;
    protected $id = 0;
//    protected $qaurl = 'qa.com';
    protected $qaurl = 'qa.migosoft.com';
    protected $url = 'tw.migoapp.com';
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
            "company_id": 2,
            "company_name": "Kuan-Guang Supermarket2"
          },
          {
            "company_id": 1026,
            "company_name": "amai (amai)3"
          },
          {
            "company_id": 1040,
            "company_name": "Memoriki Ltd (memoriki)4"
          },
          {
            "company_id": 22,
            "company_name": "MIGO餐廳 (migorestaurant)5"
          },
          {
            "company_id": 1027,
            "company_name": "TBSPRODUCT (tbsproduct)6"
          },
          {
            "company_id": 11,
            "company_name": "The Body Shop (tbs)7"
          },
          {
            "company_id": 6,
            "company_name": "三禾衣料坊 (circle)8"
          },
          {
            "company_id": 17,
            "company_name": "中華航空 (cal)9"
          },
          {
            "company_id": 1033,
            "company_name": "台灣紐巴倫 (newbalance)10"
          },
          {
            "company_id": 1038,
            "company_name": "台灣紐巴倫Wifi (newbalancewifi)11"
          },
          {
            "company_id": 1023,
            "company_name": "布魯尼 (brunii)12"
          },
          {
            "company_id": 1024,
            "company_name": "任開數位媒體 (citiesocial)13"
          },
          {
            "company_id": 14,
            "company_name": "安麗日用品 (amway)14"
          },
          {
            "company_id": 13,
            "company_name": "里仁 (leezenco)15"
          },
          {
            "company_id": 1030,
            "company_name": "亞卡西雅 (unt)16"
          },
          {
            "company_id": 1031,
            "company_name": "幸福日子 (niceday)17"
          },
          {
            "company_id": 1032,
            "company_name": "肯園國際 (cango)18"
          },
          {
            "company_id": 1029,
            "company_name": "美合國際 (86shop)19"
          },
          {
            "company_id": 1041,
            "company_name": "耐德科技 (shopping99)20"
          },
          {
            "company_id": 10,
            "company_name": "特力屋(股)公司 (testrite)21"
          },
          {
            "company_id": 3,
            "company_name": "雀巢POS (nestletw)22"
          },
          {
            "company_id": 9,
            "company_name": "雀巢膠囊咖啡EC (nestletwec)23"
          },
          {
            "company_id": 1034,
            "company_name": "博思科技 (jumplife)24"
          },
          {
            "company_id": 1037,
            "company_name": "晶碩光學 (pegavision)25"
          },
          {
            "company_id": 1036,
            "company_name": "晶綺科技 (gamedreamer)26"
          },
          {
            "company_id": 1028,
            "company_name": "最愛新鮮 (i3fresh)27"
          },
          {
            "company_id": 1039,
            "company_name": "買東西購物中心 (udn)28"
          },
          {
            "company_id": 1025,
            "company_name": "隆中網絡 (pubgame)29"
          },
          {
            "company_id": 20,
            "company_name": "雲朗觀光 (ldcgroup)30"
          },
          {
            "company_id": 15,
            "company_name": "達博企業社 (double)31"
          },
          {
            "company_id": 1035,
            "company_name": "酷玩線上 (coolplay)32"
          },
          {
            "company_id": 7,
            "company_name": "寬廣測試33"
          },
          {
            "company_id": 4,
            "company_name": "黛安芬 (triumph)34"
          },
          {
            "company_id": 1043,
            "company_name": "亞卡西雅 web trk (untweb)35"
          },
          {
            "company_id": 1042,
            "company_name": "任開數位媒體 web trk (citiesocialweb)36"
          }
        ]
        }';

        $this->json_a = json_decode($json, true);
    }

    public function save($the_string)
    {
        if (strstr($the_string, "Success")) {
            $this->url('http://' . $this->qaurl . '/test/setreport?company=' . $this->json_a['data'][$this->count]['company_name'] . '&result=PASS&server=TW&note1=' . $the_string . '&note2=' . $this->json_a['data'][$this->count]['company_id'] . '&note3=' . $this->company_name);
            sleep(5);
        } else {
            $this->url('http://' . $this->qaurl . '/test/setreport?company=' . $this->json_a['data'][$this->count]['company_name'] . '&result=FAIL&server=TW&note1=' . $the_string . '&note2=' . $this->json_a['data'][$this->count]['company_id'] . '&note3=' . $this->company_name);
            sleep(5);
        }
    }

    public function test_migo1()
    {
        $this->count = $this->id;
        $this->url('http://' . $this->qaurl . '/test/resetreport/?server=TW');
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
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

    public function test_kg2()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
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

    public function test_amai3()
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
        sleep(25);
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
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

    public function test_memoriki4()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
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

    public function test_migorestaurant5()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_tbsproduct6()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_tbs7()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_circle8()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_cal9()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_newbalanc10()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_newbalancewifi11()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_brunii12()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_citiesocial13()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_amway14()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_leezenco15()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_unt16()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_niceday17()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_cango18()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_86shop19()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_shopping9920()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_testrite21()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_nestletw22()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_nestletwec23()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_jumplife24()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_pegavision25()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_gamedreamer26()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_i3fresh27()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_udn28()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_pubgame29()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_ldcgroup30()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_double31()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_coolplay32()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_kgtest33()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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

    public function test_triumph34()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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
    
    public function test_untweb35()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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
    
    public function test_citiesocialweb36()
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
        if ($this->byLinkText("確認")->displayed()) {
            $this->byLinkText("確認")->click();
        }
        sleep(5);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
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
}
