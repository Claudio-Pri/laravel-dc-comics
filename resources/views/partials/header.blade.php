@php
    $links = [
        [
            'url' => '/',
            'label' => 'Home',
            'active' => true,
        ],
        [
            'url' => '/chi-siamo',
            'label' => 'Chi siamo',
            'active' => true,
        ],
        [
            'url' => route('comics.index'),
            'label' => 'Comics',
            'active' => true,
        ],
        
    ];
@endphp
<header>
    <div class="header-top"></div>
    <div class="container">
      <div class="my-header d-flex py-3 align-items-center justify-content-between">
        <div>
          <a href="{{ $links[0]['url'] }}">
            <img class="logo img-fluid" src="{{ asset('image/dc-logo.png') }}" alt="DC Logo">
          </a>
        </div>
        {{-- nav menuLinks --}}
        <nav>
          <ul class="d-flex align-items-center">
            @foreach ($links as $link)
                <li>
                    @if ($link['active'])
                        <a href="{{ $link['url'] }}">
                            {{ $link['label'] }}
                        </a>
                    @endif
                </li>
            @endforeach
          </ul>
        </nav>
      </div>
    </div>
  </header>
