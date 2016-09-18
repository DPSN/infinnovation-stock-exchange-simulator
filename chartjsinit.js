var chart = function(id, labels, values) {
    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: labels,
          datasets: [{
              label: id,
              data: values,
              backgroundColor: "rgba(200,200,200,0.7)"
          }]
      }
    });
};