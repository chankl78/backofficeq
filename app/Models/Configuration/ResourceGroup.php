<?php

namespace App\Models\Configuration;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;

class ResourceGroup extends Model
{
    use Encryptable;

    protected $encryptable = ['enabled', 'trial', 'trialstartdate', 'trialenddate'];
}
