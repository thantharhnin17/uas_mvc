<?php
  class ParentsView extends Parents {
    
    public function showApplicantid($email,$mobile,$facebook){
      $results = $this->getApplicantid($email,$mobile,$facebook);
      
      return $results[0]['id'];
  }

  public function showParentAddressid($mobile){
      $results = $this->getParentAddressid($mobile);
      
      return $results[0]['id'];
  }
  
  }
?>