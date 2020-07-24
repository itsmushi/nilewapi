


    

<div class="row mr-2 ml-1">
  <div class="col-3 <?php 
    if( isset($admin_name) ){
      echo "d-none";
    }
  ?> ">

    <ul class="nav nav-tabs flex-column nav-pills" id="myTab" role="tablist">



    <?php
        $qr="SELECT * FROM `cafes`;";
        
        $result=mysqli_query($conn, $qr);
        
        confirm_query($result);
       $count=1;
        while( $row=mysqli_fetch_assoc($result) ) {

            
            ?>
            <li class="nav-item" role="presentation">
              <a class="nav-link <?php 
                if($count==1){
                  //echo "active"; //to make the current bar active
                  $count++;
                } ?>
                "   href="index.php?cafe=<?php echo urlencode($row["cafe_name"]);  ?>" role="tab" >
                <?php echo  $row["cafe_name"]   ?>
              </a>
            </li>

            <?php
        }
    ?>
    </ul>
  </div>

  
  <div class="col-9">
    <div class="tab-content">
          
          <?php
            if(isset($cafe_name)){
                    $qr="SELECT * FROM `menu` WHERE cafe_name='$cafe_name';";
                    $result=mysqli_query($conn, $qr);
                    confirm_query($result);
                   
                    ?>

                <?php
                if( mysqli_num_rows($result)<1 ){
                    echo "<h5 class=\"display-6 bg-info p-4\"> There is no food at this place for now please choose another place </h5>";
                }
                  else{
                    //there is menu at available at that cafe so do below...
                    if(isset($edit_page)){ //add a form class from bootstrap so as to edit the menu data
                      echo "<form class=\"form-inline\" method=\"post\" action=\"edit_menu.php\">";
                    }
                    ?>
                    <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Food</th>
                  <th scope="col">Price</th>
                  <?php
                  if(isset($edit_page)){   ?>
                    
                    <th scope="col">Available</th>
                    <?php
                  } ?>
                
                </tr>
              </thead>
              <tbody>
                  <?php 
                  
                $count=1;
                $nm=1;
                $arr=[];
                  while( $row=mysqli_fetch_assoc($result) ) {
                    if( $row["visible"]!=1 && !(isset($edit_page)) )  //this is if the food is not available
                      continue; 
                    ?>
                    <tr>
                      <th scope="row"><?php echo $count; ?></th>
                      <td><?php echo $row["food"];  ?></td>
                      <td>
                        <?php
                        if(isset($edit_page)){
                          //code for form to edit price
                          ?>
                          
                            <input type="number" name="<?php echo $nm;  ?>" value="<?php echo $row["price"]; ?>" class="form-control mb-2 mr-sm-2">
                          
                          <?php $nm++;
                            //array to track the id of the updated items
                            array_push($arr,$row["id"]);
                            
                        }
                        else{
                          echo $row["price"];
                        }
                         ?>
                      </td>
                      
                      <?php //add a column to show availability if it on edit page
                       if(isset($edit_page)){  ?>
                        <td>
                          <div class="input-group">
                            <input type="checkbox" name="<?php echo $nm; ?>" <?php
                                $nm++;
                             if($row["visible"]){
                              echo "value=\"checked\"";
                              echo " checked";
                             }

                                  ?>>
                          </div>
                        </td>
                    
                      <?php
                      } ?>
                      
                    </tr>

                  <?php
                  $count++;
                } //end of loop for the table?>

              </tbody>
            </table>

            

                    <?php
                    
                   }
            }
          
                 
                 //end of if  just a user selected a place.
            else{
              //user didnt choose a place to see menu yet
              echo "<h5 class=\"display-6 bg-info p-4\"> Choose a place to see the menu. </h5>";
            }
          
          ?>
        
      </div>
  </div>
</div>
