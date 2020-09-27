<?php

namespace App\Models\Interfaces;

interface IBaseUserModel {
    public const DEFAULT_LANGUE = 'en';

    public const CONFIRM_TOKEN = 32;

    public const COUNTRY_LENGTH = 2;

    public const REGEX_EMAIL = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';

    public const REGEX_PASSWORD = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
    
    public const REGEX_UUID = '^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$';
    
    /**
     * "+" is required, first digit is not "0"
     */
    public const REGEX_PHONE = '/^[\+][1-9]{1}[\d]{9,13}$/';

    public const DEFAULT_CURRENCY = 'usd';
    
    public const SECRET_KEY_LENGTH = 32;
    
}