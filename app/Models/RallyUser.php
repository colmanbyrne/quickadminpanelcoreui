<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class RallyUser extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'rally_users';

    protected $dates = [
        'entry_date',
        'entry_paid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'event_id',
        'rally_entry_name_id',
        'member_no_id',
        'entry_type',
        'entry_status',
        'entry_date',
        'entry_paid',
        'fee_due',
        'fee_paid',
        'fee_currency',
        'entry_notes',
        'entry_comment',
        'num_adults',
        'num_child_18',
        'num_child_12',
        'opt_dinner_adult',
        'opt_dinner_teen',
        'opt_dinner_child',
        'vessel_name',
        'vessel_length',
        'vessel_draft',
        'vessel_air_draft',
        'vcruise_normal',
        'vcruise_max',
        'own_vessel',
        'boat_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function event()
    {
        return $this->belongsTo(RallyEvent::class, 'event_id');
    }

    public function rally_entry_name()
    {
        return $this->belongsTo(User::class, 'rally_entry_name_id');
    }

    public function member_no()
    {
        return $this->belongsTo(Member::class, 'member_no_id');
    }

    public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEntryPaidAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEntryPaidAttribute($value)
    {
        $this->attributes['entry_paid'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
