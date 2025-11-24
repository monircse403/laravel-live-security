<?php

namespace monircse403\LiveSecurity\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendUsageAnalytics extends Command
{
    protected $signature = 'livesecurity:analytics';
    protected $description = 'Send anonymized usage stats to developer';

    public function handle()
    {
        $endpoint = config('livesecurity.analytics_endpoint', null);

        if (!$endpoint) {
            $this->info('Analytics endpoint not configured. Skipping.');
            return;
        }

        try {
            Http::post($endpoint, [
                'laravel_version' => app()->version(),
                'package_version' => '1.0.0',
                'timestamp' => now()->toDateTimeString(),
            ]);

            $this->info('Usage analytics sent.');
        } catch (\Exception $e) {
            $this->error('Could not send analytics: '.$e->getMessage());
        }
    }
}
