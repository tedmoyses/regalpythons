<?php

require_once './vendor/autoload.php';

use Glomr\App\Application;
use Glomr\App\Command\Build;
use Symfony\Component\Console\Input\ArrayInput;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

$app = new Application();
$app->add(new Build);
$input = new ArrayInput(['command' => 'build']);
$app->setAutoExit(false);
$app ->run($input);

$client = S3Client::factory(['region' => 'eu-west-1', 'version' =>'2006-03-01']);
$replica = new AwsS3Adapter($client, 'www.regalpythons.com');

$source = new Local(__DIR__ . '/build');
$local = new Filesystem($source);
$remote = new Filesystem($replica, [
    'visibility' => 'public' 
]);

echo "Cleaning remote files...";
foreach($remote->listContents() as $file){
	if($file['type'] === 'file') $remote->delete($file['path']);
	if($file['type'] === 'dir') $remote->deleteDir($file['path']);
}
echo "Done!\n";

foreach($local->listContents('.', true) as $file){
	if($file['type'] === 'file') $remote->put($file['path'], $local->read($file['path'], ['visibility' => 'public']));
	echo "Pushed remote file: ${file['path']}\n";
}

