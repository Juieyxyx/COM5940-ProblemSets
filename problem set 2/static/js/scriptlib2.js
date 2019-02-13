$(document).ready(function(){
  $("button#roll_up").click(function() {
       var table1_items = [];
       var i = 0;
       var airtable_read_endpoint = "https://api.airtable.com/v0/apphfQW4UvVKdyRon/%E8%B1%86%E7%93%A3%E5%B0%8F%E7%BB%84%E7%B2%BE%E9%80%89%E5%B8%96%E5%AD%90?api_key=keyIvnCG4lnYkaCAs&sortField=_createdTime&sortDirection=desc";
       var table1_dataSet = [];
       $.getJSON(airtable_read_endpoint, function(result) {
              $.each(result.records, function(key,value) {
                  table1_items = [];
                      table1_items.push(value.fields.Number);
                      table1_items.push(value.fields.Group);
                      table1_items.push(value.fields.Title);
                      table1_items.push(value.fields.Content);
                      table1_items.push(value.fields.URL);
                      table1_dataSet.push(table1_items);
                      console.log(table1_items);
               }); // end .each
               console.log(table1_dataSet);

            $('#table1').DataTable( {
                data: table1_dataSet,
                retrieve: true,
                columns: [
                    { title: "Number",
                      defaultContent:""},
                    { title: "Group",
                        defaultContent:"" },
                    { title: "Title",
                      defaultContent:"" },
                    { title: "Content",
                      defaultContent:""},
                    { title: "URL",
                        defaultContent:""},
                ]
            } );
       }); // end .getJSON
}); // end button



}); // document ready
