@include('user.sidenav')

<section class="home-section" style="width: calc(100% - 58px); overflow:scroll;">
    <div class="home-content" style="display:block;">
        <div class="panel">
            <h1 style="text-align: left;">Pricing</h1><br>
            <hr><br>

            <div class="flex-box">
                @foreach ($lawnLots as $lawn)
                    <div class="card">
                        <p class="price">₱ {{ number_format($lawn->price, 2) }}</p>
                        <p class="title">Lawn Lot</p>
                        <ul class="lists">
                            <li class="list">
                                <span>{{ $lawn->size }}</span>
                            </li>
                            <li class="list">
                                <span>₱ {{ number_format($lawn->downpayment, 2) }} Downpayment</span>
                            </li>
                            <li class="list">
                                <span>₱ {{ number_format($lawn->installment, 2) }}/month for 6 months</span>
                            </li>
                            <li class="list">
                                <span>{{ $lawn->discount_for_cash_basis }}% Discount for Cash Basis</span>
                            </li>
                        </ul>
                        <a href="/user/appointment" class="action">Set an Appointment</a>
                    </div>
                @endforeach

                @foreach ($mausoleumLots as $mausoleum)
                    <div class="card">
                        <p class="price">₱ {{ number_format($mausoleum->price, 2) }}</p>
                        <p class="title">Mausoleum Lot</p>
                        <ul class="lists">
                            <li class="list">
                                <span>{{ $mausoleum->size }}</span>
                            </li>
                            <li class="list">
                                <span>₱ {{ number_format($mausoleum->downpayment, 2) }} Downpayment</span>
                            </li>
                            <li class="list">
                                <span>₱ {{ number_format($mausoleum->installment, 2) }}/month for 6 months</span>
                            </li>
                            <li class="list">
                                <span>{{ $mausoleum->discount_for_cash_basis }}% Discount for Cash Basis</span>
                            </li>
                        </ul>
                        <a href="/user/appointment" class="action">Set an Appointment</a>
                    </div>
                @endforeach

                @foreach ($intermentServices as $service)
                    <div class="card">
                        <p class="price">Interment Services</p>
                        <ul class="lists">
                            <li class="list">
                                <span>₱ {{ number_format($service->price_for_non_senior, 2) }} for Non-Senior</span>
                            </li>
                            <li class="list">
                                <span>₱ {{ number_format($service->price_for_senior, 2) }} for Senior</span>
                            </li>
                            <li class="list">
                                <span>₱ {{ number_format($service->price_for_transfer_of_bones, 2) }} for Transfer of Bones</span>
                            </li>
                        </ul>
                        <a href="/user/appointment" class="action">Set an Appointment</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
