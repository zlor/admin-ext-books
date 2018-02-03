<style>
    .navbar-nav>.books-menu>.dropdown-menu>li {
        position: relative;
    }
    .navbar-nav>.books-menu>.dropdown-menu>li.header{
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        background-color: #ffffff;
        padding: 7px 10px;
        border-bottom: 1px solid #f4f4f4;
        color: #444444;
        font-size: 14px;
    }
    .navbar-nav>.books-menu>.dropdown-menu>li .menu{
        max-height: 200px;
        margin: 0;
        padding: 0;
        list-style: none;
        overflow-x: hidden;
    }
    .navbar-nav>.books-menu>.dropdown-menu>li.footer{
        position: relative;
    }
</style>
<li class="dropdown books-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-book"></i>
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
    </ul>
</li>