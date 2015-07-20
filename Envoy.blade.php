@servers(['web' => 'ssh root@10.0.6.224'])

@task('deploy', ['on' => 'web'])
    cd /var/www/html/QA
    php artisan down
    git stash
    git pull -v --progress "origin" master
    composer install
    php artisan config:cache
    php artisan up
@endtask

@after
    @slack('https://hooks.slack.com/services/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', '#qa', 'qa.migosoft.com更新')
@endafter