<?php

namespace App\Repositories;

use App\DataObjects\NoticeCreateData;
use App\Models\Notice;

class NoticeRepository
{
    public function create(NoticeCreateData $data){
        return Notice::create([
            'office_id' => $data->office_id,
            'name'      => $data->name,
            'tel'       => $data->tel,
            'email'     => $data->email,
            'title'     => $data->title,
            'body'      => $data->body,
        ]);
    }
}
