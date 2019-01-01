/*=========================================================================================
    File Name: dashboard-analytics.js
    Description: intialize advance cards
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
    ==========================================================================================*/
$(window).on('load', function() {

    // Hit Rate Chart - CharJS Doughnut
    Chart.defaults.arrivalDoughnut = Chart.defaults.doughnut;
    var draw = Chart.controllers.doughnut.prototype.draw;
    var customArrivalDoughnut = Chart.controllers.doughnut.extend({
        draw: function() {
            draw.apply(this, arguments);
            var ctx = this.chart.chart.ctx;
            var _fill = ctx.fill;
            var width = this.chart.width,
                height = this.chart.height;

            var fontSize = (height / 114).toFixed(2);
            this.chart.ctx.font = fontSize + "em Verdana";
            this.chart.ctx.textBaseline = "middle";

            var text = "27R",
                textX = Math.round((width - this.chart.ctx.measureText(text).width) / 2),
                textY = height / 2;

            this.chart.ctx.fillText(text, textX, textY);

            ctx.fill = function() {
                ctx.save();
                ctx.shadowColor = '#bbbbbb';
                ctx.shadowBlur = 30;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 12;
                _fill.apply(this, arguments)
                ctx.restore();
            }
        }
    });

    Chart.controllers.arrivalDoughnut = customArrivalDoughnut;
    var ctx = document.getElementById("arrival-doughnut");
    var myArrivalDoughnut = new Chart(ctx, {
        type: 'arrivalDoughnut',
        data: {
            labels: ["Arrival"],
            datasets: [{
                label: "Favourite",
                backgroundColor: ["#FFF"],
                data: [100],
            }]
        },
        options: {
            events: [],
            responsive: true,
            title: {
                display: false
            },
            legend: {
                display: false
            },
            layout: {
                padding: {
                    left: 16,
                    right: 16,
                    top: 16,
                    bottom: 16
                }
            },
            cutoutPercentage: 92,
            animation:{
                animateScale : false,
                duration: 2500
            }
        }
    });

    // Deals Chart - CharJS Doughnut
    Chart.defaults.departureDoughnut = Chart.defaults.doughnut;
    var draw = Chart.controllers.doughnut.prototype.draw;
    var customDepartureDoughnut = Chart.controllers.doughnut.extend({
        draw: function() {
            draw.apply(this, arguments);
            var ctx = this.chart.chart.ctx;
            var _fill = ctx.fill;
            var width = this.chart.width,
                height = this.chart.height;

            var fontSize = (height / 114).toFixed(2);
            this.chart.ctx.font = fontSize + "em Verdana";
            this.chart.ctx.textBaseline = "middle";

            var text = "27L",
                textX = Math.round((width - this.chart.ctx.measureText(text).width) / 2),
                textY = height / 2;

            this.chart.ctx.fillText(text, textX, textY);

            ctx.fill = function() {
                ctx.save();
                ctx.shadowColor = '#bbbbbb';
                ctx.shadowBlur = 30;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 12;
                _fill.apply(this, arguments)
                ctx.restore();
            }
        }
    });

    Chart.controllers.departureDoughnut = customDepartureDoughnut;
    var ctx = document.getElementById("departure-doughnut");
    var myDepartureDougnut = new Chart(ctx, {
        type: 'departureDoughnut',
        data: {
            labels: ["Departure"],
            datasets: [{
                label: "Favourite",
                backgroundColor: ["#FFF"],
                data: [100],
            }]
        },
        options: {
            events: [],
            responsive: true,
            title: {
                display: false
            },
            legend: {
                display: false
            },
            layout: {
                padding: {
                    left: 16,
                    right: 16,
                    top: 16,
                    bottom: 16
                }
            },
            cutoutPercentage: 92,
            animation:{
                animateScale : false,
                duration: 2500
            }
        }
    });


    //Total Earnings

    var ctx3 = document.getElementById("earning-chart").getContext("2d");

    // Chart Options
    var earningOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetStrokeWidth : 3,
        pointDotStrokeWidth : 4,
        tooltipFillColor: "rgba(0,0,0,0.8)",
        legend: {
            display: false,
            position: 'bottom',
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: false,
            }],
            yAxes: [{
                display: false,
                ticks: {
                    min: 0,
                    max: 70
                },
            }]
        },
        title: {
            display: false,
            fontColor: "#FFF",
            fullWidth: false,
            fontSize: 40,
            text: '82%'
        }
    };

    // Chart Data
    var earningData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            data: [28, 35, 36, 48, 46, 42, 60],
            backgroundColor: 'rgba(255,117,136,0.12)',
            borderColor: "#FF4961",
            borderWidth: 3,
            strokeColor : "#FF4961",
            capBezierPoints: true,
            pointColor : "#fff",
            pointBorderColor: "#FF4961",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 3,
            pointRadius: 5,
            pointHoverBackgroundColor: "#FFF",
            pointHoverBorderColor: "#FF4961",
            pointHoverRadius: 7,
        }]
    };

    var earningConfig = {
        type: 'line',

        // Chart Options
        options : earningOptions,

        // Chart Data
        data : earningData
    };

    // Create the chart
    var earningChart = new Chart(ctx3, earningConfig);



    // Vector Maps
    // -----------------------------------
    $('#world-map-markers').vectorMap({
        map: 'world_mill',
        backgroundColor: '#fff',
        zoomOnScroll: false,
        series: {
            regions: [{
                values: visitorData,
                scale: ['#ff7588', '#fddde1'],
                normalizeFunction: 'polynomial'
            }]
        },
        onRegionTipShow: function(e, el, code){
            el.html(el.html()+' (Visitor - '+visitorData[code]+')');
        }
    });


    //Sessions by Browser
    // -----------------------------------
    Morris.Donut({
        element: 'sessions-browser-donut-chart',
        data: [{
            label: "Chrome",
            value: 3500
        }, {
            label: "Firefox",
            value: 2500
        }, {
            label: "Safari",
            value: 2000
        }, {
            label: "Opera",
            value: 1000
        },{
            label: "Internet Explorer",
            value: 500
        } ],
        resize: true,
        colors: ['#40C7CA', '#FF7588', '#2DCEE3', '#FFA87D', '#16D39A']
    });
});
