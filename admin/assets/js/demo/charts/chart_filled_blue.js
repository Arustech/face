"use strict";
$(document).ready(function() {


    var d = new Date();
    var max_year = d.getFullYear();
    var min_year = d.getFullYear() - 1;
    var graph_res;
    


   

var post_graph_data =
            [   [min_year,11],
                [min_year,12],
                [max_year,1],
                [max_year,2],
                [max_year,3],
                [max_year,4],
                [max_year,5],
                [max_year,6],
                [max_year,7],
                [max_year,8],
                [max_year,9],
                [max_year,10],
            ];
            
       $.ajax({
        type: 'POST',
        url: 'a_ajax.php',
        cache: false,
        async: false,
        data: {mod:'graph_data', gdata:post_graph_data},
        success: function(data){
            
            graph_res   = $.parseJSON(data);
        },
        
        error: function(httpRequest, textStatus, errorThrown) {
            console.log("status=" + textStatus + ",error=" + errorThrown);
        }
    });     

   var b = ""; 
   if(graph_res!="")
   {
      
    
 var b =
            [
                
                [(new Date(max_year, 1, 31)).getTime(), graph_res[3]],
                [(new Date(max_year, 2, 31)).getTime(), graph_res[4]],
                [(new Date(max_year, 3, 31)).getTime(), graph_res[5]],
                [(new Date(max_year, 4, 31)).getTime(), graph_res[6]],
                [(new Date(max_year, 5, 31)).getTime(), graph_res[7]],
                [(new Date(max_year, 6, 31)).getTime(), graph_res[8]],
                [(new Date(max_year, 7, 31)).getTime(), graph_res[9]],
                [(new Date(max_year, 8, 31)).getTime(), graph_res[10]],
                [(new Date(max_year, 9, 31)).getTime(), graph_res[11]],
                [(new Date(max_year, 10, 31)).getTime(), graph_res[12]],
                [(new Date(max_year, 11, 31)).getTime(), graph_res[1]],
                [(new Date(max_year, 12, 28)).getTime(), graph_res[2]],
            ];


   }
    var a = [
        {
            label: "Total Users",
            data: b,
            color: App.getLayoutColorCode("blue")}
    ];
    $.plot(
            "#chart_filled_blue",
            a,
            $.extend(
                    true,
                    {},
                    Plugins.getFlotDefaults(),
                    {
                        xaxis: {
                            min: (new Date(min_year, 11, 31)).getTime(),
                            max: (new Date(max_year, 11, 2)).getTime(),
                            mode: "time",
                            tickSize: [1, "month"],
                            monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                            tickLength: 0},
                        series: {lines: {fill: true, lineWidth: 1.5},
                            points: {show: true, radius: 2.5, lineWidth: 1.1},
                            grow: {active: true, growings: [{stepMode: "maximum"}]}},
                        grid: {hoverable: true, clickable: true}, tooltip: true,
                        tooltipOpts: {content: "%s: %y"}}))
});