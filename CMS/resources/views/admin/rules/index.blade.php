@include('admin.sidenav')

<style>
    .home-section {
        width: calc(100% - 58px);
        overflow: auto;
        padding: 20px;
        background-color: #f0f0f0; /* Add background color for visual separation */
    }

    .home-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .panel h1, .panel h3 {
        margin: 0 0 10px 0;
        color: #333;
    }

    .panel p {
        color: #666;
        margin: 0 0 20px 0;
    }

    .panel hr {
        border: none;
        border-bottom: 1px solid #ddd;
        margin: 20px 0;
    }

    .panel2 {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    .half {
        width: 48%;
    }

    .half h3 {
        color: #00BF63;
        margin-bottom: 15px;
    }

    .half ul {
        list-style-type: none;
        padding-left: 0;
        margin: 0;
    }

    .half ul li {
        margin-bottom: 10px;
        color: #333;
        padding: 5px 10px;
        background-color: #e8f5e9;
        border-left: 4px solid #00BF63;
        border-radius: 5px;
    }
</style>

<section class="home-section">
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
                    <h3>Flowers & Decoration</h3>
                    <ul>
                        @foreach ($flowersDecorationRules as $rule)
                            <li>{{ $rule->description }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="half">
                    <h3>Reverence & Safety</h3>
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
