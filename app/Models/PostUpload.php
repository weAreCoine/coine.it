<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostUpload extends Pivot
{
    use HasCompositePrimaryKey;
}
