<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'groups',
        'requester_name',
        'technician',
        'subject',
        'dateofcreate',
        'description',
        'priority',
        'request_type',
        'status',
        'due_date',
        'date_closed',
        'date_archived',
    ];
}
