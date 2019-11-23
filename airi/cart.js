        function add2Cart(keyitem,qty) {
          console.log(keyitem);
          $.ajax({
                    method: "GET",
                    url: 'add2cart.php',
                    data: {'cus_id':cus_id,'useridprofilefield':useridprofilefield,'prd_id':keyitem,'quatity':qty},
                    success: function(data){
                        console.log(data);
                        console.log('add 2 Cart Success!');
                        location.reload();
                    },
                    error: function(data){
                        console.log('add 2 Cart Failed!');
                    }
          });
        }
        function del2Cart(keyitem) {
          console.log(keyitem);
          //console.log($("#quatity"+key).val());
            $.ajax({
                      method: "GET",
                      url: 'add2cart.php',
                      data: {'cus_id':cus_id,'useridprofilefield':useridprofilefield,'prd_id':keyitem,'quatity':1,'del':1},
                      success: function(data){
                          console.log(data);
                          console.log('del 2 Cart Success!');
                          location.reload();
                      },
                      error: function(data){
                          console.log('del 2 Cart Failed!');
                      }
            });
        }   
        function currencyFormat(num) {
          return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        function del(keyitem) {
          console.log(keyitem);
          $.ajax({
                    method: "GET",
                    url: 'delitem.php',
                    data: {'prd_id':keyitem},
                    success: function(data){
                        console.log(data);
                        console.log('Deleted!');
                        location.reload();
                    },
                    error: function(data){
                        console.log('Delete item Failed!');
                    }
          });
        }    