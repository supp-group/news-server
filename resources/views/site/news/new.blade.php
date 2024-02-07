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
                Articles
              </a>
              <div class="dropdown-menu"> <a class="dropdown-item" href="travel.html">Travel</a>
                <a class="dropdown-item" href="travel.html">Lifestyle</a>
                <a class="dropdown-item" href="travel.html">Cruises</a>
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
		@foreach ($news as $new)

			<div class="row">
				<div class="col-lg-6 mb-6">
						
					<article>
						<img loading="lazy" decoding="async" src="{{asset('images/'.$new->news_image)}}" alt="Post Thumbnail" class="w-100">
						<br><br>

						
						<form action="{{ route('show_news', $new->id) }}" method="post">
							@csrf
						<div class="widget author-widget clearfix">
							<h3>All Comments</h3>
							<br>
						@foreach ($comments as $comment)

							<div class="about-author">
								<div class="author-details">
									<span class="blog-author-name">{{ App\Models\User::find($comment->user_id)->name }}</span>
									<p>{{ $comment->content }}</p>
									<span class="blog-date">{{ $comment->created_at->format('Y-M-d') }}</span>
								</div>
							</div>
							<br><hr><br>

						@endforeach
 
						</div>
					</form>
					

					</article>

				</div>

				<div class="col-lg-6 mb-6">
					<ul class="post-meta mb-2 mt-4">
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="margin-right:5px;margin-top:-4px" class="text-dark" viewBox="0 0 16 16">
								<path d="M5.5 10.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
								<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
								<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
							</svg> <span>{{ $new->created_at->format('Y-M-d') }}</span>
						</li>
					</ul>
					<h1 class="my-3">{{ $new->title }}</h1>
						<ul class="post-meta mb-4">
							<li> <a href="/categories/destination">{{ App\Models\Category::find($new->category_id)->category_name }}</a>
							</li>
						</ul>
						<div class="content text-left">
							{{-- <h1 id="heading">Heading</h1>
							<p>Here is example of hedings. You can use this heading by following markdownify rules. For example: use <code>#</code> for heading 1 and use <code>######</code> for heading 6.</p> --}}
							<hr>
							<h2 id="paragraph">Content</h2>
							<p>{{ $new->content }}</p>
						</div>

						@if (auth()->user())
							
						<hr>
						<div style="text-align: center; padding-bottom: 30px;">
							<h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Comments</h1>
							<form action="{{  route('comment.save', $new->id) }}" method="POST">
								@csrf
								<input type="hidden" name="user_id" value="{{ auth()->id() }}">
								<textarea style="height: 150px; width: 600px;" name="content" placeholder="Comment something here"></textarea>
								<br>
								<div class="d-flex justify-content-center">
									<button type="submit" class="btn btn-primary">Comment</button>
								</div>
							</form>
						</div>

						@endif

						{{-- <div>
							<b>Hind</b>
							<p>This is my first comment</p>
							<a href="javascript::void(0)" onclick="reply(this)">Reply</a>
						</div>

						<div>
							<b>Rama</b>
							<p>This is my second comment</p>
							<a href="javascript::void(0)" onclick="reply(this)">Reply</a>
						</div>

						<div style="display: none;" class="replyDiv">
							<textarea style="height: 100px; width:500px;" placeholder="Write something here"></textarea> <br>
							<a href="" class="btn btn-primary">Reply</a>
						</div> --}}
						
				</div>
			</div>

		@endforeach

		</div>
	</section>
</main>

@endsection


@section('js')

{{-- <script type="text/javascript">

	function reply(caller){

		$('.replyDiv').insertAfter($(caller));
		$('.replyDiv').show();

	}

</script> --}}

<!-- # JS Plugins -->
<script src="{{URL::asset('theme/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('theme/plugins/bootstrap/bootstrap.min.js')}}"></script>

<!-- Main Script -->
<script src="{{URL::asset('theme/js/script.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
@endsection
