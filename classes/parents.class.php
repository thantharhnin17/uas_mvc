<?php
  class Parents extends Db {
    
    protected function getApplicantid($email,$mobile,$facebook){
      $sql = "SELECT applicant.* FROM applicant
      INNER JOIN address ON applicant.addressid=address.id 
      WHERE address.email=? AND address.mobile=? AND address.facebook=?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$email,$mobile,$facebook]);

      $results = $stmt->fetchAll();
      return $results;
  }

  protected function getParentAddressid($mobile){
      $sql = "SELECT * FROM address WHERE mobile=?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$mobile]);

      $results = $stmt->fetchAll();
      return $results;
  }

  protected function setParent($applicant_id,$name,$nationality,$citizenship,$status,$age,$occupation,$position,$addressid,$parent_status,$guardian_status) {
    $pdo=$this->connect();
    $sql = "INSERT INTO parent(applicant_id,name,nationality,citizenship,status,age,occupation,position,addressid,parent_status,guardian_status) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    //$stmt->bind_param("sss", $applicant_id,$name,$nationality,$citizenship,$status,$age,$occupation,$position,$addressid,$parent_status,$guardian_status); 
    $stmt->execute([$applicant_id,$name,$nationality,$citizenship,$status,$age,$occupation,$position,$addressid,$parent_status,$guardian_status]);
  }

  }
?>