<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope-o"></i>
        @if($books->count() > 0)
        <span class="label label-success">{{ $books->count() }}</span>
        @endif
    </a>
    <ul class="dropdown-menu">
        {{-- 罗列账套 --}}
        <li class="header">可切换的账套 </li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">

                @foreach($books as $book)
                <li><!-- start book -->
                    <a href="{{ $book->url }}">
                        {{--<div class="pull-left">--}}
                            {{--<img src="{{$book->icon?:''}}" class="img-circle" alt="User Image">--}}
                        {{--</div>--}}
                        <h4>
                            {{$book->title}}
                            <small><i class="fa fa-clock-o"></i> {{ $book->created_at->diffForHumans() }}</small>
                        </h4>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="footer"><a href="/">Choose All Messages</a></li>
    </ul>
</li>