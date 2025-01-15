@include('admin.sidenav')

<section class="home-section" style="width: calc(100% - 58px); overflow:scroll">
    <div class="home-content" style="display:block; color: #fff;">
        <div class="panel">
            <h1 style="text-align: left;">Admin Dashboard</h1><br>
            <hr><br>
            <div class="panel">
                <div class="primary">
                    <!-- grid start -->
                    <div class="grid">
                        <div class="half">
                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                            <lord-icon
                                src="https://cdn.lordicon.com/bgebyztw.json"
                                trigger="hover"
                                stroke="bold"
                                colors="primary:#00bf63,secondary:#00bf63"
                                style="width:80px;height:80px">
                            </lord-icon>
                        </div>
                        <div class="half">
                            <h1 class="data">{{ $totalClients }}</h1><br>
                            <p class="label">Clients</p>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="half">
                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                            <lord-icon
                                src="https://cdn.lordicon.com/wyqtxzeh.json"
                                trigger="hover"
                                stroke="bold"
                                colors="primary:#00bf63,secondary:#00bf63"
                                style="width:80px;height:80px">
                            </lord-icon>
                        </div>
                        <div class="half">
                            <h1 class="data">{{ $totalTransactions }}</h1><br>
                            <p class="label">Transactions</p>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="half">
                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                            <lord-icon
                                src="https://cdn.lordicon.com/qsplhlpp.json"
                                trigger="hover"
                                stroke="bold"
                                colors="primary:#00bf63,secondary:#00bf63"
                                style="width:80px;height:80px">
                            </lord-icon>
                        </div>
                        <div class="half">
                            <h1 class="data">{{ $totalPopulation }}</h1><br>
                            <p class="label">Population</p>
                        </div>
                    </div>
                    <!-- end -->
                </div>
            </div>

            <!-- chart -->
            <br>
            <div class="panel2">
                <div class="half">
                    <h2 style="font-size:15px;color:#00BF63;">Population Distribution</h2> <br>
                    <div class="programming-stats">
                        <div class="chart-container">
                            <canvas class="my-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="half">
                    <div class="box" style="background-color:#1d1b31; border:solid 0.01rem #fff; height: ; ">
                        <h2 style="font-size:15px;color:#00BF63;">Appointment & Reservation Request</h2> <br>
                        <div style="height: 400px; overflow-y: auto;" >
                            @foreach($appointmentRequests as $request)
                            <div class="panel" style="display:flex; text-align:left;">
                                <div class="notification-list-container" >
                                    <div class="notification-list" >
                                        <div class="notification-item">
                                            <form action="/admin/appointment" method="get">
                                                <button type="submit" class="btn-link">
                                                    Appointment: {{ $request->date }} at {{ $request->time }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        @endforeach
                    @foreach($reservationRequests as $request)
                            <div class="panel" style="display:flex; text-align:left;">
                                <div class="notification-list-container">
                                    <div class="notification-list">
                                        <div class="notification-item">
                                            <form action="/admin/reservation" method="get">
                                                <button type="submit" class="btn-link">
                                                    Reservation: {{ $request->date }} at {{ $request->time }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        @endforeach

                        <!-- Add pagination links -->
                        <div class="pagination" style="display: none;">
                            {{ $appointmentRequests->links() }}
                            {{ $reservationRequests->links() }}
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- chart -->
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const genderData = @json($genderDistribution);
    const ageData = @json($ageDistribution);

    const labels = ['Male', 'Female', 'Child (0-9)', 'Teenager (10-19)', 'Adult (20-59)', 'Senior (60+)'];
    const data = [
        genderData['Male'] || 0,
        genderData['Female'] || 0,
        ageData['Child (0-9)'] || 0,
        ageData['Teenager (10-19)'] || 0,
        ageData['Adult (20-59)'] || 0,
        ageData['Senior (60+)'] || 0
    ];

    const ctx = document.querySelector('.my-chart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Population Distribution',
                data: data,
                backgroundColor: [
                    '#36A2EB', // Male
                    '#FF6384', // Female
                    '#FFCE56', // Child
                    '#4BC0C0', // Teenager
                    '#9966FF', // Adult
                    '#FF9F40'  // Senior
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>

<style>
    .btn-link {
        background: none;
        border: none;
        color: #00BF63;
        cursor: pointer;
        padding: 0;
    }
    .btn-link:hover {
        color: #00BF63;
        text-decoration: none;
    }
</style>
