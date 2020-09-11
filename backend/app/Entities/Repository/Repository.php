<?php

namespace App\Entities\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Repository

 * @property integer $id
 * @property integer $id_repository
 * @property string $title
 * @property string $description
 * @property string $language
 * @property string $owner
 * @property string $token_git
 * @property string $url
 */

class Repository extends Model
{
    protected $table = 'repository';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_repository',
        'title',
        'description',
        'language',
        'owner',
        'token_git',
        'url',
    ];
}
