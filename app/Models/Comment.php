<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    public $timestamps = false; 

    
       /* *
         * Get the user that owns the Comment
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function getUser()
        {
            return $this->belongsTo(User::class);
        }
}
