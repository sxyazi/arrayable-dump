<?php

namespace Ika\ArrayableDump\Classes;

use Illuminate\Contracts\Support\Arrayable as ArrayableType;

class Arrayable
{
    public function __construct(ArrayableType $obj)
    {
        foreach ($obj->toArray() as $key => $value) {
            $this->{$key} = $value;
        }

        $this->__proto__ = get_class($obj);
    }
}
