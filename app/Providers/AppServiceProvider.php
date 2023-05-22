<?php

namespace App\Providers;

use App\Models\Chapter;
use Illuminate\Support\ServiceProvider;
use App\Models\Season;
use App\Observers\ChapterObserver;
use App\Observers\SeasonObserver;

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
        Season::observe(SeasonObserver::class);  
        Chapter::observe(ChapterObserver::class);
    }
}
