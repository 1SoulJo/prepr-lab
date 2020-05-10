<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'labs';

    public function getMapUrl() {
        return "https://maps.google.com/?q={$this->getAddressString()}";
    }

    public function getAddressString() {
        return "{$this->address1}+{$this->city}+{$this->state}+{$this->zip}";
    }
}
