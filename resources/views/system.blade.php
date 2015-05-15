@extends('app')

@section('content')
<div id="wrapper">
    <!-- Navigation -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="page-header"></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="well">
                    <h3>工作日誌</h3>
                    <a class="alert-link" href="https://trello.com/b/MSh6I9n4/fae-qa" target="_blank">https://trello.com/b/MSh6I9n4/fae-qa</a>
                    <p><h5>FAE & QA工作日誌導入Trello</h5></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="well">
                    <h3>Bug 追蹤系統</h3>
                    <a class="alert-link" href="http://mantis.migosoft.comm" target="_blank">http://mantis.migosoft.com/</a>
                    <p><h5>系統使用Mantis</h5></p>
                    <p><h5>客製：回報流程，語系顯示</h5></p>
                    <p><h5>程式語言：PHP</h5></p>
                    <p><h5>資料庫：MySQL</h5></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="well">
                    <h3>知識庫</h3>
                    <a class="alert-link" href="http://kb.migosoft.com" target="_blank">http://kb.migosoft.com/</a>
                    <p><h5>系統使用DokuWiki</h5></p>
                    <p><h5>客製：SSO帳號與mantis共通，需登入後才能編修資料</h5><p>
                    <p><h5>程式語言：PHP</h5></p>
                    <p><h5>資料庫：MySQL</h5></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="well">
                    <h3>生日祝福系統</h3>
                    <p>祝福留言</p>
                    <a class="alert-link" href="http://wish.migocorp.com/make#/f=CindyHsu" target="_blank">http://wish.migocorp.com/make#/f=CindyHsu</a>
                    <p>祝福牆</p>
                    <a class="alert-link" href="http://wish.migocorp.com/#/t=CindyHsu" target="_blank">http://wish.migocorp.com/#/t=CindyHsu</a>
                    <p><h5>部門自行開發</h5></p>
                    <p><h5>程式語言：PHP (Laravel + AngularJS)</h5></p>
                    <p><h5>資料庫：MySQL</h5></p>
                    <p><h5>壽星生日前一週會用Email通知其他同事，壽星生日當天會收到祝福通知信，可以點選連結查看留言</h5></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="well">
                    <h3>QA公告系統</h3>
                    <p>祝福留言</p>
                    <a class="alert-link" href="https://best13.migosoft.com/faq/" target="_blank">https://qa.migosoft.com/</a>
                    <p><h5>部門自行開發</h5></p>
                    <p><h5>程式語言：Html前端 (Bootstrap)</h5></p>
                    <p><h5>Html與Windows排成管理工具整合</h5></p>
                    <p><h5>資訊整合平台</h5></p>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection