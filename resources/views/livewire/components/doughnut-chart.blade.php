<div>
    <center>{{$total}} playsfy reviews</center>
    <canvas id="canvas1" width="100%"></canvas>
</div>
<script src="{{ asset('assets/libs/chart-js/Chart.bundle.min.js') }}"></script>
<script>
    // Doughnut Chart 
    $(document).ready(function() {
        var options = {
            // legend: false,
            responsive: true
        };
        new Chart($("#canvas1"), {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: {
                labels: [
                    "1 ★",
                    "2 ★",
                    "3 ★",
                    "4 ★",
                    "5 ★"
                ],
                datasets: [{
                    data: [{{$s1}},{{$s2}},{{$s3}},{{$s4}},{{$s5}}],
                    backgroundColor: [
                        "#585B56",
                        "#937D64",
                        "#D7AF70",
                        "#0cdf87",
                        "#6fff0f"
                    ],
                    hoverBackgroundColor: [
                        "#4E514C",
                        "#806D57",
                        "#CE9E51",
                        "#05b66c",
                        "#59da03"
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    });

</script>