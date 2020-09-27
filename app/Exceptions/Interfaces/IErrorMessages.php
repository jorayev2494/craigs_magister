<?php

namespace App\Exceptions\Interfaces;

interface IErrorMessages {
    public const INVALID_CREDENTIALS = 'invalid_credentials';

    public const MODEL_LOAD_ERROR = 'model_not_loaded';

    public const UNAUTHORIZED = 'unauthorized';

    public const MODEL_NOT_FOUND = 'model_not_found';

    public const MODEL_NOT_UPDATED = 'model_not_updated';

    public const MODEL_NOT_CREATED = 'model_not_created';

    public const MODEL_NOT_DELETED = 'model_not_deleted';

    public const UNAUTHENTICATED = 'unauthenticated';

    public const USER_NOT_FOUND = 'user_not_found';

    public const USER_NOT_EXIST = 'user_not_exist';

    public const EMAIL_NOT_EXIST = 'email_not_exist';

    public const USER_BLOCKED = 'user_blocked';

    public const ADMIN_NOT_FOUND = 'admin_not_found';

    public const ADMIN_NOT_EXIST = 'admin_not_exist';

    public const ADMIN_BLOCKED = 'admin_blocked';

    public const EMAIL_NOT_CONFIRMED = 'email_not_confirmed';

    public const TOKEN_NOT_PROVIDED = 'token_not_provided';

    public const TOKEN_EXPIRED = 'token_expired';

    public const TOKEN_INVALID = 'token_invalid';

    public const INVALID_TOKEN = 'invalid_token';

    public const NO_PERMISSIONS = 'no_permissions';

    public const DATA_NOT_FOUND = 'data_not_found';

    public const HTTP_NOT_FOUND = 'http_not_found';

    public const FILE_UPLOAD = 'error_during_uploading_file';

    public const DATA_IS_ALREADY_CREATED = 'data_is_already_created';

    public const POST_TOO_LARGE = 'post_too_large';

    public const ALREADY_REQUESTED_CHANGE_EMAIL = 'already_requested_email_change';

    public const BINDING_ERROR = 'binding_resolution_exception';

    public const BOT_USER_NOT_ADDED = 'bot_user_not_added';

    public const SOMETHING_WENT_WRONG = 'something_went_wrong';

    public const ACCESS_DENIED = 'access_denied';
}