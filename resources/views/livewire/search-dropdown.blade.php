<div>
    <input type="text" class="form-input" placeholder="Search..." wire:model="searchTerm">
    <ul>
        {{ $searchTerm}}<br>

        @foreach($searchs as $search)

        @if($searchTerm!=NULL)

        <a href="{{url('book')}}/{{$search->isbn}}">
        {{ $search['title']}}
        {{ $search->author}}
        {{ $search->isbn}}
        {{ $search->description}}
        </a>
        @endif


        @endforeach
 
    </ul>
</div>