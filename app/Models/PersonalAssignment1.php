<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAssignment1 extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pa1';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'fullName',
        'gender',
        'placeOfBirth',
        'dateOfBirth',
    ];

    /**
     * Get the attachments for model
     */
    public function attachments() {
        return $this->hasMany(PersonalAssignment1Attachments::class, 'pa1_id', 'id');
    }

    use HasFactory;
}
