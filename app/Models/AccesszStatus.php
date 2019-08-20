<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccesszStatus extends Model
{
    protected $table = 'Access_z_Status';

    // public static function boot()
    // {
    //     static::updating(function ($record) {
    //         try {
    //             $dirty = $record->getDirty();
    //             foreach ($dirty as $field => $newdata) {
    //                 try {
    //                     $olddata = $record->getOriginal($field);
    //                     if ($olddata != $newdata) {
    //                         // LogsfLogs::postLogs('Update', 6, $record->id, ' - Access Types - From:  ' . $field . ' - From ' . $olddata . ' To: ' . $newdata, $olddata, $newdata, 'Success');
    //                     }
    //                 } catch (\Exception $e) {
    //                     // LogsfLogs::postLogs('Update', 6, $record->id, ' - Access Types - ' . $field . ' - ' . $e, $olddata, $newdata, 'Failed');
    //                 }
    //             }
    //             return true;
    //         } catch (\Exception $e) {
    //             // LogsfLogs::postLogs('Update', 6, $record->id, ' - Access Types- ' . $field . ' - ' . $e, $olddata, $newdata, 'Failed');
    //         }
    //     });
    // }
}
