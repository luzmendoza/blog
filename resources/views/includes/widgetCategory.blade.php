<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            @foreach($categories as $category)
            <li>
              <a href="{{ route('categories.show', $category )}}">{{$category->name}}</a>
            </li>
            @endforeach
          </ul>
        </div>
        <!--<div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#">JavaScript</a>
            </li>
            <li>
              <a href="#">CSS</a>
            </li>
            <li>
              <a href="#">Tutorials</a>
            </li>
          </ul>
        </div>-->
      </div>
    </div>
  </div>

  <!-- Side Widget -->
  <div class="card my-4">
    <h5 class="card-header">Autores</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            @foreach($authores as $author)
            <li>
              <!--<a href="{{ route('admin.users.show', $author )}}">{{$author->name}}</a>-->
              <a href="#">{{$author->name}}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Side Widget -->
  <div class="card my-4">
    <h5 class="card-header">Ultimas Publicaciones</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            @foreach($lastposts as $lastpost)
            <li>
              <a href="{{ route('posts.show', $lastpost->url )}}">{{$lastpost->title}}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div> 

<!-- Side Widget -->
  <div class="card my-4">
    <h5 class="card-header">Publicaciones por mes</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            @foreach($archivo as $date)
            <li class="text-capitalize">
              <a href="{{ route('pages.home' , ['month' => $date->month, 'year' => $date->year]) }}">
                {{$date->monthname}} {{$date->year}} ({{$date->posts}})
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div> 