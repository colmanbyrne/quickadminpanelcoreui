<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Member extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable, HasFactory;

    public $table = 'members';

    protected $dates = [
        'date_joined',
        'date_renewed',
        'date_card_issued',
        'date_dd_issued',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'member_username_id',
        'member_no',
        'membership_category_id',
        'surname',
        'firstname',
        'prefix',
        'partner',
        'organisation_name',
        'address_1',
        'address_2',
        'town',
        'county',
        'post_code',
        'country',
        'tel_no',
        'mob_no',
        'email_2',
        'email_status',
        'sms_status',
        'mem_year',
        'mem_fee',
        'mem_fee_currency',
        'pay_method',
        'date_joined',
        'date_renewed',
        'date_card_issued',
        'date_dd_issued',
        'date_cancelled',
        'mem_notes',
        'member_role_id',
        'updated_by',
        'created_at',
        'mem_status_id',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function member_username()
    {
        return $this->belongsTo(User::class, 'member_username_id');
    }

    public function membership_category()
    {
        return $this->belongsTo(MembershipCategory::class, 'membership_category_id');
    }

    public function getDateJoinedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateJoinedAttribute($value)
    {
        $this->attributes['date_joined'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateRenewedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateRenewedAttribute($value)
    {
        $this->attributes['date_renewed'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateCardIssuedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateCardIssuedAttribute($value)
    {
        $this->attributes['date_card_issued'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateDdIssuedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateDdIssuedAttribute($value)
    {
        $this->attributes['date_dd_issued'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function member_role()
    {
        return $this->belongsTo(Role::class, 'member_role_id');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function mem_status()
    {
        return $this->belongsTo(MembershipStatus::class, 'mem_status_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
