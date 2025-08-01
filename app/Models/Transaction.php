<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_id',
        'reference',
        'user_id',
        'payment_method',
        'price',
        'currency',
        'accept_bonus',
        'status',
        'deposit_savings', // Novo campo para indicar se a transação é um depósito na poupança
        'savings_amount', // Valor movimentado na poupança
    ];
}
