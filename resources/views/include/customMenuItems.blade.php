@foreach($items as $item)
<ul class="menu">
    @if (!$item->hasChildren())
        <li><div class="item" id="{{ $item->id }}">
          <a href="/category/{{$item->id}}" class="link">{{ $item->title }}</a>
            <div class="clear"></div>
</div></li>
    @else
        <li>
          <div class="item" id="{{ $item->id }}">
            <a href="/category/{{$item->id}}" class="link">{{ $item->title }}</a>
            <div class="clear"></div>
        </div>
            @if($item->hasChildren())
            <div class="sub-menu">
              @include(env('THEME').'include.customMenuItems', ['items'=>$item->children()])
            </div>
            @endif
        </li>
        @endif
</ul>
@endforeach