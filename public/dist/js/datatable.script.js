(function ($) {
    "use strict";
var editor;
 $('#example').DataTable({
    dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
     columnDefs: [
         {
             "orderSequence": ["desc", "asc"],
             type: 'numeric-comma', targets: 0
         }
     ],

 });
  $('#datatable').DataTable({
      iDisplayLength : 10,

      language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
      },
      columnDefs: [
          {
              "orderSequence": ["desc", "asc"],
              type: 'numeric-comma', targets: [0,1,2,3]
          }
      ]
 });
  $('#datatable2').DataTable({
      iDisplayLength : 10,

      language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
      },
      columnDefs: [
          {
              "orderSequence": ["desc", "asc"],
              type: 'numeric-comma', targets: [0,1]
          }
      ]
 });
  $('.datatable10').DataTable({
      iDisplayLength : 10,

      language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
      },
      columnDefs: [
          {
              "orderSequence": ["desc", "asc"],
              type: 'numeric-comma', targets: [0,1,2,3,4,5,6,7,8,9]
          }
      ]
 });
  $('#datatable_new10').DataTable({
      iDisplayLength : 10,

      language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
      },
      columnDefs: [
          {
              "orderSequence": ["desc", "asc"],
              type: 'numeric-comma', targets: [0,1,2,3,4,5,6,7,8,9]
          }
      ]
 });



})(jQuery);
