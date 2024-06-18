<ul class="side-menu">
    @foreach(app('nav') as $items_head => $items )
        <li class="side-item side-item-category">{{$items_head}}</li>
        @foreach($items as $item)
            <li class="slide">
                <a class="nav-link side-menu__item" href="@if ($item['route']?? '') {{route($item['route'])}} @else /# @endif">
                    <span class="side-menu__label">{{$item['title']}}</span>
                    @if ($item['badge']?? "")
                        <span class="badge {{$item['badge_color_class']}} side-badge">{{$item['badge']}}</span>
                    @endif
                </a>
            </li>
        @endforeach
    @endforeach
</ul>
