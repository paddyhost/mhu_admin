/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
        var general_chart = c3.generate({
            bindto: '#general_chart',
            data: {
                url: '/admin/ajax_getTotalpatientCount/'+phase,
                type: 'bar',
                mimeType: 'json'
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [''],
                    label: 'Patient Categories'
                },
                y: {
                    label: 'Target Population Count'
                }
            },
            bar: {
                width: 50
            }
        });

        var general_chart2 = c3.generate({
            bindto: '#general_chart2',
      
            data: {
                columns: [
                    ['data1', 30],
                    ['data2', 130],
                    ['data3', 80],
                    ['data4', 20]
                ],
                type: 'bar',
                names: {
                    data1: 'Child Under 19',
                    data2: 'Lactating Women',
                    data3: 'Pregnant Women',
                    data4: 'Senior citizen above 60'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [''],
                    label: 'Patient Categories'
                },
                y: {
                    label: 'Target Population Count'
                }
            },
            bar: {
                width: 50
            }
        });
})

