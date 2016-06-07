<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gitHistory extends Model
{
    

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }
    protected $fillable = ['id_user', 'search_username', 'search_text', 'url', 'updated_at','created_at'];

    protected $table = 'git_histories';
}
