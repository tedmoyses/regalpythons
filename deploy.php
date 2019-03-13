<?php

require_once './vendor/autoload.php';

use Glomr\App\Application;
use Glomr\App\Command\Build;
use Symfony\Component\Console\Input\ArrayInput;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;


/*
 * Create instance of Glomr App
 * Set options to use build command for production
 * Disable coloured output for logs
 */
$app = new Application();
$app->add(new Build);
$input = new ArrayInput([
	'command' => 'build',
	'--environment' => 'production',
	'--nocolour' => true
]);
$app->setAutoExit(false); //ensures we don't quit execution here
$app ->run($input);

/*
 * Create adapter for remote file destination
 * Ensuring remote files will be publicly visible 
 */
$client = S3Client::factory(['region' => 'eu-west-1', 'version' =>'2006-03-01']);
$replica = new AwsS3Adapter($client, 'www.regalpythons.com');
$remote = new Filesystem($replica, [
    'visibility' => 'public' 
]);


/*
 * Create adapter for local source files
 */
$source = new Local(__DIR__ . '/build');
$local = new Filesystem($source);

/*
 * Remove all remote files for a clean site with no stale files
 */
echo "Cleaning remote files...";
foreach($remote->listContents() as $file){
	if($file['type'] === 'file') $remote->delete($file['path']);
	if($file['type'] === 'dir') $remote->deleteDir($file['path']);
}
echo "Done!\n";

/*
 * Push each local file to the remote destinaion
 */
foreach($local->listContents(__DIR__, true) as $file){
	if($file['type'] === 'file') $remote->put($file['path'], $local->read($file['path'], ['visibility' => 'public']));
	echo "Pushed remote file: ${file['path']}\n";
}

