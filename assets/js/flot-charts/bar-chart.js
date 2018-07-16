$(document).ready(function () {

    /* Make some random data for Flot Line Chart*/


    $.ajax({
        url: "ajax_getDashBoardData",
        dataType: 'json',
        success: function (result) {
            //PW:pregnent women, LW:lactating women, C:child under 5yrs, S:senior citizen above 60yr

            $("#PW").html(result.PW);
            $("#LW").html(result.LW);
            $("#C").html(result.C);
            $("#S").html();
            
                
            

var barData = new Array();
   var barPW = result.barPW;
   var barLW = result.baLW;
   var barS = result.barS;
   var barC = result.barC;
   
   if(barC.length>0){
    barData.push({
        data: barC,
        label: 'Child Under 19 Years',
        bars: {
            show: true,
            barWidth: 0.08,
            order: 1,
            lineWidth: 0,
            fillColor: '#8BC34A'
        }
    });
    }
    if(barLW.length>0){
    barData.push({
        data: barLW,
        label: 'Lactating Women',
        bars: {
            show: true,
            barWidth: 0.08,
            order: 2,
            lineWidth: 0,
            fillColor: '#00BCD4'
        }
    });
    }
    if(barPW.length>0){
    barData.push({
        data: barPW,
        label: 'Pregnant Women',
        bars: {
            show: true,
            barWidth: 0.08,
            order: 3,
            lineWidth: 0,
            fillColor: '#FF9800'
        }
    });
    }
    if(barS.length>0){
      barData.push({
        data: barS,
        label: 'Senior citizen above 60 years',
        bars: {
            show: true,
            barWidth: 0.08,
            order: 3,
            lineWidth: 0,
            fillColor: '#FF9800'
        }
    });
    }
    
    var ticks = [
        [0, "jan"], [1, "Feb"], [2, "March"], [3, "April"], [4, "May"], [5, "June"], [1, "Jul"], [2, "Aug"], [3, "Sep"], [1, "Feb"], [2, "March"], [3, "April"], [4, "May"], [5, "June"], [1, "Feb"], [2, "March"], [3, "April"], [4, "May"], [5, "June"], [1, "Feb"], [2, "March"], [3, "April"], [4, "May"], [5, "June"], [6, "JUl"], [7, "Aug"], [8, "Sep"], [9, "Oct"], [10, "Nov"], [10, "Dec"]
    ];


    /* Let's create the chart */
    if ($('#bar-chart')[0]) {
        $.plot($("#bar-chart"), barData, {
            grid: {
                borderWidth: 1,
                borderColor: '#eee',
                show: true,
                hoverable: true,
                clickable: true
            },

            yaxis: {
                tickColor: '#eee',
                tickDecimals: 0,
                font: {
                    lineHeight: 13,
                    style: "normal",
                    color: "#9f9f9f",
                },
                shadowSize: 0
            },

            xaxis: {
                tickColor: '#fff',
                tickDecimals: 0,
                font: {
                    lineHeight: 13,
                    style: "normal",
                    color: "#9f9f9f"
                },
                shadowSize: 0,
                ticks: ticks,
            },

            legend: {
                container: '.flc-bar',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0
            }
        });
    }

    /* Tooltips for Flot Charts */

    if ($(".flot-chart")[0]) {
        $(".flot-chart").bind("plothover", function (event, pos, item) {
            if (item) {
                var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                $(".flot-tooltip").html(item.series.label + " of " + x + " = " + y).css({top: item.pageY + 5, left: item.pageX + 5}).show();
            } else {
                $(".flot-tooltip").hide();
            }
        });

        $("<div class='flot-tooltip' class='chart-tooltip'></div>").appendTo("body");
    }

        }});


 
    /* Create an Array push the data + Draw the bars*/

    
});


 