<?php

namespace App\Http\Controllers;

use App\Category;
use Symfony\Component\HttpFoundation\File\UploadedFile;
// use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\User;
use Illuminate\Http\Request;
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
        $ocupacoes = Category::all();
        return view('profile.edit', ['categorias' => $ocupacoes]);
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
