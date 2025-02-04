<x-app-layout>
  <div class="authorContainer">
    <header class="firstCon">
      <h1 class="authorName">{{$authName }}</h1>
      <div style="width: 50%">
        <p>{{ $authAbout}}</p>
      </div>
    </header>
    <div class="section_Author">
      Books Written by {{$authName}}
    </div>
    <div class="grid sm:grid-cols-3 gap-1 grid-cols-1 lg:grid-cols-5" style="padding-inline: 50px">
     @foreach ($authorDetails as $singleRecord)
        <div class=" bg-white flex gap-2 flex-col rounded-lg py-4 px-3 w-auto shadow-lg">
            <a href="#" class="w-full h-auto flex items-center justify-center bg-gray-100 p-0.5 rounded-sm">
                <img alt="book cover" src="{{ asset($singleRecord->coverImg) }}" class="card-img">
            </a>
            
            <a href="#" class="text-center">
                {{ $singleRecord->title }}
            </a>
  
            <div class="text-sm">
                <a href="{{route('authorPage',$singleRecord->authorId)}}">{{$authName}}</a>
            </div>
  
            <div class="flex text-grey-500 text-sm">
                       {{$singleRecord->type }} 
            </div>
  
            <div class="flex text-sm">
              Price:
                <div class="ml-1">
                    {{$singleRecord->bookPrice }}
                </div>
            </div>
  
            <div class="w-auto flex flex-row gap-2 justify-between mt-auto">
              <form class="w-full" action="{{route('add.Cart',$singleRecord->bookId)}}" method="POST">
                  @csrf         
                  <button class="w-full bg-primary-500 rounded-xl shadow text-grey-100 py-1 sm:px-1 px-2 hover:bg-primary-400 hover:text-white transition ease-in-out duration-150" type="submit">
                      ADD TO CART
                  </button>
              </form>
              <form class="w-fit">
                  <button class="w-auto px-2 py-1 bg-indigo-400 text-grey-100 shadow rounded-xl hover:bg-indigo-300 hover:text-white transition ease-in-out duration-150 fill-grey-100">
                      <svg class="fill-current h-6 w-6" viewBox="0 0 24 24" fill="none">
                          <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" fill="inherit" d="M11.993 5.09691C11.0387 4.25883 9.78328 3.75 8.40796 3.75C5.42122 3.75 3 6.1497 3 9.10988C3 10.473 3.50639 11.7242 4.35199 12.67L12 20.25L19.4216 12.8944L19.641 12.6631C20.4866 11.7172 21 10.473 21 9.10988C21 6.1497 18.5788 3.75 15.592 3.75C14.2167 3.75 12.9613 4.25883 12.007 5.09692L12 5.08998L11.993 5.09691ZM12 7.09938L12.0549 7.14755L12.9079 6.30208L12.9968 6.22399C13.6868 5.61806 14.5932 5.25 15.592 5.25C17.763 5.25 19.5 6.99073 19.5 9.10988C19.5 10.0813 19.1385 10.9674 18.5363 11.6481L18.3492 11.8453L12 18.1381L5.44274 11.6391C4.85393 10.9658 4.5 10.0809 4.5 9.10988C4.5 6.99073 6.23699 5.25 8.40796 5.25C9.40675 5.25 10.3132 5.61806 11.0032 6.22398L11.0921 6.30203L11.9452 7.14752L12 7.09938Z"></path>
                          </g>
                    </svg>
                  </button>
              </form>
            </div>
        </div>
     @endforeach
    </div>
  </div>
</x-app-layout>