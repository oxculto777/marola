<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GGRGames extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ggr_games';
    protected $appends = ['dateHumanReadable', 'createdAt'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'provider',
        'game',
        'balance_bet',
        'balance_win',
        'balance_loss', // Adicionando balance_loss ao fillable
        'currency',
        'aggregator',
        'type',
    ];

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at']);
    }

    /**
     * @return mixed
     */
    public function getDateHumanReadableAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /**
     * Boot method to add event listeners
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Atualizar balance_loss baseado no balance_bet e balance_win
            if ($model->balance_win <= 0) {
                $model->balance_loss = $model->balance_bet;
            } else {
                $model->balance_loss = 0;
            }
        });
    }
}
