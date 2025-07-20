<?php

    namespace App\Http\src\Authentication\Enums;

    class CredentialEvents
    {
        public const RENEWAL_CREDENTIAL = 'RENEWAL_CREDENTIAL';
        public const CREDENTIAL_RENEWAL_REQUEST = 'CREDENTIAL_RENEWAL_REQUEST';
        public const CREDENTIAL_AUTHORIZATION_REQUEST = 'CREDENTIAL_AUTHORIZATION_REQUEST';
        public const CREDENTIAL_LOGIN = 'CREDENTIAL_LOGIN';
        public const DEFAULT_OBSERVATION = 'None for now';
    }
