<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;

    //implemeto la softDeletes() nel model che mi interessa usi questa fn
    // in questo caso per i project nel db projects
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'authors', 'type_id'];

    public function type():BelongsTo{
        return $this->belongsTo(Type::class);
    }

}
