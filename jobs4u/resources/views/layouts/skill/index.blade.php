@extends('layouts.index')
@section('conteudo')

<div class="hero-wrap img" style="background-image: url(images/bg_1.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-10 d-flex align-items-center ftco-animate">
              <div class="text text-center pt-5 mt-md-5">
                  <p class="mb-4">Vários profissionais em um único lugar</p>
                  <h1 class="mb-5">A maneira mais fácil de encontrar um profissional autonômo</h1>
                    <div class="ftco-counter ftco-no-pt ftco-no-pb">
                      <div class="row">
                        <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18">
                            <div class="text d-flex">
                                <div class="icon mr-2">
                                    <span class="flaticon-worldwide"></span>
                                </div>
                                <div class="desc text-left">
                                  <strong class="number" data-number="{{ $cityCount }}">{{ $cityCount }}</strong>
                                  <span>Cidades</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                            <div class="text d-flex">
                                <div class="icon mr-2">
                                    <span class="flaticon-visitor"></span>
                                </div>
                                <div class="desc text-left">
                                  <strong class="number" data-number="{{ $profCount }}">{{ $profCount }}</strong>
                                  <span>Profissionais</span>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="ftco-search my-md-5">
                      <div class="row">
                      <div class="col-md-12 nav-link-wrap">
                          <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Ache um profissional</a>

                          </div>
                        </div>
                        <div class="col-md-12 tab-wrap">
                          
                          <div class="tab-content p-4" id="v-pills-tabContent">


                            <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                                <form action="#" class="search-job">
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <div class="form-field">
                                                    <div class="select-wrap">
                                                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                      <select name="categoria" id="" class="form-control">
                                                        <option value="all">Selecione a Categoria</option>
                                                      
                                                        @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        @endforeach
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <div class="form-field">
                                                    <div class="select-wrap">
                                                        <div class="icon"><span class="icon-map-marker"></span></div>
                                                        <select name="cidade" id="" class="form-control">
                                                          <option value="all">Selecione a Cidade Disponível</option>
                                                            @foreach ($cidades as $cit)
                                                            <option value="{{ $cit->name }}">{{ $cit->name }}</option>
                                                            @endforeach
                                                        </select>
                                                      </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <div class="form-field">
                                                  <button type="submit" class="form-control btn btn-primary">Procurar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
          </div>
          </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pt ftco-no-pb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="category-wrap">
                      <div class="row no-gutters">
                        @foreach ($topCat as $c)
                          <div class="col-md-3">
                              <div class="top-category text-center no-border-left">
                                  <h3>{{ $c['nome'] }}</h3>
                                  <span class="icon {{ $c['icon'] }}"></span>
                                  <p><span class="number">143</span> <span>Open position</span></p>
                              </div>
                          </div>
                        @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="ftco-section">
      <div class="container">
          <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Job Categories</span>
          <h2 class="mb-0">Todas Categorias</h2>
        </div>
      </div>
      <div class="row">
         @foreach ($catCount as $index => $cat)
                <div class="col-md-3 ftco-animate">
                    <ul class="category text-center">
                    <li><a href="{{ route('workersByCategorie', ['cat' => $cat[0]->id ]) }}"> {{ $index }} <br><span class="number">{{ $cat->count() }}</span> <span>Profissionais</span><i class="ion-ios-arrow-forward"></i></a></li>
                    </ul>
                </div>
        @endforeach
        </div>
        {{-- @foreach ($catCount as $index => $cat)
            @if(( array_search($index, array_keys($catCount->toArray() )) + 1) % 4 == 0)
            </ul>  
              </div>
                <div class="col-md-12 ftco-animate">
                    <ul class="category text-center">
                      <li><a href="#"> {{ $index }} <br><span class="number">{{ $cat->count() }}</span> <span>Profissionais</span><i class="ion-ios-arrow-forward"></i></a></li>
            @elseif(( array_search($index, array_keys($catCount->toArray() )) +1 ) % 4 == 1)
              <div class="col-md- ftco-animate">
                  <ul class="category text-center">
                      <li><a href="#"> {{ $index }} <br><span class="number">{{ $cat->count() }}</span> <span>Profissionais</span><i class="ion-ios-arrow-forward"></i></a></li>
            @else
                <li><a href="#"> {{ $index }} <br><span class="number">{{ $cat->count() }}</span> <span>Profissionais</span><i class="ion-ios-arrow-forward"></i></a></li>
            @endif
        @endforeach
        </div> --}}
 
      </div>
      </div>
  </section>

  <section class="ftco-section services-section">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-resume"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Search Millions of Jobs</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-team"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Easy To Manage Jobs</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>    
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-career"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Top Careers</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-employees"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Search Expert Candidates</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>      
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
          <div class="col-md">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Skillhunt Jobboard</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Employers</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="pb-1 d-block">Browse Candidates</a></li>
              <li><a href="#" class="pb-1 d-block">Post a Job</a></li>
              <li><a href="#" class="pb-1 d-block">Employer Listing</a></li>
              <li><a href="#" class="pb-1 d-block">Resume Page</a></li>
              <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
              <li><a href="#" class="pb-1 d-block">Job Packages</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Candidate</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="pb-1 d-block">Browse Jobs</a></li>
              <li><a href="#" class="pb-1 d-block">Submit Resume</a></li>
              <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
              <li><a href="#" class="pb-1 d-block">Browse Categories</a></li>
              <li><a href="#" class="pb-1 d-block">My Bookmarks</a></li>
              <li><a href="#" class="pb-1 d-block">Candidate Listing</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Account</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="pb-1 d-block">My Account</a></li>
              <li><a href="#" class="pb-1 d-block">Sign In</a></li>
              <li><a href="#" class="pb-1 d-block">Create Account</a></li>
              <li><a href="#" class="pb-1 d-block">Checkout</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>

<script>
function getLocation(){
  if (navigator.geolocation){
    console.log(navigator.geolocation.getCurrentPosition(showPosition));
  }else{
    console.log("O seu navegador não suporta Geolocalização.");
  }
}
function showPosition(position){
  console.log(position)
}
</script>
      
      
      Read more: http://www.linhadecodigo.com.br/artigo/3653/usando-geolocalizacao-com-html5.aspx#ixzz66QQzmpvf
@endsection