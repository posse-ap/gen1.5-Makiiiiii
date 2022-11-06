<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $url = "https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/news?1";
        $method = "GET";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);

        // dd($posts);

        return view('webapp.news', compact('user', 'posts'));
    }

    public function detail($id)
    {
        $user = Auth::user();

        $url = "https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/news/" . $id;
        $method = "GET";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $news = $response->getBody();
        $news = json_decode($news, true);

        // dd($news);

        return view('webapp.news_detail', compact('user', 'news'));
    }
}
