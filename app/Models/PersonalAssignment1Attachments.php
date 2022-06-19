<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAssignment1Attachments extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pa1_attachments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'path',
    ];

    use HasFactory;
}
