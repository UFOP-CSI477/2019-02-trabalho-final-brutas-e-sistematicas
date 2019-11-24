@extends('layouts.app', ['class' => 'bg-default'])
@php
    $estados = array('Acre – AC', 'Alagoas – AL', 'Amapá – AP', 'Amazonas – AM', 'Bahia – BA', 'Ceará – CE', 'Distrito Federal – DF', 'Espírito Santo – ES', 'Goiás – GO', 'Maranhão – MA', 'Mato Grosso – MT', 'Mato Grosso do Sul – MS', 'Minas Gerais – MG', 'Pará – PA', 'Paraíba – PB', 'Paraná – PR', 'Pernambuco – PE', 'Piauí – PI', 'Roraima – RR', 'Rondônia – RO', 'Rio de Janeiro – RJ', 'Rio Grande do Norte – RN', 'Rio Grande do Sul – RS', 'Santa Catarina – SC', 'São Paulo – SP', 'Sergipe – SE', 'Tocantins – TO')
@endphp
@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    
                    <div class="card-body px-lg-5 py-lg-5">
                        
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('cpf') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" placeholder="{{ __('CPF') }}" type="text" name="cpf" value="{{ old('cpf') }}" required autofocus>
                                </div>
                                @if ($errors->has('cpf'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __(' Nome') }}" type="text" name="name" value="{{ old('name') }}" required >
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="{{ __('Sobrenome') }}" type="text" name="surname" value="{{ old('surname') }}" required >
                                </div>
                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Senha') }}" type="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirme sua Senha') }}" type="password" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-signs"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" placeholder="{{ __('CEP') }}" type="text" name="postal_code" value="{{ old('postal_code') }}" required >
                                </div>
                                @if ($errors->has('postal_code'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-road"></i></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="{{ __('Rua, Avenida, Esquina...') }}" type="text" name="street" value="{{ old('street') }}" required >
                                </div>
                                @if ($errors->has('street'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-inbox"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="{{ __('Número') }}" type="text" name="number" value="{{ old('number') }}" required>
                                </div>
                                @if ($errors->has('number'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('complment') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('complment') ? ' is-invalid' : '' }}" placeholder="{{ __('Complemento') }}" type="text" name="complment" value="{{ old('complment') }}">
                                </div>
                                @if ($errors->has('complment'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('complment') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('Cidade') }}" type="text" name="city" value="{{ old('city') }}">
                                </div>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-globe-africa"></i></span>
                                    </div>
                                    <select class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }} " name="state">
                                        @foreach ($estados as $estado)
                                            <option value="{{explode(" – ", $estado)[1]}}">{{explode(" – ", $estado)[0]}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                @if ($errors->has('state'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('I agree with the') }} <a href="#!">{{ __('Privacy Policy') }}</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('input[name="postal_code"]').change(event=>{
        var cep = event.currentTarget.value;
        var xmlReq = new XMLHttpRequest();
        xmlReq.open('GET', `https://viacep.com.br/ws/${cep}/json/`);
        xmlReq.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                infos = JSON.parse(xmlReq.responseText);
                try{
                    $('input[name="street"]').val(infos.logradouro);
                    $('input[name="city"]').val(infos.localidade);
                    $('select[name="state"]').val(infos.uf).change();
                }catch (erro){
                    console.error(erro)
                }
            }
        }
        xmlReq.send();
    })
</script>
@endsection