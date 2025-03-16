<?php

namespace App\Overrides\Facades;

use App\Overrides\Database\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema as BaseSchema;

class Schema extends BaseSchema
{
    private static function getBuilderWithCustomBlueprint(string $name): Builder
    {
        /** @var \Illuminate\Database\Schema\Builder $builder */
        $builder = static::$app['db']->connection($name)->getSchemaBuilder();
        $builder->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });

        return $builder;
    }

    public static function connection($name): Builder
    {
        return self::getBuilderWithCustomBlueprint($name);
    }
}
