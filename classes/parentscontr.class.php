<?php
  class ParentsContr extends Parents {
    public function createParent($applicant_id,$name,$nationality,$citizenship,$status,$age,$occupation,$position,$addressid,$parent_status,$guardian_status) {
      $this->setParent($applicant_id,$name,$nationality,$citizenship,$status,$age,$occupation,$position,$addressid,$parent_status,$guardian_status);
      echo "Records Saved ";
    }
  }
