<?php
$output = '' ;
if(isset($_POST['gstatus']))
{
    
    if($_POST['gstatus']=="other")
    {
        $output = '' ;
        $output .='<div class="form-group ">
            <label class="control-label col-md-2" for="gname">Name<span class="help-inline">*</span></label>
                <div class="controls col-md-4">
                   <input name="gname" type="text" id="gname" class="form-control form-control-inline col-md-4" >
                                
                </div>
                
        </div>
        <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="gnationality">Nationality</label>
            <div class="controls col-md-4">
               <input name="gnationality" type="text" id="gnationality" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            <label class="control-label col-md-2" for="gcitizen">Citizenship</label>
            <div class="controls col-md-4">
               <input name="gcitizen" type="text" id="gcitizen" class="form-control form-control-inline col-md-4"  >
                            
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="guastatus">Status<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="guastatus" id="gliving" checked>Living</label>
            <label class="radio-inline"><input type="radio" name="guastatus" id="gdecese">Decese</label>
                            
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="gage">Age</label>
        <div class="controls col-md-4">
               <input name="gage" type="text" id="gage" class="form-control form-control-inline col-md-4"  >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="goccupation">Occuputation</label>
        <div class="controls col-md-4">
               <input name="goccupation" type="text" id="goccupation" class="form-control form-control-inline col-md-4"  >
                            
            </div>  
            <label class="control-label col-md-2" for="gposition">Position</label>
        <div class="controls col-md-4">
               <input name="gposition" type="text" id="gposition" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
    </div>
    <br><br>
    <div class="form-check">
        <label class="control-label col-md-2" for="gaddress">Guardian address</label>
        <div class="controls col-md-4">
               <input name="gaddress" type="checkbox" id="gaddress" class="form-check-input form-control-inline col-md-4"  >
               <label class="form-check-label" for="gaddress">Same as applicant address</label>           
        </div>  
    </div>
    <br><br>
    <div class="form-group">
        <label class="control-label col-md-2" for="gstreet">Street</label>
        <div class="controls col-md-4">
               <input name="gstreet" type="text" id="gstreet" class="form-control form-control-inline col-md-4"  >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="gtownship">Township</label>
        <div class="controls col-md-4">
               <input name="gtownship" type="text" id="gtownship" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
            <label class="control-label col-md-2" for="gcity">City<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="gcity" type="text" id="gcity" class="form-control form-control-inline col-md-4"  >
                            
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="gzipcode">Zip Code</label>
            <div class="controls col-md-4">
               <input name="gzipcode" type="text" id="gzipcode" class="form-control form-control-inline col-md-4"  >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="gtelephone">Telephone</label>
        <div class="controls col-md-4">
               <input name="gtelephone" type="text" id="gtelephone" class="form-control form-control-inline col-md-4"  >
                            
            </div> 
            <label class="control-label col-md-2" for="gmobile">Mobile<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="gmobile" type="text" id="gmobile" class="form-control form-control-inline col-md-4"  >
                            
        </div>  
    </div>';
    echo $output;
    }

    else{
        echo $output;
    }
    
    
  
}




?>