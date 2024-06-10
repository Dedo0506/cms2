<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\AutoresModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RssAutorController extends Controller
{
    public function generate()
    {
        $autores = AutoresModel::latest()->limit(10)->get();

        $feed = '<?xml version="1.0" encoding="UTF-8" ?>';
        $feed .= '<rss version="2.0">';
        $feed .= '<channel>';
        $feed .= '<title>RSS de Autores</title>';
        $feed .= '<link>' . route('rss.autores') . '</link>';
        $feed .= '<description>RSS sobre los autores registrados del sistema</description>';

        foreach ($autores as $autor) {
            $feed .= '<item>';
            $feed .= '<title>' . $autor->NombreAutor . '</title>';
            $feed .= '<link>' . route('autores.show', $autor->id) . '</link>';
            $feed .= '<description>';
            $feed .= '<![CDATA[';
            $feed .= '<div class="card-body">';
            $feed .= '<p class="card-text"><strong>Nombre:</strong> ' . $autor->NombreAutor . '</p>';
            $feed .= '<p class="card-text"><strong>Apodo:</strong> ' . $autor->Apodo . '</p>';
            $feed .= '<p class="card-text"><strong>Email:</strong> ' . $autor->Email  . '</p>';
            $feed .= '<p class="card-text"><strong>Biografía:</strong> ' . $autor->Biografia . '</p>';
            $feed .= '<p class="card-text"><strong>Foto:</strong> <img src="' . asset($autor->Foto) . '" alt="Foto de ' . $autor->NombreAutor . '" /></p>';
            $feed .= '</div>';
            $feed .= ']]>';
            $feed .= '</description>';
            $feed .= '</item>';
        }

        $feed .= '</channel>';
        $feed .= '</rss>';

        return Response::make($feed, '200')->header('Content-Type', 'text/xml');
    }
}
