<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

            body{
                background-color:#f5f5f5;
            }

            form{
                margin: 50px auto;
            }

            .form-row{
                margin-top: 10px;
            }

            fieldset 
            {
                border: 1px solid #ddd !important;
                margin: 0;
                xmin-width: 0;
                padding: 30px;       
                position: relative;
                border-radius:4px;
                background-color:#fff;
                padding-left:10px!important;
            }	

            legend
            {
                font-size:14px;
                font-weight:bold;
                margin-bottom: 0px; 
                width: 35%; 
                border: 1px solid #ddd;
                border-radius: 4px; 
                padding: 5px 5px 5px 10px; 
                background-color: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-md-8">
                    <form action="/car_simulation/racing_simulation.php" method="post" enctype="" name = "myForm" onsubmit = "return(validate());">
                        <fieldset>
                            <legend>Configure Cars</legend>
                            <div id="dynamic_field">
                                <div class="form-row" >
                                    <div class="col">
                                        <input type="text" class="form-control" id='car_name' name="car_name[]" placeholder="Car Name">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id='top_speed' name="top_speed[]" placeholder="Top Speed">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id='acceleration' name="acceleration[]" placeholder="Acceleration">
                                    </div>

                                    <div class="col">
                                        <button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div><h6> Race track in meter </h6></div>
                            <div class="form-row" id="target"><br>
                                <div class="col">
                                    <input type="text" class="form-control col-md-6" id='target_distance' name="target_distance[]" placeholder="Target Distance">
                               </div>
                               <div class="col">
                                    <button type="button" name="add2" id="add2" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                </div>
                  
                            </div>
                            <div class="form-row"><br>
                                <div class="col">
                                    <button type="submit" id='submit' name="submit" class="btn btn-primary " value="Save">Calculate Speed</button>
                                </div>
                            </div>
                            <br>
                            </form>
                        </fieldset>
                </div>
                <div class="col"></div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
        <script>
            function validate() {
      
                if( document.myForm.car_name.value == "" ) {
                    alert( "Please enter car name!" );
                    document.myForm.car_name.focus() ;
                    return false;
                }
                
                let car_name = document.getElementById("car_name").value;
                
                if (typeof car_name != 'string') {
                    alert('Variable is a string');
                    return false;
                }
                if( document.myForm.top_speed.value == "" ) {
                    alert( "Please enter top speed!" );
                    document.myForm.top_speed.focus() ;
                    return false;
                }
                
                let top_speed = document.getElementById("top_speed").value;
                if (isNaN(top_speed)) {
                    alert("Enter a numeric value top speed!")
                    return false;
                }
  
                if( document.myForm.acceleration.value == "" ) {
                    alert( "Please enter acceleration!" );
                    document.myForm.acceleration.focus() ;
                    return false;
                }
                let acceleration = document.getElementById("acceleration").value;

                if (isNaN(acceleration)) {
                    alert("Enter a numeric value in acceleration!")
                    return false;
                }
                if( document.myForm.target_distance.value == "" ) {
                    alert( "Please enter target distance!" );
                    document.myForm.target_distance.focus() ;
                    return false;
                }
                let target_distance = document.getElementById("top_speed").value;
                if (isNaN(target_distance)) {
                    alert("Enter a numeric value in target distance!")
                    return false;
                }
            
            return( true );
            }
            $(document).ready(function () {
                var i = 1;
                $('#add').click(function () {
                    i++;
                    $('#dynamic_field').append('<div class="form-row" id="row' + i + '"> <div class="col"><input type="text" class="form-control" name="car_name[]"> </div> <div class="col"> <input type="text" class="form-control" name="top_speed[]"> </div> <div class="col"> <input type="text" class="form-control" name="acceleration[]"> </div> <div class="col"> <td><button type="button" name="add" class="btn btn-danger btn_remove" id="' + i + '"><i class="fa fa fa-trash"></i></button></td> </div> </div>');
                });
                $(document).on('click', '.btn_remove', function () {
                    var button_id = $(this).attr("id");

                    $('#row' + button_id + '').remove();
                });



                $('#add2').click(function () {
                    i++;
                    $('#target').append('<div class="form-row"  id="row2' + i + '"> <div class="col"> <input type="text" class="form-control" name="target_distance[]"> </div> <div class="col"> <button type="button" name="remove+target" class="btn btn-danger btn_remove2" id="' + i + '"><i class="fa fa fa-trash"></i></button></td> </div> </div>');
                });
                $(document).on('click', '.btn_remove2', function () {
                    var button_id = $(this).attr("id");

                    $('#row2' + button_id + '').remove();
                });



            });
        </script>

    </body>
</html>