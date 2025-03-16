<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blueprint::macro('autoTimestamps', function ($precision = 0) {
            /** @var Blueprint $this */
            $this->timestamp('created_at', $precision)->useCurrent();
            $this->timestamp('updated_at', $precision)->nullable()->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'));
        });

        Blueprint::macro('unsignedId', function ($column = 'id') {
            /** @var Blueprint $this */
            $this->unsignedInteger($column)->autoIncrement();
        });

        Blueprint::macro('unsignedForeignId', function ($column) {
            /** @var Blueprint $this */
            return $this->addColumnDefinition(new ForeignIdColumnDefinition($this, [
                'type' => 'integer',
                'name' => $column,
                'autoIncrement' => false,
                'unsigned' => true,
            ]));
        });
    }
}
