@include('user.sidenav')

<section class="home-section" style="width: calc(100% - 58px); overflow: scroll;">
    <div class="home-content">
        <div class="panel">
            @foreach ($ruleHeaders as $header)
                <h1>{{ $header->title }}</h1>
                <hr>
                <h3>{{ $header->greetings }}</h3>
                <p>{{ $header->description }}</p>
                <p>{{ $header->subdescription }}</p>
            @endforeach

            <div class="panel2">
                <div class="half">
                    <h3 style="color:#00BF63;">Flowers & Decoration</h3>
                    <ul>
                        @foreach ($flowersDecorationRules as $rule)
                            <li>{{ $rule->description }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="half">
                    <h3 style="color:#00BF63;">Reverence & Safety</h3>
                    <ul>
                        @foreach ($reverenceSafetyRules as $rule)
                            <li>{{ $rule->description }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
