<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NewsController extends Controller
{
    public function index()
    {
        $request = request();
        $query = News::query();

        if($title = $request->query('search') and laravelLocalization::getCurrentLocale() == 'ar')
        {
            $query->where('title_ar', 'LIKE', "%{$title}%");
        }
        if($title = $request->query('search') and laravelLocalization::getCurrentLocale() == 'en')
        {
            $query->where('title_en', 'LIKE', "%{$title}%");
        }


        $news = $query->select(
            'id',
            'slug',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'short_description_' . laravelLocalization::getCurrentLocale() . ' as short_description',
        )->where('status', 'active')->orderBy('id', 'desc')->paginate(4);
        // $news->withPath('/layouts/website/paginate');



        return view('news', compact('news'));
    }


    public function show(Request $request, $id)
    {
        $news = News::select(
            'id',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'short_description_' . laravelLocalization::getCurrentLocale() . ' as short_description',
            'description_' . laravelLocalization::getCurrentLocale() . ' as description',
            'keywords_' . laravelLocalization::getCurrentLocale() . ' as keywords',
            // 'instagram_link',
            // 'facebook_link',
            // 'twitter_link',
            'updated_at',
            'visited_count',
        )->where('status', 'active')->where('slug', $id)->first();


        // dd($request->ip());


        if (!session()->has('visited_articles')) {
            session(['visited_articles' => []]);
        }

        $visitedArticles = session('visited_articles');

        if (!in_array($news->id, $visitedArticles)) {
            // زيادة عدد الزيارات بواحد
            $news->visited_count += 1;
            $news->save();

            // تسجيل الزيارة في الجلسة
            session(['visited_articles' => array_merge($visitedArticles, [$news->id])]);
        }





        $newses = News::select(
            'id',
            'slug',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'short_description_' . laravelLocalization::getCurrentLocale() . ' as short_description',
            'updated_at',
        )->where('status', 'active')->take(4)->orderBy('id', 'desc')->get();
        return view('news_details', compact('news', 'newses'));
    }
}
