<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class News extends Model
{
    protected $table = 'news';

    public static function createNews(Request $request)
    {
        $news = new self();
        $news->title = $request->input('title');
        $news->body = $request->input('body');
        if ($news->save()) {
            return true;
        }
        return false;
    }
}
