<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_Model extends Model
{
    use HasFactory;
    public $table = "file_mgmt_sys";

    protected $fillable = [
        "id",
        "User_id",
        "Category_id",
        "File_name",
        "Description",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
