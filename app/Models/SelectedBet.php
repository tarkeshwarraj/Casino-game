<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedBet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bets',
    ];

    protected $casts = [
        'bets' => 'array', // Automatically cast JSON to array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

//By default, Laravel assumes the table name for a model is the plural form of the model name (e.g., the SelectedBet model will look for a selected_bets table).
//If your table name does not follow this convention, you can explicitly define the table name in your model using the $table property.