function fill(Value) {
 
   //Assigning value to "valor" div in "valor.php" file.
 
   $('#valor').val(Value);
 
   //Hiding "display" div in "valor.php" file.
 
   $('#display').hide();
 
}
 
$(document).ready(function() {
   //On pressing a key on "valor box" in "valor.php" file. This function will be called.
   $("#valor").keyup(function() {
       //Assigning valor box value to javascript variable named as "name".
       var name = $('#valor').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "valor.php" file.
           //$("#display").html("");
          $.ajax({
                type: "get",
                url: "buscar",
                data: {
                    'valor': name
                },
                dataType: 'html',
              cache: false,
              beforeSend: function(html) 
              {
                //document.getElementById("display").innerHTML = ''; 
                //$("#flash").show();
                //$("#valor").show();
                  //  $(".valor").html(name);
                //$("#flash").html('Loading Results');
                },
                success: function(html)
                {
                    //$("#display").show();
                    //$("#display").append(html);
                    $("#display").html(html);
                    //$("#flash").hide();
                }
            });
       }else {
          $.ajax({
                type: "get",
                url: "buscar",
                data: {
                    'valor': name
                },
                dataType: 'html',
              cache: false,
              beforeSend: function(html) 
              {
                //document.getElementById("display").innerHTML = ''; 
                //$("#flash").show();
                //$("#valor").show();
                  //  $(".valor").html(name);
                //$("#flash").html('Loading Results');
                },
                success: function(html)
                {
                    //$("#display").show();
                    //$("#display").append(html);
                    $("#display").html(html);
                    //$("#flash").hide();
                }
            });
 
       }
 
   });
 
});