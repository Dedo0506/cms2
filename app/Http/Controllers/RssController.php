<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RssController extends Controller
{
    public function generate()
    {
        $posts = PostModel::latest()->limit(10)->get();

        $feed = '<?xml version="1.0" encoding="UTF-8" ?>';
        $feed .= '<rss version="2.0">';
        $feed .= '<channel>';
        $feed .= '<title>RSS de posts más recientes</title>';
        $feed .= '<link>' . route('rss') . '</link>';
        $feed .= '<description>Posts más recientes (Los últimos registrados) </description>';

        foreach ($posts as $post) {
            $feed .= '<item>';
            $feed .= '<title>' . $post->title . '</title>';
            $feed .= '<link>' . route('posts.show', $post->id) . '</link>';
            $feed .= '<description>';
            $feed .= '<![CDATA[';
            $feed .= '<div class="card-body">';
            $feed .= '<p class="card-text">' . $post->content . '</p>';
            $feed .= '<p class="card-text"><strong>Categoría:</strong> ' . $post->categorias->NombreCategoria . '</p>';
            $feed .= '<p class="card-text"><strong>Etiqueta:</strong> ' . $post->etiquetas->nombreEtiqueta  . '</p>';
            $feed .= '<p class="card-text"><strong>Fecha de Creación:</strong> ' . $post->created_at->format('d/m/Y H:i:s') . '</p>';
            $feed .= '<p class="card-text"><strong>Fecha de Actualización:</strong> ' . $post->updated_at->format('d/m/Y H:i:s') . '</p>';
            $feed .= '</div>';
            $feed .= ']]>';
            $feed .= '</description>';
            $feed .= '<pubDate>' . $post->created_at->toRssString() . '</pubDate>';
            $feed .= '</item>';
        }

        $feed .= '</channel>';
        $feed .= '</rss>';

        return Response::make($feed, '200')->header('Content-Type', 'text/xml');
    }
}
