<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Implementations\CourseRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
    }

    public function boot() {}
}
