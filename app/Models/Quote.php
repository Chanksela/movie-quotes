<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quote extends Model
{
	use HasFactory, HasTranslations;

	protected $fillable = ['movie_id', 'body', 'thumbnail'];

	public $translatable = ['body'];

	public function movie()
	{
		return $this->belongsTo(Movie::class);
	}
}
