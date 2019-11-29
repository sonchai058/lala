        function iso_code_change(iso_code_val,data_select) {
          $.ajax({
                    method: "GET",
                    url: 'getdata.php',
                    data: {'iso_code':iso_code_val,'type':'Province'},
                    success: function(data){
                        console.log(data);
                        $("#addr_prov").html("<option value=''>เลือกจังหวัด</option>");
                        $.each(data.data,function(key,data1){
                            var chk = '';
                            if(data_select==data1.area_code) {
                                chk = "selected";
                            }
                            $("#addr_prov").html($("#addr_prov").html()+"<option "+chk+" value='"+data1.area_code+"'>"+data1.area_name+"</option>"); 
                        });
                        $("#addr_city").html("<option value=''>เลือกอำเภอ</option>");
                        $("#addr_suburb").html("<option value=''>เลือกตำบล</option>");
                        $("#addr_zipcode").val("");
                        $("#iso_code").val(iso_code_val);
                    },
                    error: function(data){
                        console.log('get province Failed!');
                    }
          });
        }
        $("input[name='iso_code']").change(function(){
            iso_code_change($(this).val(),'');
        });

        function addr_prov_change(addr_prov_val,data_select){
          $.ajax({
                    method: "GET",
                    url: 'getdata.php',
                    data: {'iso_code':$("input[name='iso_code']").val(),'type':'City','Province':addr_prov_val},
                    success: function(data){
                        console.log(data);
                        $("#addr_city").html("<option value=''>เลือกอำเภอ</option>");
                        $.each(data.data,function(key,data1){
                            var chk = '';
                            if(data_select==data1.area_code) {
                                chk = "selected";
                            }
                            $("#addr_city").html($("#addr_city").html()+"<option "+chk+" value='"+data1.area_code+"'>"+data1.area_name+"</option>"); 
                        });
                        $("#addr_suburb").html("<option value=''>เลือกตำบล</option>");
                        $("#addr_zipcode").val("");
                    },
                    error: function(data){
                        console.log('get city Failed!');
                    }
          }); 
        }
        $("#addr_prov").change(function(){
            addr_prov_change($("#addr_prov").val(),'');
        });

        function addr_city_change(addr_city_val,data_select) {
          $.ajax({
                    method: "GET",
                    url: 'getdata.php',
                    data: {'iso_code':$("input[name='iso_code']").val(),'type':'Suburb','City':addr_city_val},
                    success: function(data){
                        console.log(data);
                        $("#addr_suburb").html("<option value=''>เลือกตำบล</option>");
                        
                        $.each(data.data,function(key,data1){
                            var chk = '';
                            if(data_select==data1.area_code) {
                                chk = "selected";
                            }
                            $("#addr_suburb").html($("#addr_suburb").html()+"<option "+chk+" data-zipcode='"+data1.area_zipcode+"' value='"+data1.area_code+"'>"+data1.area_name+"</option>"); 
                        });
                        $("#addr_zipcode").val("");
                    },
                    error: function(data){
                        console.log('get suburb Failed!');
                    }
          });
        }
        $("#addr_city").change(function(){
            addr_city_change($("#addr_city").val(),'');
        });

        function addr_suburb_change() {
            $("#addr_zipcode").val($("#addr_suburb option:selected").data("zipcode"));
        }
        $("#addr_suburb").change(function(){
            //console.log($(this).html());
            addr_suburb_change();
        });

        $("#bt_submit").click(function(){

            $("input[name='useridprofilefield']").val(useridprofilefield);
            console.log($("#profile").serialize());

           if($("input[name='useridprofilefield']").val()=='') {
            alert("เชื่อมโยงกับไลน์ล้มเหลว!");
           }else if($("#cus_fname").val()==''){
            alert("กรุณากรอกชื่อ!");
            $("#cus_fname").focus();
           }else if($("#mobile_no").val()==''){
            alert("กรุณาเบอร์ติดต่อ!");
            $("#mobile_no").focus();
           }else if($("#addr_prov").val()==''){
            alert("กรุณาเลือกจังหวัด!");
            $("#addr_prov").focus();
           }else if($("#addr_city").val()==''){
            alert("กรุณาเลือกอำเภอ!");
            $("#addr_city").focus();
           }else if($("#addr_suburb").val()==''){
            alert("กรุณาเลือกตำบล!");
            $("#addr_suburb").focus();
           }else if($("#addr_zipcode").val()==''){
            alert("กรุณากรอกรหัสไปรษณีย์!");
            $("#addr_zipcode").focus();
           }else {
              $("#load").html("กำลังบันทึกข้อมูล...");
              $("#bt_submit").attr('disabled',true);
              $.ajax({
                method: "POST",
                url: 'savemyacc.php',
                data: $("#profile").serialize(),
                success: function(data){
                    console.log(data);
                    if(data.staus=='ok') {
                        alert("บันทึกข้อมูลสำเร็จ...");
                        $("#load").html("บันทึกข้อมูลสำเร็จ...");
                        if(url_back!='') {
                            window.location.replace(url_back);
                        }
                    }else {
                        alert("บันทึกข้อมูลล้มเหลว...");
                        $("#load").html("บันทึกข้อมูลล้มเหลว...");
                    }
                    $("#bt_submit").attr('disabled',false);      
                },
                error: function(data){
                    console.log('บันทึกข้อมูลล้มเหลว!');
                    $("#bt_submit").attr('disabled',false);
                }
              });
           } 
           
          /*

          */
        });

       $("#bt_search_mobile").click(function(){
            $(this).attr('disabled',true);
           $("#bt_search_mobile").attr('disabled',true);
           if($("#mobile_no").val()==''){
            alert("กรุณากรอกเบอร์ติดต่อ!");
            $("#mobile_no").focus();
            $(this).attr('disabled',false);
           }else {
            getInfo('mobile_no');
            $(this).attr('disabled',false);
           }
           $("#bt_search_mobile").attr('disabled',false);
        });
        function getInfo(type) {
            $("#bt_submit").attr('disabled',true); 
              $.ajax({
                method: "GET",
                url: 'getAccount.php',
                data: {'type':type,'mobile_no':$("#mobile_no").val(),'useridprofilefield':useridprofilefield},
                success: function(data){
                    console.log(data);
                    if(data.staus=='ok') {
                        if(type=='mobile_no'){alert("พบข้อมูลสมาชิก...");$("#bt_search_mobile").hide();}
                        $("#cus_fname").val(data.data.cus_fname);
                        $("#cus_lname").val(data.data.cus_lname);
                        $("#mobile_no").val(data.data.mobile_no);
                        $("#email_addr").val(data.data.email_addr);
                        
                        cus_id = data.data.cus_id;
                        if(url_back=='my-account_histro.php') {
                            window.reload();
                        }

                        //$("#iso_code").val(data.data.iso_code);
                        iso_code_change(data.data.iso_code,data.data.addr_prov);

                        $("#addr_line1").html(data.data.addr_line1);

                        if(useridprofilefield==null || useridprofilefield=='') {
                            $("input[name='useridprofilefield']").val(data.data.line_id);
                            useridprofilefield=data.data.line_id;
                        }

                        //$("#addr_prov").val(data.data.addr_prov);
                        setTimeout(function(){addr_prov_change(data.data.addr_prov,data.data.addr_city)},500);

                        //$("#addr_city").val(data.data.addr_city);
                        setTimeout(function(){addr_city_change(data.data.addr_city,data.data.addr_suburb);},1000);

                        //$("#addr_suburb").val(data.data.addr_suburb);
                        //alert(data.data.addr_suburb);
                        //alert($("#addr_zipcode").val()+"::"+data.data.addr_zipcode);
                        setTimeout(function(){$("#addr_zipcode").val(data.data.addr_zipcode);},2700);
                        addr_suburb_change(data.data.addr_suburb);
                        //alert(data.data.addr_zipcode);

                        if(type=='line_id' && data.alert==1) {
                            setMsg("สวัสดีค่ะ วันนี้ท่านได้เชื่อมต่อกับระบบ Lalabeauty Shop เรียบร้อยแล้ว!");
                        }
                        
                    }else {
                        if(type=='mobile_no') {
                            alert("ไม่พบสมาชิกข้อมูล...");
                        }else {
                            $("#load").html("เชื่อมโยงกับ Line สำเร็จ...");
                            $("#load").hide();
                        }
                    }
                    $("#bt_submit").attr('disabled',false);      
                },
                error: function(data){
                    console.log('การดึงข้อมูลล้มเหลว!');
                    $("#bt_submit").attr('disabled',false);  
                }
              });
        }