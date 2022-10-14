<x-layout>
    <!-- navigation bar -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
        
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="#">Property</a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </div>
  <!-- navigation bar ends here -->
  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())
            <x-post-grid :posts="$posts"/>
        @else
            <p class="center">No Posts Yet! Please Check Back Later</p>
            <br>
            <a href="/" > Back to Homepage </a>
        @endif
        
    </main>
</x-layout>