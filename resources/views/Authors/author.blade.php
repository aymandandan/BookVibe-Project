<x-app-layout>
  <div class="authorContainer">
    <header class="firstCon">
      <h1 class="authorName">{{$authName }}</h1>
      <div style="width: 50%">
        <p>{{ $authAbout}}</p>
      </div>
    </header>
    <section class="booksForAuthor">
     @foreach ($authorDetails as $auth)
       
     @endforeach
    </section>
  </div>
</x-app-layout>