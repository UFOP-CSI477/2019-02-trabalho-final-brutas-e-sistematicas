<?php
namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Phone;
use App\WorkerCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $estados = array(
            'Acre - AC', 'Alagoas - AL', 'Amapá - AP', 'Amazonas - AM', 
            'Bahia - BA', 'Ceará - CE', 'Distrito Federal - DF', 'Espírito Santo - ES', 
            'Goiás - GO', 'Maranhão - MA', 'Mato Grosso - MT', 'Mato Grosso do Sul - MS', 
            'Minas Gerais - MG', 'Pará - PA', 'Paraíba - PB', 'Paraná - PR', 'Pernambuco - PE', 
            'Piauí - PI', 'Roraima - RR', 'Rondônia - RO', 'Rio de Janeiro - RJ', 
            'Rio Grande do Norte - RN', 'Rio Grande do Sul - RS', 'Santa Catarina - SC', 
            'São Paulo - SP', 'Sergipe - SE', 'Tocantins - TO');

        $telefones = DB::table('phones')->join('users', 'users.cpf', '=', 'phones.cpf_user')->select('phones.number as number', 'phones.id as id')->get();        
        $ocupacoes = Category::all();
        $user_cat = DB::table('worker_cats')->join('users', 'users.cpf', '=', 'worker_cats.cpf_user')
                                           ->join('categories', 'categories.id', '=', 'worker_cats.id_cat')
                                           ->select('worker_cats.id as wc_id', 'categories.name as cat_name')
                                           ->where('users.cpf', '=', auth()->user()->cpf)
                                           ->get();
        return view('profile.edit', ['categorias' => $ocupacoes, 'telefones' => $telefones, 'worker_cats' => $user_cat, 'estados' => $estados]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        // dd($request);

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->file('picture')->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->file('picture')->move('src/img/user', $nameFile);
            if ( !$upload ){
                return redirect('profile')->withErrors(['picture' => 'Não foi possível fazer upload de imagem']);
            }else{
                auth()->user()->update($request->all());
                auth()->user()->update(['picture' => $upload]);
                return redirect('profile')->withStatus(__('Perfil e Foto Atualizado com Sucesso'));

            }
        }else{
            auth()->user()->update($request->all());
            return redirect('profile')->with('perfil', 'Perfil Atualizado com Sucesso');
        }
    }

    public function editPhone(Request $req){
        foreach($req->phones as $index => $phone){
            Phone::where('id', $req->oldPhones[$index])
                 ->update(['number' => $phone]);
        }
        return back()->withStatus(__('Numeros Atualizados com Sucesso'));
    }

   

    public function addPhone(Request $req){
        $telefone = $req->phone;
        $infos = array(
            'number' => $telefone,
            'isWP' => true,
            'cpf_user' => auth()->user()->cpf
        );
        Phone::create($infos);

        return redirect('profile')->withStatus(__('Numero inserido com sucesso'));
    }

    public function delCategory(Request $req){
        WorkerCat::select()->where('id', '=',$req->id_wc)->delete();
        return back()->withStatus(__('Categoria removida com sucesso'));
    }

    public function addCategory(Request $req){
        $cat = $req->category;
        $infos = array(
            'id_cat' => $cat,
            'cpf_user' => auth()->user()->cpf
        );
        $cat = WorkerCat::create($infos);

        return redirect('profile')->withStatus(__('Categoria inserido com sucesso'));
    }
    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Senha atualizada com sucesso'));
    }
}
