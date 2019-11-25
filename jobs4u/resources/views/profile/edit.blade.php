@php
    $estados = array('Acre – AC', 'Alagoas – AL', 'Amapá – AP', 'Amazonas – AM', 'Bahia – BA', 'Ceará – CE', 'Distrito Federal – DF', 'Espírito Santo – ES', 'Goiás – GO', 'Maranhão – MA', 'Mato Grosso – MT', 'Mato Grosso do Sul – MS', 'Minas Gerais – MG', 'Pará – PA', 'Paraíba – PB', 'Paraná – PR', 'Pernambuco – PE', 'Piauí – PI', 'Roraima – RR', 'Rondônia – RO', 'Rio de Janeiro – RJ', 'Rio Grande do Norte – RN', 'Rio Grande do Sul – RS', 'Santa Catarina – SC', 'São Paulo – SP', 'Sergipe – SE', 'Tocantins – TO')
@endphp
@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Olá') . ' '. auth()->user()->name,
        'description' => __('Essa é sua página. Aqui você pode editar suas informações !!!'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ '../' . auth()->user()->picture }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                  <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">  
                        <div class="d-flex justify-content-between">{{-- 
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>--}}
                        </div>
                    </div> <br><br><br>
                    <div class="card-body pt-0 pt-md-4">
                        {{-- <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light"></span>
                            </h3>
                            <div class="h5 font-weight-300">
                                    {{ auth()->user()->city.', '.auth()->user()->state }}
                            </div>{{-- 
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div> --}}
                            <hr class="my-4" />
                            <p>{{ auth()->user()->description }}</p>
                            {{-- <a href="#">{{ __('Show more') }}</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Editar Perfil') }}</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Informação do Usuário') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nome') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('name', auth()->user()->name) }}" required >

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-surname">{{ __('Sobrenome') }}</label>
                                        <input type="text" name="surname" id="input-surname" class="form-control form-control-alternative{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="{{ __('Sobrenome') }}" value="{{ old('surname', auth()->user()->surname) }}" required>
    
                                        @if ($errors->has('surname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('surname') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('picture') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-picture">{{ __('Foto') }}</label>
                                    <input type="file" name="picture" id="input-picture" class="form-control">

                                    @if ($errors->has('picture'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('picture') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />

                        <div class="card-body">
                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                                @csrf
                                @method('put')
    
                                <h6 class="heading-small text-muted mb-4">{{ __('Informação do Job') }}</h6>
                                
                                {{-- @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif --}}
    
                                <div class="pl-lg-4">
                                    
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">{{ __('Descrição') }}</label>
                                        <textarea rows="6" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ old('description', auth()->user()->description) }}"></textarea>
                                        <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="pl-lg-4">
                                    
                                    <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">{{ __('Categorias') }}</label>
                                        <h5 class="form-control-text">
                                            Selecione as categorias que se encaixam no seu perfil de prestação de serviço
                                        </h5>

                                        <select name="catgory" id="" class="form-control">
                                            @foreach ($categorias as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>

                                        {{-- <input type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('category') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="{{ old('description', auth()->user()->description) }}" required> --}}
    
                                        @if ($errors->has('category'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                        @endif
                                    </div>
    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                    </div>
                                </div>
                            </form>

                            <hr class="my-4" />

                            <div class="card-body">
                                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                                    @csrf
                                    @method('put')
        
                                    <h6 class="heading-small text-muted mb-4">{{ __('Endereço') }}</h6>
                                    
                                    {{-- @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif --}}
                                    
        
                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-street">{{ __('Rua') }}</label>
                                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                            <input type="text" name="street" id="input-street" class="form-control form-control-alternative{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="{{ __('Rua') }}" value="{{ old('street', auth()->user()->street) }}" required >
        
                                            @if ($errors->has('street'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('street') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Número') }}</label>
                                            <input type="number" name="number" id="input-number" class="form-control form-control-alternative{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="{{ __('Número') }}" value="{{ old('number', auth()->user()->number) }}" required>
        
                                            @if ($errors->has('number'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('number') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-postal_code">{{ __('CEP') }}</label>
                                                <input type="text" name="postal_code" id="input-postal_code" class="form-control form-control-alternative{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" placeholder="{{ __('CEP') }}" value="{{ old('postal_code', auth()->user()->postal_code) }}" required >
            
                                                @if ($errors->has('postal_code'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('complment') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-complment">{{ __('Complemento') }}</label>
                                                    <input type="text" name="complment" id="input-complment" class="form-control form-control-alternative{{ $errors->has('complment') ? ' is-invalid' : '' }}" placeholder="{{ __('Complemento') }}" value="{{ old('complment', auth()->user()->complment) }}" required >
                
                                                    @if ($errors->has('complment'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('complment') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                                        <label class="form-control-label" for="input-city">{{ __('Cidade') }}</label>
                                                        <input type="text" name="city" id="input-city" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('Cidade') }}" value="{{ old('city', auth()->user()->city) }}" required >
                    
                                                        @if ($errors->has('city'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('city') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>


                                                    <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                                            <label class="form-control-label" for="input-city">{{ __('Cidade') }}</label>
                                                            <select class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} " name="state">
                                                                    @foreach ($estados as $estado)
                                                                    <option value="{{explode(" – ", $estado)[1]}}">{{explode(" – ", $estado)[0]}}</option>
                                                                    @endforeach
                                                                </select>

                                                            @if ($errors->has('state'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('state') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>

        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                        </div>
                                    </div>
                                </form>

                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Trocar Senha') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Senha Antiga') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Nova Senha') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"  value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirma Nova Senha') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative"  value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection