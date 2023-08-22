<?php

namespace CodebarAg\TwilioVerify\DTO;

use Carbon\Carbon;
use Illuminate\Support\Str;

class VerificationCheck
{
    public static function fromJson(array $data): self
    {
        return new static(
            sid: $data['sid'],
            service_sid: $data['service_sid'],
            account_sid: $data['account_sid'],
            to: $data['to'],
            channel: $data['channel'],
            status: $data['status'],
            valid: $data['valid'],
            created_at: Carbon::parse($data['date_created']),
            updated_at: Carbon::parse($data['date_updated']),
        );
    }

    public function __construct(
        public string $sid,
        public string $service_sid,
        public string $account_sid,
        public string $to,
        public string $channel,
        public string $status,
        public bool $valid,
        public Carbon $created_at,
        public Carbon $updated_at,
    ) {
    }

    public static function fake(
        ?string $sid = null,
        ?string $service_sid = null,
        ?string $account_sid = null,
        ?string $to = null,
        ?string $channel = null,
        ?string $status = null,
        ?bool $valid = null,
        ?string $created_at = null,
        ?string $updated_at = null,
    ): self {
        return new static(
            sid: $sid ?? 'VE' . Str::random(32),
            service_sid: $service_sid ?? 'VA' . Str::random(32),
            account_sid: $account_sid ?? 'AC' . Str::random(32),
            to: $to ?? '+41795555825',
            channel: $channel ?? 'sms',
            status: $status ?? 'approved',
            valid: $valid ?? true,
            created_at: $created_at ?? now(),
            updated_at: $updated_at ?? now(),
        );
    }
}
