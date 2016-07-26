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
            "company_name": "CRM領導者 -> MIGO功典資訊"
          },
          {
            "company_id": 2,
            "company_name": "Kuan-Guang Supermarket"
          },
          {
            "company_id": 1026,
            "company_name": "amai (amai)"
          },
          {
            "company_id": 1040,
            "company_name": "Memoriki Ltd (memoriki)"
          },
          {
            "company_id": 22,
            "company_name": "MIGO餐廳 (migorestaurant)"
          },
          {
            "company_id": 1027,
            "company_name": "TBSPRODUCT (tbsproduct)"
          },
          {
            "company_id": 11,
            "company_name": "The Body Shop (tbs)"
          },
          {
            "company_id": 6,
            "company_name": "三禾衣料坊 (circle)"
          },
          {
            "company_id": 17,
            "company_name": "中華航空 (cal)"
          },
          {
            "company_id": 1033,
            "company_name": "台灣紐巴倫 (newbalance)"
          },
          {
            "company_id": 1038,
            "company_name": "台灣紐巴倫Wifi (newbalancewifi)"
          },
          {
            "company_id": 1023,
            "company_name": "布魯尼 (brunii)"
          },
          {
            "company_id": 1024,
            "company_name": "任開數位媒體 (citiesocial)"
          },
          {
            "company_id": 14,
            "company_name": "安麗日用品 (amway)"
          },
          {
            "company_id": 13,
            "company_name": "里仁 (leezenco)"
          },
          {
            "company_id": 1030,
            "company_name": "亞卡西雅 (unt)"
          },
          {
            "company_id": 1031,
            "company_name": "幸福日子 (niceday)"
          },
          {
            "company_id": 1032,
            "company_name": "肯園國際 (cango)"
          },
          {
            "company_id": 1029,
            "company_name": "美合國際 (86shop)"
          },
          {
            "company_id": 1041,
            "company_name": "耐德科技 (shopping99)"
          },
          {
            "company_id": 10,
            "company_name": "特力屋(股)公司 (testrite)"
          },
          {
            "company_id": 3,
            "company_name": "雀巢POS (nestletw)"
          },
          {
            "company_id": 9,
            "company_name": "雀巢膠囊咖啡EC (nestletwec)"
          },
          {
            "company_id": 1034,
            "company_name": "博思科技 (jumplife)"
          },
          {
            "company_id": 1037,
            "company_name": "晶碩光學 (pegavision)"
          },
          {
            "company_id": 1036,
            "company_name": "晶綺科技 (gamedreamer)"
          },
          {
            "company_id": 1028,
            "company_name": "最愛新鮮 (i3fresh)"
          },
          {
            "company_id": 1039,
            "company_name": "買東西購物中心 (udn)"
          },
          {
            "company_id": 1025,
            "company_name": "隆中網絡 (pubgame)"
          },
          {
            "company_id": 20,
            "company_name": "雲朗觀光 (ldcgroup)"
          },
          {
            "company_id": 15,
            "company_name": "達博企業社 (double)"
          },
          {
            "company_id": 1035,
            "company_name": "酷玩線上 (coolplay)"
          },
          {
            "company_id": 7,
            "company_name": "寬廣測試"
          },
          {
            "company_id": 4,
            "company_name": "黛安芬 (triumph)"
          }
        ]
        }';

        $this->json_a = json_decode($json, true);
    }

    public function test_amai()
    {
        $this->count = $this->id;
        $this->url('http://' . $this->qaurl . '/test/resetreport/?server=TW');
        $this->currentWindow()->maximize();
        sleep(15);
        $this->url('http://' . $this->qaurl . '/test/setcount/?count=0');
        sleep(15);
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
        sleep(15);
        $this->url('https://sysmgr.' . $this->url . '/auth/#/market');
        sleep(15);
        $this->waitUntil(function () {
            if ($this->byCssSelector('a.btn-sm.btn-change-company')->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        $this->byCssSelector('a.btn-sm.btn-change-company')->click();
        sleep(15);
        $this->company_name = $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->text();
        $this->byCssSelector("a[name=\"" . $this->json_a['data'][$this->count]['company_id'] . "\"] > span.company-name")->click();
        sleep(15);
        $this->byCssSelector("button.close")->click();
        sleep(15);
        $this->url('https://di.' . $this->url . '/app/#/');
        $this->waitUntil(function () {
            if ($this->byCssSelector("div.revenue-value > span")->displayed()) {
                return true;
            }
            return null;
        }, 60000);
        sleep(15);
        $assert = $this->byCssSelector("div.revenue-value > span")->text();;
        try {
            $this->assertNotEquals(' ', $assert);
            throw new PHPUnit_Framework_AssertionFailedError("Success");
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->save($e->toString());
        }
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

    public function test_memoriki()
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

    public function test_migorestaurant()
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

    public function test_tbsproduct()
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

    public function test_tbs()
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

    public function test_circle()
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

    public function test_cal()
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

    public function test_newbalanc()
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

    public function test_newbalancewifi()
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

    public function test_brunii()
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

    public function test_citiesocial()
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

    public function test_amway()
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

    public function test_leezenco()
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

    public function test_unt()
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

    public function test_niceday()
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

    public function test_cango()
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

    public function test_86shop()
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

    public function test_shopping99()
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

    public function test_testrite()
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

    public function test_nestletw()
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

    public function test_nestletwec()
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

    public function test_jumplife()
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

    public function test_pegavision()
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

    public function test_gamedreamer()
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

    public function test_i3fresh()
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

    public function test_udn()
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

    public function test_pubgame()
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

    public function test_ldcgroup()
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

    public function test_double()
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

    public function test_coolplay()
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

    public function test_kgtest()
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

    public function test_triumph()
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
