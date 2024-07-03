
@extends('layouts.site')

@section('title')
    Yangilik
@endsection
@section('content')
    <section class="news">
        <div class="container">
            <div class="news__wrapper basic-flex">
                <div class="column-news">
                    <h2 class="news__title">
                        @if(count($posts) > 0)
                            {{ $key }} - qidirilayotgan so'zdan jami topilganlari {{ count($posts) }}</h2>
                    @else
                        {{ $key }} -qidiruv natijalari topilmadi
                    @endif
                    <ul class="news__list basic-flex">
                        @foreach($posts as $post)
                            <li class="news__item">
                                <a href="{{ route('postDetail', $post->slug) }}" class="basic-flex news__link">
                                    <div class="news-image-wrapper"><img src="img/bottom1.png" alt="Bottom Img"></div>
                                    <div class="news-box basic-flex">
                                        <h4 class="news__title">{{ $post['title_'.\App::getLocale()] }}</h4>
                                        <p class="news__description">{{ \Illuminate\Support\Str::limit($post['body_'.\App::getLocale()],100) }}
                                        </p>
                                        <span class="news__date basic-flex">view -{{ $post->view }}/{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.Y') }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                    <button type="button" class="btn load-more-btn">{{ $posts->links() }}</button>
                </div>
                @include('sections.popularPosts')
            </div>
        </div>
    </section>
@endsection
