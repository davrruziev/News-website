<section class="posts">
    <div class="container">
        <ul class="posts__list basic-flex">
            @foreach($specialPost as $post)
                <li class="posts__item">
                    <a href="{{ route('postDetail', $post->slug) }}">
                        <img src="/site/images/posts/{{ $post->img }}" alt="Image" class="posts__img">
                        <h2 class="posts__title">{{ $post['title_'.\App::getLocale()] }}</h2>
                        <span class="posts__date">view -{{ $post->view }}/{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.Y') }}</span>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</section>

<div class="container">
    <div class="notification basic-flex">
        <div class="notification__text basic-flex">
            <h3>Хотите узнать новости первыми? подключите уведомления!
            </h3>
        </div>
        <button type="button" class="notification__button btn">
            Включит  уведомления!
        </button>
    </div>
</div>
