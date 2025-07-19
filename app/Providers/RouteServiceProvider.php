<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFromDirectory('routes/api', 'api', 'api/v1', ['api', 'auth:sanctum']);
        $this->loadRoutesFromDirectory('routes/web', 'web', '', ['web']);
    }

    protected function loadRoutesFromDirectory(string $directory, string $type, string $prefix, array $middleware = []): void
    {
        $basePath = base_path($directory);
        if (!is_dir($basePath)) {
            return;
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($basePath)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $namePrefix = $type . '.' . $file->getBasename('.php');
                $routePrefix = $prefix ? $prefix . '/' . $file->getBasename('.php') : '';

                Route::middleware($middleware)
                    ->prefix($routePrefix)
                    ->as($namePrefix . '.')
                    ->group($file->getPathname());
            }
        }
    }
}
