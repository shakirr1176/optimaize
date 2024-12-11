<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Setting extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'name';
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'value',
    ];

    protected function value(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                try {
                    $fieldValue = decrypt($value);
                } catch (Exception $exception) {
                    $fieldValue = $value;
                }
                return $fieldValue;
            },
        );
    }
}
