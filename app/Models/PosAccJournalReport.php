<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosAccJournalReport extends Model
{

    protected $table = 'acc_journalreport';

    protected $fillable = [
        'user_id',
        'particular',
        'reference_no',
        'debit',
        'credit',
        'narration',
    ];

}
