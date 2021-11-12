<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Slim\PDO\Database;
use Valitron\Validator;
use spark\drivers\Asset\AssetManager;
use spark\drivers\Auth\CurrentUser;
use spark\drivers\Auth\MySqlSessionHandler;
use spark\drivers\I18n\Locale;
use spark\drivers\Nav\BreadCrumbs;
use spark\drivers\Views\ThemeManager;
use spark\helpers\MonologWriter;
use spark\helpers\Registry;
use spark\helpers\Session;
use spark\models\Model;
use spark\models\OptionModel;

$min = (int) $app->config('internal.username_minlength');
if ($min > 0) {
    $min = $min - 1;
}
$max = (int) $app->config('internal.username_maxlength') - 1;

\Slim\Route::setDefaultConditions([
    'id' => '\d++',
    'username' => "[A-Za-z][A-Za-z_0-9]{{$min},{$max}}",
]);

// Valitron i18n
Validator::langDir(srcpath('drivers/I18n'));
Validator::lang('valitron');

// Set up monologger
$formatter = new LineFormatter;
$formatter->includeStacktraces();
$fileHandler = new StreamHandler(
    srcpath('var/logs/' . date('d-m-Y') . '.log')
);
$fileHandler->setFormatter($formatter);
$app->getLog()->setWriter(new MonologWriter([
    'handlers' => [$fileHandler],
]));

// Add options as a singelton
$app->container->singleton('composer', function () use ($composer) {
    return $composer;
});

// Add options as a singelton
$app->container->singleton('asset', function () use ($app) {
    return new AssetManager;
});

$app->container->singleton('registry', function () use ($app) {
    return new Registry;
