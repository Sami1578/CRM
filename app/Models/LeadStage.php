<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadStage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lead(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasMany(Lead::class, 'lead_stage_id', 'id');
    }

}
