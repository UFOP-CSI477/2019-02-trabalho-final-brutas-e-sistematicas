<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\User;

class SkillController extends Controller
{
    function index(){
        $topCategories = [
            [
                'nome' => 'Construção Civil',
                'icon' => 'flaticon-idea',
                'id'   => DB::table('categories')->select('id')->where('name', '=', 'Construção Civil')->get()
            ],
            [
                'nome' => 'Transporte Alternativo',
                'icon' => 'flaticon-visitor',
                'id'   => DB::table('categories')->select('id')->where('name', '=', 'Transporte Alternativo')->get()
            ],
            [
                'nome' => 'Limpeza Doméstica',
                'icon' => 'flaticon-employees',
                'id'   => DB::table('categories')->select('id')->where('name', '=', 'Limpeza Doméstica')->get()
            ],
            [
                'nome' => 'Informatica e Computadores',
                'icon' => 'flaticon-contact',
                'id'   => DB::table('categories')->select('id')->where('name', '=', 'Informatica e Computadores')->get()
            ],
        ];

    $cidades = DB::table('users')->select('city as name')->distinct()->get();
    $cat = Category::all();
    $countProf = User::count();
    $countCity = count(DB::table('users')->select('city')->distinct()->get());
    $catWithCount = DB::table('worker_cats')
                        ->join('categories', 'id_cat', '=', 'categories.id')
                        ->join('users', 'cpf_user', '=', 'users.cpf')
                        ->select('categories.name as cname', 'categories.id', 'users.name')
                        ->get();
    $g = $catWithCount->groupBy('cname');
    return view('layouts.skill.index', [
            'categories' => $cat, 
            'cidades'    => $cidades, 
            'topCat'     => $topCategories, 
            'profCount'  => $countProf,
            'cityCount'  => $countCity,
            'catCount'   => $g
        ]);
    }


    function workersByCategorie(Category $cat){
        $workers = DB::table('worker_cats as w')
                       ->join('users as u', 'u.cpf', '=', 'w.cpf_user')
                       ->select('u.name', 'u.city', 'u.description', 'u.state', 'u.cpf', 'u.picture')
                       ->where('w.id_cat', '=', $cat->id)
                       ->get();
        dd($workers);

    }
}
