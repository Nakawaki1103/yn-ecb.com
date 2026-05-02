<?php

namespace App\DataObjects;

readonly class NoticeCreateData
{
    public function __construct(
        public int $office_id,
        public string $name,
        public string $tel,
        public string $email,
        public string $title,
        public string $body,
    ) {}
}
