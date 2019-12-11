@extends('layouts.index')
@section('conteudo')

<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
          <h1 class="mb-3 bread">Contrate seus melhores Candidatos</h1>
        </div>
      </div>
    </div>
  </div>

      <section class="ftco-section ftco-candidates ftco-candidates-2 bg-light">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 pr-lg-2">
                  <div class="row">
                    @foreach ($allworkers as $w)

                        <div class="col-md-6">
                                <div class="team d-md-flex p-4 bg-white">
                                <div class="img">
                                  <img class="img-fluid" src="{{ asset($w->picture) }}" alt="" srcset="">
                                </div>
                                <div class="text pl-md-4">
                                <span class="location mb-0">{{$w->city}}, {{$w->state}}</span>
                                <h2>{{$w->name}}</h2>
                                <p class="mb-2">{{$w->description}}</p>
                                  <a href="{{ route('workerContact', ['user' => $w->cpf] )}}"><button type="submit" class="btn btn-primary">Saiba Mais</button></a>
                                </div>
                            </div>
                         </div>
                        
                    @endforeach
                      

                  </div>
              </div>
          </div>
        </div>
      </section>
                      

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
        </div>
      </div>
    </div>
  </footer>

</div>
@endsection