<?php

namespace Vooyd\DomainApiClient\Constants;

/**
 * Class PollMessageCode
 * @package Vooyd\DomainApiClient\Constants
 */
class PollMessageCode
{
    /**
     * POLL MESSAGE TYPE: CONTACT
     */
    public const CONTACT_UPDATED_SUCCESSFULLY = 3001;
    public const EMPTY_UPDATE_COMMAND = 3002;

    /**
     * POLL MESSAGE TYPE: NAME SERVER
     */
    public const FIRST_NAME_SERVER_CHECK_FAILED = 4000;
    public const CONSECUTIVE_NAME_SERVER_CHECK_FAILED = 4001;
    public const NAME_SERVER_CHECK_SUCCESSFUL = 4002;
    public const NAME_SERVER_CHECK_FAILED_AFTER_TWO_WEEKS = 4017;

    /**
     * POLL MESSAGE TYPE: UPDATE
     */
    public const DOMAIN_PENDING_UPDATE = 4003;
    public const DOMAINS_UPDATE_SUCCESSFUL = 4004;
    public const PENDING_UPDATE_CANCELLED = 4009;
    public const REGISTRANT_COULD_NOT_BE_FOUND = 4021;


    /**
     * POLL MESSAGE TYPE: RENEW
     */
    public const DOMAIN_RENEW_SUCCESSFUL = 4005;

    /**
     * POLL MESSAGE TYPE: DELETE
     */
    public const DOMAIN_DELETION_SUCCESSFUL = 4006;
    public const DOMAIN_PENDING_DELETION = 4008;
    public const PENDING_SUSPENSION_CANCELLED = 4014;
    public const DOMAIN_SUSPENDED_PENDING_DELETION = 4016;
    public const PENDING_DELETION_CANCELED = 4020;
    public const DOMAIN_IN_CLOSED_REDEMPTION = 4024;
    public const PENDING_CLOSED_REDEMPTION_CANCELLED = 4025;

    /**
     * POLL MESSAGE TYPE: RELEASE
     */
    public const DOMAINS_RELEASE_SUCCESSFUL = 4007;

    /**
     * POLL MESSAGE TYPE: TRANSFER
     */
    public const DOMAIN_TRANSFER_REQUEST = 4010;
    public const DOMAIN_TRANSFER_SUCCESSFUL = 4011;
    public const DOMAIN_TRANSFER_CANCELLED = 4013;
    public const DOMAIN_TRANSFER_AWAY = 4018;
    public const DOMAIN_NOT_ELIGIBLE_FOR_TRANSFER = 4019;
    public const DOMAIN_TRANSFER_REJECTED = 4022;
    public const DOMAIN_TRANSFER_WILL_BE_REJECTED_ON_EXPIRY_OF_PENDING_UPDATE = 4023;

    /**
     * POLL MESSAGE TYPE: CREATE
     */
    public const DOMAIN_REGISTRATION_SUCCESSFUL = 4026;
    public const UNKNOWN_MESSAGE = 5000;
}
