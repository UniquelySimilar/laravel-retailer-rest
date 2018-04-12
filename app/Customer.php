<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customerName',
        'contactLastName',
        'contactFirstName',
        'phone',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'postalCode',
        //'country',
        //'salesRepEmployeeNumber',
        'creditLimit'
    ];

    protected $appends = array('contactFullName');

    public function getContactFullNameAttribute()
    {
        return $this->contactLastName . ", " . $this->contactFirstName;
    }
}
