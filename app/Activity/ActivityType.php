<?php

namespace BookStack\Activity;

class ActivityType
{
    const PAGE_CREATE = 'page_create';
    const PAGE_UPDATE = 'page_update';
    const PAGE_DELETE = 'page_delete';
    const PAGE_RESTORE = 'page_restore';
    const PAGE_MOVE = 'page_move';

    const CHAPTER_CREATE = 'chapter_create';
    const CHAPTER_UPDATE = 'chapter_update';
    const CHAPTER_DELETE = 'chapter_delete';
    const CHAPTER_MOVE = 'chapter_move';

    const BOOK_CREATE = 'book_create';
    const BOOK_CREATE_FROM_CHAPTER = 'book_create_from_chapter';
    const BOOK_UPDATE = 'book_update';
    const BOOK_DELETE = 'book_delete';
    const BOOK_SORT = 'book_sort';

    const BOOKSHELF_CREATE = 'bookshelf_create';
    const BOOKSHELF_CREATE_FROM_BOOK = 'bookshelf_create_from_book';
    const BOOKSHELF_UPDATE = 'bookshelf_update';
    const BOOKSHELF_DELETE = 'bookshelf_delete';

    const COMMENTED_ON = 'commented_on';
    const COMMENT_CREATE = 'comment_create';
    const COMMENT_UPDATE = 'comment_update';
    const COMMENT_DELETE = 'comment_delete';

    const PERMISSIONS_UPDATE = 'permissions_update';

    const REVISION_RESTORE = 'revision_restore';
    const REVISION_DELETE = 'revision_delete';

    const SETTINGS_UPDATE = 'settings_update';
    const MAINTENANCE_ACTION_RUN = 'maintenance_action_run';

    const RECYCLE_BIN_EMPTY = 'recycle_bin_empty';
    const RECYCLE_BIN_RESTORE = 'recycle_bin_restore';
    const RECYCLE_BIN_DESTROY = 'recycle_bin_destroy';

    const USER_CREATE = 'user_create';
    const USER_UPDATE = 'user_update';
    const USER_DELETE = 'user_delete';

    const API_TOKEN_CREATE = 'api_token_create';
    const API_TOKEN_UPDATE = 'api_token_update';
    const API_TOKEN_DELETE = 'api_token_delete';

    const ROLE_CREATE = 'role_create';
    const ROLE_UPDATE = 'role_update';
    const ROLE_DELETE = 'role_delete';

    const AUTH_PASSWORD_RESET = 'auth_password_reset_request';
    const AUTH_PASSWORD_RESET_UPDATE = 'auth_password_reset_update';
    const AUTH_LOGIN = 'auth_login';
    const AUTH_REGISTER = 'auth_register';

    const MFA_SETUP_METHOD = 'mfa_setup_method';
    const MFA_REMOVE_METHOD = 'mfa_remove_method';

    const WEBHOOK_CREATE = 'webhook_create';
    const WEBHOOK_UPDATE = 'webhook_update';
    const WEBHOOK_DELETE = 'webhook_delete';

    const IMPORT_CREATE = 'import_create';
    const IMPORT_RUN = 'import_run';
    const IMPORT_DELETE = 'import_delete';

    const SORT_RULE_CREATE = 'sort_rule_create';
    const SORT_RULE_UPDATE = 'sort_rule_update';
    const SORT_RULE_DELETE = 'sort_rule_delete';

    /**
     * Get all the possible values.
     */
    public static function all(): array
    {
        return (new \ReflectionClass(static::class))->getConstants();
    }
}
