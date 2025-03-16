<?php

namespace App\Overrides\Database;

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;
use Illuminate\Support\Facades\DB;

class Blueprint extends BaseBlueprint
{
    public function autoTimestamps($precision = 0)
    {
        $this->timestamp('created_at', $precision)->useCurrent();
        $this->timestamp('updated_at', $precision)->nullable()->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'));
    }
}