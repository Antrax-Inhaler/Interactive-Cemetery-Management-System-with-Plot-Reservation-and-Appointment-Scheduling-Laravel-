{{-- resources/views/user/analytics.blade.php --}}
@include('user.sidenav')
<section class="home-section" style="width: calc(100% - 58px); overflow: scroll">
  <div class="home-content" style="display:block;">
    <div class="panel">
      <h1 style="text-align: left;">Analytics</h1><br>
      <hr><br>
    </div>
    <!-- start -->
    <h2 class="chart-heading">Greenpark Population</h2>
    <div class="panel2">
      <div class="half">
        <div class="programming-stats">
          <div class="chart-container">
            <canvas class="my-chart"></canvas>
          </div>
          <div class="details">
            <ul></ul>
          </div>
        </div>
      </div>
      <div class="half">
        <canvas class="bar-chart"></canvas>
      </div>
    </div>
    <!-- end -->
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const genderData = @json($genderDistribution);
    const ageData = @json($ageDistribution);

    // Prepare data for gender pie chart
    const genderLabels = genderData.map(g => g.gender);
    const genderCounts = genderData.map(g => g.total);

    // Prepare data for age bar chart
    const ageLabels = ageData.map(a => a.age_group);
    const ageCounts = ageData.map(a => a.total);

    // Gender Pie Chart
    const pieCtx = document.querySelector('.my-chart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: genderLabels,
            datasets: [{
                label: 'Population by Gender',
                data: genderCounts,
                backgroundColor: [
                    '#36A2EB', // Male
                    '#FF6384'  // Female
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });

    // Age Bar Chart
    const barCtx = document.querySelector('.bar-chart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ageLabels,
            datasets: [{
                label: 'Population by Age Group',
                data: ageCounts,
                backgroundColor: [
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
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

</script>