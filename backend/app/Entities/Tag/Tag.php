<?php

namespace App\Entities\Tag;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Tag

 * @property integer $id
 * @property integer $repository_id
 * @property integer $id_tag_repository
 * @property string $tag_name
 * @property string $target_commitish
 * @property string $login
 * @property string $body
 */

class Tag extends Model
{
    protected $table = 'tag';
    protected $primaryKey = 'id';
    protected $fillable = [
        'repository_id',
        'id_tag_repository',
        'tag_name',
        'target_commitish',
        'login',
        'body',
    ];
}
