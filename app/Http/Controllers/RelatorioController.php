<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Response;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('admin.relatorios.index');
    }

    public function cursoAcimaDez()
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=cursos.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
    
        $cursos = Curso::all();
        
        $columns = array('Curso', 'Quantidade de matriculas');
    
        $callback = function() use ($cursos, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            
            foreach($cursos as $curso) {
                if(count($curso->alunos) > 10)
                {
                    fputcsv($file, array($curso->nome, count($curso->alunos)));
                }
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);       
        
    }
}
