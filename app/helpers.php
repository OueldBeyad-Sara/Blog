<?php
use App\Models\Setting;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;

if (!function_exists('blogInfo')) {
    function blogInfo(){
        return Setting::find(1);
    }
}

if (!function_exists('date_formatter')) {
    function date_formatter($date){
        return Carbon::createFromFormat('Y-m-d H:i:s',$date)->isoFormat('LL');
    }
}

if (!function_exists('words')) {
    function words($value, $words = 15, $end="..."){
        return Str::words(strip_tags($value),$words,$end);
    }
}

if(!function_exists('isOnline')){
    function isOnline($site = "https//youtube.com"){
        if(@fopen($site,'r')){
            return true;
        }else {
            return false;
        }
    }
}

if(!function_exists('readDuration')){
    function readDuration(...$text){
        Str::macro('timeCounter', function($text){
            $totalWords = str_word_count(implode("",$text));
            $minutesToRead = round($totalWords/200);
            return (int)max(1, $minutesToRead);
        });
        return Str::timeCounter($text);
    }
}

if(!function_exists('single_latest_post')){
    function single_latest_post(){
        return Post::with('author')
                    ->with('subcategory')
                    ->limit(1)
                    ->orderBy('created_at','desc')
                    ->first();
    }
}

if(!function_exists('latest_home_6posts')){
    function latest_home_6posts(){
        return Post::with('author')
                    ->with('subcategory')
                    ->skip(1)
                    ->limit(6)
                    ->orderBy('created_at','desc')
                    ->get();
    }
}

if (!function_exists('recommended_posts')) {
   function recommended_posts(){
    return Post::with('author')
                ->with('subcategory')
                ->limit(4)
                ->inRandomOrder()
                ->get();
   }
}

if (!function_exists('categories')) {
    function categories(){
        return SubCategory::whereHas('posts')
                            ->with('posts')
                            ->orderBy('subcategory_name','asc')
                            ->get();
    }
}

?>