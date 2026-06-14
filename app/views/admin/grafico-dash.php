<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Mês', 'Curtidas'],
          ["Jan", <?= $curtidasMes[0] ?>],
          ["Fev", <?= $curtidasMes[1] ?> ],
          ["Mar", <?= $curtidasMes[2] ?> ],
          ["Abr", <?= $curtidasMes[3] ?>],
          ["Mai", <?= $curtidasMes[4] ?>],
          ["Jun", <?= $curtidasMes[5] ?>],
          ["Jul", <?= $curtidasMes[6] ?>],
          ["Ago", <?= $curtidasMes[7] ?>],
          ["Set", <?= $curtidasMes[8] ?>],
          ["Out", <?= $curtidasMes[9] ?>],
          ["Nov", <?= $curtidasMes[10] ?>],
          ["Dez", <?= $curtidasMes[11] ?>],
        ]);

        var isMobile = window.innerWidth < 768;

        var options = {
          height: isMobile ? 180 : 300,
          legend: { position: 'none' },

          backgroundColor: '#2A2D3A', 
        
          chartArea: {
            backgroundColor: '#3b4250',
            top: isMobile ? 0 : 50,
            width: isMobile ? '95%' : '80%', 
            height: isMobile ? '60%' : '70%',
          },

          hAxis: {
            textStyle: { 
              color: '#ffffff', 
              fontSize: isMobile ? 10 : 12 
            },
            slantedText: isMobile, 
            slantedTextAngle: 45
          },
          vAxis: {
            textStyle: { 
              color: '#ffffff',
              fontSize: isMobile ? 10 : 12 
            },
            gridlines: { color: '#4f5b75' }
          },
          
          bar: { groupWidth: "80%" },
          colors: ['#22ffb5'] 
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('top_x_div'));
        chart.draw(data, options);

      };  

      window.addEventListener('resize', drawStuff);

    </script>
  </head>
  <body>
    <div id="top_x_div" style="background-color: #2d3446;"></div>
  </body>
</html>