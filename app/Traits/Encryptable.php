<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait Encryptable
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::decryptString($value);
        }
        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encryptString($value);
        }
        return parent::setAttribute($key, $value);
    }

    public function toArray()
    {
        $array = parent::toArray();
        foreach ($this->encryptable as $key) {
            if (isset($array[$key])) {
                $array[$key] = $this->getAttribute($key);
            }
        }
        return $array;
    }
}
