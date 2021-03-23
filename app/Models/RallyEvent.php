<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class RallyEvent extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'rally_events';

    protected $dates = [
        'date_start',
        'date_end',
        'date_early_fee',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'event_name',
        'event_organiser',
        'event_type',
        'date_start',
        'date_end',
        'event_status',
        'max_entries',
        'date_early_fee',
        'fee_currency',
        'fee_normal',
        'fee_early',
        'fee_open',
        'fee_solo',
        'fee_new_member',
        'fee_dinner_adult',
        'fee_adult_teen',
        'fee_dinner_child',
        'mem_only',
        'email_from_name',
        'email_from',
        'email_copy',
        'event_comment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateStartAttribute($value)
    {
        $this->attributes['date_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateEndAttribute($value)
    {
        $this->attributes['date_end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateEarlyFeeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateEarlyFeeAttribute($value)
    {
        $this->attributes['date_early_fee'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
