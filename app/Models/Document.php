<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Document extends Model
{
    protected $table = 'document';
    public $timestamps = false;
    protected $fillable = ['owner_login', 'name', 'path'];

    public static function getDocsFromIds($ids)
    {
        $res = new Collection();
        foreach ($ids as $id) {
            $doc = Document::where('id', $id)->first();
            if ($doc != null) {
                $res->push($doc);
            }
        }
        return $res;
    }
}
