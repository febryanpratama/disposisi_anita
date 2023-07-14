<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function log()
    {
        return $this->hasMany(LogProposal::class, 'proposal_id', 'id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function foto()
    {
        return $this->hasMany(FotoLapangan::class);
    }
}
