<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Encryptable;

class ConfigurationmResourceGroup extends Model
{
    protected $table = 'Configuration_m_ResourceGroup';
    use Encryptable;

    protected $encryptable = ['enabled', 'trial', 'trialstartdate', 'trialenddate'];
}
