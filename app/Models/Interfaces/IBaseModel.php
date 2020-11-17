<?php

namespace App\Models\Interfaces;

interface IBaseModel {
    public const FORMAT_DATETIME = 'datetime:Y-m-d H:i:s';
    public const FORMAT_DATE = 'datetime:Y-m-d';
    public const FORMAT_TIME = 'datetime:H:i:s';
}