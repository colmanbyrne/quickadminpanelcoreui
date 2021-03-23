<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Branch extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'branches';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'branch_no',
        'shortname',
        'longname',
        'branch_country',
        'branch_currency',
        'branch_secretary_id',
        'branch_treasurer_id',
        'branch_chair_id',
        'branch_rep_1_id',
        'branch_rep_2_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branchMembers()
    {
        return $this->belongsToMany(Member::class);
    }

    public function branch_secretary()
    {
        return $this->belongsTo(User::class, 'branch_secretary_id');
    }

    public function branch_treasurer()
    {
        return $this->belongsTo(User::class, 'branch_treasurer_id');
    }

    public function branch_chair()
    {
        return $this->belongsTo(User::class, 'branch_chair_id');
    }

    public function branch_rep_1()
    {
        return $this->belongsTo(User::class, 'branch_rep_1_id');
    }

    public function branch_rep_2()
    {
        return $this->belongsTo(User::class, 'branch_rep_2_id');
    }
}
