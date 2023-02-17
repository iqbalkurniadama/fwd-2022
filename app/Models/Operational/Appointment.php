<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'appointment';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable
    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // relantionship one to many
    public function doctor()
    {
        // 3 parameter (path model, field foreign_key, field primary_key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\Operational\Doctor', 'doctor_id', 'id');
    }

    // relantionship one to many
    public function consultation()
    {
        // 3 parameter (path model, field foreign_key, field primary_key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\MasterData\Consultation', 'consultation_id', 'id');
    }

    // relantionship one to many
    public function user()
    {
        // 3 parameter (path model, field foreign_key, field primary_key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
    // relantionship one to one
    public function transaction()
    {
        // 2 parameter (path model, field foreign_key)
        return $this->hasOne('App\Models\Operational\Transaction', 'appointment_id');
    }
}
