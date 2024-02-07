@extends('site.layouts.master')
@section('css')
@endsection

@section('header')
<header class="navigation">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light px-0">
        <a class="navbar-brand order-1 py-0" href="index.html">
          <img loading="prelaod" decoding="async" class="img-fluid" src="{{URL::asset('theme/images/logo.png')}}" alt="Reporter Hugo">
        </a>
        <div class="navbar-actions order-3 ml-0 ml-md-4">
          <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button" data-toggle="collapse"
            data-target="#navigation"> <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        @if (auth()->user())
        
            <div class="row search order-lg-3 order-md-2 order-3 ml-auto">      

              @if(auth()->user()->role == "admin")
                <div class="content"> <a class="read-more-btn" style="font-size: 20px;" href="{{ url('cpanel') }}">Dashboard</a></div>                  
              
              @elseif (auth()->user()->role == "composer")
                <div class="content"> <a class="read-more-btn" style="font-size: 20px;" href="{{ url('cpanelc') }}">Dashboard</a></div>                  
              
              @endif
              &nbsp; &nbsp;
              
              <div class="content"> <a class="read-more-btn" style="font-size: 20px;" href="{{ route('profile.edit') }}">Profile</a></div>                  
              &nbsp; &nbsp;

                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button style="background: none; border: none; font-weight: bold;" type="submit"> Logout</button>
                </form>
              
            </div>

        @else

        <form action="#!" class="search order-lg-3 order-md-2 order-3 ml-auto">
          <div class="row">      
            <div class="content"> <a class="read-more-btn" style="font-size: 20px;" href="{{ route('login') }}">Login</a></div>                  
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <div class="content"> <a class="read-more-btn" style="font-size: 20px;" href="{{ route('register') }}">SignUp</a></div>                  
          </div>
      </form>

        @endif

        <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
          <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
            <li class="nav-item"> <a class="nav-link" href="about.html">About Me</a>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu">

                @foreach ($categories as $category)
                <a class="dropdown-item" href="">{{ $category->category_name }}</a>
                @endforeach

              </div>
            </li>
            <li class="nav-item"> <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
@endsection


@section('content')

<main>
    <section class="section">
      <div class="container">
        <div class="row no-gutters-lg">
          <div class="col-12">
            <h2 class="section-title">Latest Articles</h2>
          </div>
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="row">


              @foreach ($news as $new)

              <div class="col-md-6 mb-4">
                <article class="card article-card article-card-sm h-100">
                  <a href="article.html">
                    <div class="card-image">
                      <div class="post-info"> <span class="text-uppercase">{{ $new->created_at->format('Y-m-d') }}</span>
                        <span class="text-uppercase">{{ $new->created_at->format('H:i:s') }}</span>
                      </div>
                      <img loading="lazy" decoding="async" src="{{URL::asset('theme/images/post/post-1.jpg')}}" alt="Post Thumbnail" class="w-100">
                    </div>
                  </a>
                  <div class="card-body px-0 pb-0">
                    <ul class="post-meta mb-2">
                      <li style="color: #13AE6F;">{{ App\Models\Category::find($new->category_id)->category_name }}</li>
                    </ul>
                    <h2>{{ $new->title }}</h2>
                    {{-- <p class="card-text">{{ $new->content }}</p> --}}
                    <div class="content"> <a class="read-more-btn" href="{{ route('show_news', $new->id) }}">Read Full Article</a> </div>  
                  </div>
                </article>
              </div>

              @endforeach
            
              
              <div class="col-12">
                <div class="row">
                  <div class="col-12">
                    <nav class="mt-4">
                      <!-- pagination -->
                      <nav class="mb-md-50">
                        <ul class="pagination justify-content-center">
                          <li class="page-item">
                            <a class="page-link" href="#!" aria-label="Pagination Arrow">
                              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                              </svg>
                            </a>
                          </li>
                          <li class="page-item active "> <a href="index.html" class="page-link">
                              1
                            </a>
                          </li>
                          <li class="page-item"> <a href="#!" class="page-link">
                              2
                            </a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#!" aria-label="Pagination Arrow">
                              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
    <div class="widget-blocks">
      <div class="row">

        {{-- <div class="col-lg-12">
          <div class="widget">
            <div class="widget-body">
              <img loading="lazy" decoding="async" src="{{URL::asset('theme/images/author.jpg')}}" alt="About Me" class="w-100 author-thumb-sm d-block">
              <h2 class="widget-title my-3">Hootan Safiyari</h2>
              <p class="mb-3 pb-2">Hello, I’m Hootan Safiyari. A Content writter, Developer and Story teller. Working as a Content writter at CoolTech Agency. Quam nihil …</p> <a href="about.html" class="btn btn-sm btn-outline-primary">Know
                More</a>
            </div>
          </div>
        </div> --}}

        <div class="col-lg-12 col-md-6">
          <div class="widget">
            <h2 class="section-title mb-3">Categories</h2>
            <div class="widget-body">
              <ul class="widget-list">

                @foreach($categories as $category)
                    <li><a href="">{{ $category->category_name }}<span class="ml-auto">({{ $count }})</span></a></li>
				        @endforeach
                
              </ul>
            </div>
          </div>
        </div>


        {{-- <div class="col-lg-12 col-md-6">
          <div class="widget">
            <h2 class="section-title mb-3">Recommended</h2>
            <div class="widget-body">
              <div class="widget-list">
                <article class="card mb-4">
                  <div class="card-image">
                    <div class="post-info"> <span class="text-uppercase">1 minutes read</span>
                    </div>
                    <img loading="lazy" decoding="async" src="{{URL::asset('theme/images/post/post-9.jpg')}}" alt="Post Thumbnail" class="w-100">
                  </div>
                  <div class="card-body px-0 pb-1">
                    <h3><a class="post-title post-title-sm"
                        href="article.html">Portugal and France Now
                        Allow Unvaccinated Tourists</a></h3>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor …</p>
                    <div class="content"> <a class="read-more-btn" href="article.html">Read Full Article</a>
                    </div>
                  </div>
                </article>
                <a class="media align-items-center" href="article.html">
                  <img loading="lazy" decoding="async" src="{{URL::asset('theme/images/post/post-2.jpg')}}" alt="Post Thumbnail" class="w-100">
                  <div class="media-body ml-3">
                    <h3 style="margin-top:-5px">These Are Making It Easier To Visit</h3>
                    <p class="mb-0 small">Heading Here is example of hedings. You can use …</p>
                  </div>
                </a>
                <a class="media align-items-center" href="article.html"> <span class="image-fallback image-fallback-xs">No Image Specified</span>
                  <div class="media-body ml-3">
                    <h3 style="margin-top:-5px">No Image specified</h3>
                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur adipiscing …</p>
                  </div>
                </a>
                <a class="media align-items-center" href="article.html">
                  <img loading="lazy" decoding="async" src="{{URL::asset('theme/images/post/post-5.jpg')}}" alt="Post Thumbnail" class="w-100">
                  <div class="media-body ml-3">
                    <h3 style="margin-top:-5px">Perfect For Fashion</h3>
                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur adipiscing …</p>
                  </div>
                </a>
                <a class="media align-items-center" href="article.html">
                  <img loading="lazy" decoding="async" src="{{URL::asset('theme/images/post/post-9.jpg')}}" alt="Post Thumbnail" class="w-100">
                  <div class="media-body ml-3">
                    <h3 style="margin-top:-5px">Record Utra Smooth Video</h3>
                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur adipiscing …</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div> --}}
        
      </div>
    </div>
  </div>
        </div>
      </div>
    </section>
  </main>

@endsection


@section('js')

<!-- # JS Plugins -->
<script src="{{URL::asset('theme/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('theme/plugins/bootstrap/bootstrap.min.js')}}"></script>

<!-- Main Script -->
<script src="{{URL::asset('theme/js/script.js')}}"></script>

@endsection
