<?php

    namespace App\Http\Modules\Authentication\Domain\Enums;

    class CredentialEventsEnum
    {
        public const RENEWAL_CREDENTIAL = 'RENEWAL_CREDENTIAL';
        public const CREDENTIAL_RENEWAL_REQUEST = 'CREDENTIAL_RENEWAL_REQUEST';
        public const CREDENTIAL_AUTHORIZATION_REQUEST = 'CREDENTIAL_AUTHORIZATION_REQUEST';
        public const CREDENTIAL_LOGIN = 'CREDENTIAL_LOGIN';
        public const CREDENTIAL_CREATE = 'CREDENTIAL_CREATE';
        public const DEFAULT_OBSERVATION = 'None for now';
    }
