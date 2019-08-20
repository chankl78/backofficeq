<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Encryptable;

class ConfigurationmLicense extends Model
{
    protected $table = 'Configuration_m_License';
    use Encryptable;

    protected $encryptable = ['company', 'licenseno', 'noofusers', 'noofbranches', 'trial', 'trialstartdate', 'trialenddate'];
}
