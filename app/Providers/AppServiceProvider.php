<?php

namespace App\Providers;

use App\Core\Query\Kunjungan\KunjunganQueryInterface;
use App\Core\Repository\Kunjungan\RepositoryKunjunganInterface;
use App\Infrastructure\Query\MySQL\KunjunganQueryMySQL;
use App\Infrastructure\Repository\MySQL\RepositoryKunjunganMySQL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RepositoryKunjunganInterface::class, RepositoryKunjunganMySQL::class);
        $this->app->bind(KunjunganQueryInterface::class, KunjunganQueryMySQL::class);
    }
}
