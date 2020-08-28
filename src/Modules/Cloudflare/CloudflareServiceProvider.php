<?php namespace Eyeweb\MissionControl\Modules\Cloudflare;

use \GuzzleHttp\Client;
use \Illuminate\Support\ServiceProvider;

/**
 * Class CloudflareServiceProvider
 * @package Eyeweb\MissionControl\Modules\Cloudflare
 */
class CloudflareServiceProvider extends ServiceProvider
{
    /**
     * Register required bindings
     */
    public function register()
    {
        $this->app->bind('cloudflare', function() {
            $client = new Client([
                'base_uri' => 'https://api.cloudflare.com/client/v4/',
                'headers' => [
                    'X-Auth-Email' => env('CLOUDFLARE_EMAIL'),
                    'X-Auth-Key' => env('CLOUDFLARE_API_KEY')
                ]
            ]);
            return new CloudflareAPI($client);
        });
    }
}
