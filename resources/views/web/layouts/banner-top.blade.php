@isset($title_banner)
    <section class="breadcrumb-page" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{$title_banner->background}});">
        <div class="container-fluid breadcrumb-info">
            <h2 class="breadcrumb-page__title">{{$title_banner->title}}</h2>
            <nav class="breadcrumb-page__nav">
                <ul>
                    @foreach($title_banner->nav as $nav)
                        <li>
                            <a href="{{$nav->active ? 'javascript:void(0);' : $nav->link}}" class="{{$nav->active ? 'active' : ''}}">{{$nav->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </section>
@endisset
