<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class MembershipCategory extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'membership_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_type',
        'category_name',
        'mem_fee',
        'fee_add',
        'country_code',
        'curr_symbol',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function membershipCategoryMembers()
    {
        return $this->hasMany(Member::class, 'membership_category_id', 'id');
    }
}
