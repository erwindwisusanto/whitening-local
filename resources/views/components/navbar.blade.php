<nav class="nav nav-top fixed-top">
    <div class="container">
        <div class="d-flex align-items-center">
            <a href="" class="nav-brand">
                <img src="assets/img/logo.png" alt="">
            </a>
            @php
                $locale = session()->get('locale');
                $available_locales = config('app.available_locales');
            @endphp
            <div class="btn-group ms-auto">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="mdi mdi-earth me-2"></i>{{ $locale === 'en' ? 'EN' : ($locale !== null ? strtoupper($locale) : 'ID') }}
                </button>
                @php $locale = session()->get('locale'); @endphp
                <ul class="dropdown-menu dropdown-menu-end">
                    @foreach($available_locales as $key => $name)
                        <li>
                            <a class="dropdown-item" href="{{ route('change_locale', ['locale' => $name]) }}" type="button">
                                {{ $key }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>
