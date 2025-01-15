@include('user.sidenav')
<section class="home-section" style="width: calc(100% - 58px);">
    <div class="home-content">
        <div class="slider">
            <div class="list">
                @forelse ($places as $place)
                    <div class="item">
                        <img src="{{ asset($place->image) }}" alt="{{ $place->title }}">
                        <div class="content">
                            <div class="title">{{ $place->title }}</div>
                            <div class="description">
                                {{ $place->description }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="item">
                        <p>No places available</p>
                    </div>
                @endforelse
            </div>
    
            <div class="thumbnail">
                @foreach ($places as $place)
                    <div class="item">
                        <img src="{{ asset($place->image) }}" alt="{{ $place->title }}">
                    </div>
                @endforeach
            </div>
    
            <div class="nextPrevArrows">
                <button class="prev"> < </button>
                <button class="next"> > </button>
            </div>
        </div>
    </div>
</section>
<script
    src="https://www.chatbase.co/embed.min.js"
    chatbotId="XJrq5XGGemsfY5X_30vHq"
    domain="www.chatbase.co"
    defer>
</script>
<script src="/js/scripts.js"></script>
