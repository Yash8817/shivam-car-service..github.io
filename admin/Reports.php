<?php require "sidebar.php"?>
     


<div class="shadow-lg rounded-lg overflow-hidden">
  <div class="py-3 px-5 bg-gray-50">service graph</div>
  <canvas class="p-10" id="chartBar"></canvas>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart bar -->
<script>
  const labelsBarChart = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
  ];
  const dataBarChart = {
    labels: labelsBarChart,
    datasets: [
      {
        label: "service ",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
        data: [0, 10, 5, 2, 20, 30, 45],
      },
    ],
  };

  const configBarChart = {
    type: "bar",
    data: dataBarChart,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("chartBar"),
    configBarChart
  );
</script>

