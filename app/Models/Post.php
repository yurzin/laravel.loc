<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Post extends Model
{
    use HasFactory;

    public function rules()
    {
        return [
            'title' => 'required|min:5|max:50',
            'content' => 'required|min:50|max:500',
            'rubric_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните поле Название',
            'content.required' => 'Заполните поле Текст',
            'rubric_id.required' => 'Выберите рубрику'
        ];
    }

    // protected $table = 'posts';
    protected $fillable = ['title', 'content', 'rubric_id'];

    public function rubric()
    {
        return $this->belongsTo(Rubric::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getPostDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /*public function validate($request)
    {
        return Validator::make($request->all(), $this->rules(), $this->messages())->validate();
    }*/
}
