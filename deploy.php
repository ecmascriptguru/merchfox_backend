<?php
namespace Deployer;
require 'recipe/laravel.php';

// Configuration

set('ssh_type', 'native');
set('ssh_multiplexing', true);
set('branch', 'master');
set('keep_releases', 5);

set('repository', 'git@github.com:ecmascriptguru/word_fox_backend.git');

add('shared_files', [
	'.env'
]);
add('shared_dirs', [
	'storage'
]);

add('writable_dirs', [
	'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

// Servers

server('production', 'ec2-52-23-176-83.compute-1.amazonaws.com')
    ->user('ubuntu')
    ->identityFile('')
    ->set('deploy_path', '/var/www/html')
    ->pty(true);


// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm.service');
});
after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
