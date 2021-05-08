// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  // -------------------------OUR--------------------------
  $('#dataTablexel').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, 100, 200, -1 ],
            [ '10 student', '25 student', '50 student', '100 student', '200 student', 'Hammasi' ]
        ],
        "columnDefs": [
            {
                "targets": [ 8,9 ],
                "visible": false,
                "searchable": false
            },
        ],
        buttons: [
 			{
                extend: 'excel',
                exportOptions: {
                    columns: [':visible',8,9]
                }
            },
              'pageLength'
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                pageTotal
            );
        }
    });
  	// -------------------------OUR--------------------------
 $('#dataTablexel2').DataTable( {
        dom: 'Bfrtip',
        "columnDefs": [
            {
                "targets": 0,
                "visible": false,
                "searchable": false
            },
        ],
        buttons: [
 			{
                extend: 'excel',
                exportOptions: {
                    columns: [0,1,2,3,4,5,7]
                }
            }
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 4 , {'search': 'applied'})
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                total
            );
        }
    });
});
