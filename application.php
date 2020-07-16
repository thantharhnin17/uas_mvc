<?php
    include 'includes/class-autoload.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<title> University Admission Systm</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="d-flex flex-column">

<?php
    
    include 'header.php';
    
    // include 'insertparent.php';
   
    ?>
    <?php
include 'insertaddress.php';
include 'insertapplicant.php';

//father insert
    if($fstatus=="fliving"){
        $parentsObj = new ParentsView();
        $aid = $parentsObj->showApplicantid($email,$mobile,$facebook);

        $parentsObj2 = new ParentsView();
        $paid = $parentsObj2->showParentAddressid($fmobile);

        $parentsObj3 = new ParentsContr();
        $parentsObj3->createParent($aid,$fname,$fnationality,$fcitizen,$fstatus,$fage,$foccupation,$fposition,$paid,'father',$gstatus);
    }else{
        $parentsObj = new ParentsView();
        $aid = $parentsObj->showApplicantid($email,$mobile,$facebook);

        // $parentsObj2 = new ParentsView();
        // $paid=$parentsObj2->showParentAddressid("");

        $parentsObj3 = new ParentsContr();
        $parentsObj3->createParent($aid,$fname,$fnationality,$fcitizen,$fstatus,'','','',null,'father',$gstatus);
    }

//mother insert
    if($mstatus=="mliving"){
        $parentsObj = new ParentsView();
        $aid = $parentsObj->showApplicantid($email,$mobile,$facebook);

        $parentsObj2 = new ParentsView();
        $paid = $parentsObj2->showParentAddressid($mmobile);

        $parentsObj3 = new ParentsContr();
        $parentsObj3->createParent($aid,$mname,$mnationality,$mcitizen,$mstatus,$mage,$moccupation,$mposition,$paid,'mother',$gstatus);
    }else{
        $parentsObj = new ParentsView();
        $aid = $parentsObj->showApplicantid($email,$mobile,$facebook);

        // $parentsObj2 = new ParentsView();
        // $paid=$parentsObj2->showParentAddressid("");

        $parentsObj3 = new ParentsContr();
        $parentsObj3->createParent($aid,$mname,$mnationality,$mcitizen,$mstatus,'','','',null,'mother',$gstatus);
    }

//other insert    
    if(isset($_POST['gstatus']))
	    {
    
        if($_POST['gstatus']=="other")
        {

        if($guastatus=="gliving"){
            $parentsObj = new ParentsView();
            $aid = $parentsObj->showApplicantid($email,$mobile,$facebook);
    
            $parentsObj2 = new ParentsView();
            $paid = $parentsObj2->showParentAddressid($gmobile);
    
            $parentsObj3 = new ParentsContr();
            $parentsObj3->createParent($aid,$gname,$gnationality,$gcitizen,$guastatus,$gage,$goccupation,$gposition,$paid,'other guardian',$gstatus);
        }else{
            $parentsObj = new ParentsView();
            $aid = $parentsObj->showApplicantid($email,$mobile,$facebook);
    
            // $parentsObj2 = new ParentsView();
            // $paid=$parentsObj2->showParentAddressid("");
    
            $parentsObj3 = new ParentsContr();
            $parentsObj3->createParent($aid,$gname,$gnationality,$gcitizen,$guastatus,'','','',null,'other guardian',$gstatus);

        }
    }
    }
    
?>

<?php
$valid=true;

// to validate inputs
if(!empty($_POST))
{
    if(isset($_POST['title'])){
    $title=$_POST['title'];
    
    if(empty($title))
    {
        $titleError='Please choose title';
        $valid=false;
    }
    }

    if(isset($_POST['eng_name'])){
    $eng_name=$_POST['eng_name'];
    
    if(empty($eng_name))
    {
        $eng_name_error='Please fill name (Eng)';
        $valid=false;
    }
    }

    if(isset($_POST['gender'])){
    $gender=$_POST['gender'];
    if(empty($gender))
    {
        $gender_error='Please choose gender';
        $valid=false;
    }
    }

    if(isset($_POST['mm_name'])){
    $mm_name=$_POST['mm_name'];
    
    if(empty($mm_name))
    {
        $mm_name_error='Please fill name (MM)';
        $valid=false;
    }
    }

    if(isset($_POST['email'])){
    $email=$_POST['email'];
    
    if(empty($email))
    {
        $email_error='Please fill Email';
        $valid=false;
    }
    }

    if(isset($_POST['syllabus'])){
    $syllabus=$_POST['syllabus'];
    
    if(empty($syllabus))
    {
        $syllabus_error='Please select syllabus';
        $valid=false;
    }
    }

    if(isset($_POST['school'])){
    $school=$_POST['school'];
    
    if(empty($school))
    {
        $school_error='Please fill school';
        $valid=false;
    }
    }

    if(isset($_POST['level'])){
    $level=$_POST['level'];
    
    if(empty($level))
    {
        $level_error='Please select level';
        $valid=false;
    }
    }

    if(isset($_POST['major'])){
    $major=$_POST['major'];
    
    if(empty($major))
    {
        $major_error='Please select major';
        $valid=false;
    }
    }

    if(isset($_POST['marks'])){
    $marks=$_POST['marks'];
    
    if(empty($marks))
    {
        $marks_error='Please fill marks';
        $valid=false;
    }
    }

    if(isset($_POST['birthdate'])){
    $birthdate=$_POST['birthdate'];
    
    if(empty($birthdate))
    {
        $birthdate_error='Please select birthdate';
        $valid=false;
    }
    }

    $nationality=$_POST['nationality'];
    $religion=$_POST['religion'];
    $bloodtype=$_POST['bloodtype'];
    $citizenid=$_POST['citizenid'];
    $passport=$_POST['passport'];
    

    $address=$_POST['address'];
    $street=$_POST['street'];
    $township=$_POST['township'];
    $zipcode=$_POST['zipcode'];
    $telephone=$_POST['telephone'];
    
    if(isset($_POST['citizen'])){
        $citizen=$_POST['citizen'];

    if(empty($citizen))
    {
        $fcitizen_error='Please fill citizenship';
        $valid=false;
    }
    }

    if(isset($_POST['city'])){
    $city=$_POST['city'];
    
    if(empty($city))
    {
        $city_error='Please fill city';
        $valid=false;
    }
    }

    if(isset($_POST['mobile'])){
    $mobile=$_POST['mobile'];
    
    if(empty($mobile))
    {
        $mobile_error='Please fill mobile';
        $valid=false;
    }
    }

    if(isset($_POST['facebook'])){
    $facebook=$_POST['facebook'];
    
    if(empty($facebook))
    {
        $facebook_error='Please fill facebook';
        $valid=false;
    }
    }

}


//to check father's info
if(!empty($_POST))
{
    
    if(isset($_POST['fname'])){
        $fname=$_POST['fname'];
        if(empty($fname))
        {
            $fname_error='Please fill name';
            $valid=false;
        }
    }

    if(isset($_POST['fnationality'])){
        $fnationality=$_POST['fnationality'];
        if(empty($fnationality))
        {
            $valid=false;
        }
    }

    if(isset($_POST['fcitizen'])){
        $fcitizen=$_POST['fcitizen'];
        if(empty($fcitizen))
        {
            $fcitizen_error='Please fill citizenship';
            $valid=false;
        }
    }

    if(isset($_POST['fstatus'])){
        $fstatus=$_POST['fstatus'];
        if(empty($fstatus))
        {
        $valid=false;
        }
    }

    if(isset($_POST['fage'])){
        $fage=$_POST['fage'];
        if(empty($fage))
        {
        $valid=false;
        }
    }
    if(isset($_POST['foccupation'])){
        $foccupation=$_POST['foccupation'];
        if(empty($foccupation))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fposition'])){
        $fposition=$_POST['fposition'];
        if(empty($fposition))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fstreet'])){
        $fstreet=$_POST['fstreet'];
        if(empty($fstreet))
        {
        $valid=false;
        }
    }
    if(isset($_POST['ftownship'])){
        $ftownship=$_POST['ftownship'];
        if(empty($ftownship))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fzipcode'])){
        $fzipcode=$_POST['fzipcode'];
        if(empty($fzipcode))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fcity'])){
        $fcity=$_POST['fcity'];
        if(empty($fcity))
        {
        $valid=false;
        }
    }
    if(isset($_POST['ftelephone'])){
        $ftelephone=$_POST['ftelephone'];
        if(empty($ftelephone))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fmobile'])){
        $fmobile=$_POST['fmobile'];
        if(empty($fmobile))
        {
        $valid=false;
        }
    }
}

//to check mother's info
if(!empty($_POST))
{
    
    if(isset($_POST['mname'])){
        $mname=$_POST['mname'];
        if(empty($fname))
        {
            $mname_error='Please fill name';
            $valid=false;
        }
    }

    if(isset($_POST['mnationality'])){
        $mnationality=$_POST['mnationality'];
        if(empty($mnationality))
        {
            $valid=false;
        }
    }

    if(isset($_POST['mcitizen'])){
        $mcitizen=$_POST['mcitizen'];
        if(empty($mcitizen))
        {
            $mcitizen_error='Please fill citizenship';
            $valid=false;
        }
    }

    if(isset($_POST['mstatus'])){
        $mstatus=$_POST['mstatus'];
        if(empty($mstatus))
        {
        $valid=false;
        }
    }

    if(isset($_POST['mage'])){
        $mage=$_POST['mage'];
        if(empty($mage))
        {
        $valid=false;
        }
    }
    if(isset($_POST['moccupation'])){
        $moccupation=$_POST['moccupation'];
        if(empty($moccupation))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mposition'])){
        $mposition=$_POST['mposition'];
        if(empty($mposition))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mstreet'])){
        $mstreet=$_POST['mstreet'];
        if(empty($mstreet))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mtownship'])){
        $mtownship=$_POST['mtownship'];
        if(empty($mtownship))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mzipcode'])){
        $mzipcode=$_POST['mzipcode'];
        if(empty($mzipcode))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mcity'])){
        $mcity=$_POST['mcity'];
        if(empty($mcity))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mtelephone'])){
        $mtelephone=$_POST['mtelephone'];
        if(empty($mtelephone))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mmobile'])){
        $mmobile=$_POST['mmobile'];
        if(empty($mmobile))
        {
        $valid=false;
        }
    }
}


//to check guardian's info
if(!empty($_POST))
{
    if(isset($_POST['gname'])){
        $gname=$_POST['gname'];
        if(empty($gname))
        {
            $gname_error='Please fill name';
            $valid=false;
        }
    }

    if(isset($_POST['gnationality'])){
        $gnationality=$_POST['gnationality'];
        if(empty($gnationality))
        {
            $valid=false;
        }
    }

    if(isset($_POST['gcitizen'])){
        $gcitizen=$_POST['gcitizen'];
        if(empty($gcitizen))
        {
            $mcitizen_error='Please fill citizenship';
            $valid=false;
        }
    }

    if(isset($_POST['gstatus'])){
        $gstatus=$_POST['gstatus'];
        if(empty($gstatus))
        {
        $valid=false;
        }
    }

    if(isset($_POST['gage'])){
        $gage=$_POST['gage'];
        if(empty($gage))
        {
        $valid=false;
        }
    }
    if(isset($_POST['goccupation'])){
        $moccupation=$_POST['goccupation'];
        if(empty($goccupation))
        {
        $valid=false;
        }
    }
    if(isset($_POST['gposition'])){
        $mposition=$_POST['gposition'];
        if(empty($gposition))
        {
        $valid=false;
        }
    }
    if(isset($_POST['gstreet'])){
        $gstreet=$_POST['gstreet'];
        if(empty($gstreet))
        {
        $valid=false;
        }
    }
    if(isset($_POST['gtownship'])){
        $gtownship=$_POST['gtownship'];
        if(empty($gtownship))
        {
        $valid=false;
        }
    }
    if(isset($_POST['gzipcode'])){
        $mzipcode=$_POST['gzipcode'];
        if(empty($gzipcode))
        {
        $valid=false;
        }
    }
    if(isset($_POST['gcity'])){
        $gcity=$_POST['gcity'];
        if(empty($gcity))
        {
        $valid=false;
        }
    }
    if(isset($_POST['gtelephone'])){
        $gtelephone=$_POST['gtelephone'];
        if(empty($gtelephone))
        {
        $valid=false;
        }
    }
    if(isset($_POST['gmobile'])){
        $gmobile=$_POST['gmobile'];
        if(empty($gmobile))
        {
        $valid=false;
        }
    }
    if(isset($_POST['guastatus'])){
        $guastatus=$_POST['guastatus'];
        if(empty($guastatus))
        {
        $valid=false;
        }
    }
}

//to check father is living or decease
    if(isset($_POST['fstatus']))
    {
        $fstatus=$_POST['fstatus'];
        if($fstatus=="fliving")
        {
            if(isset($_POST['fage']))
            {
                $fage=$_POST['fage'];
                if(empty($fage))
                {
                    $fageError='Please add age';
                    $valid=false;
                }
                $fmobile=$_POST['fmobile'];
                if(empty($fmobile))
                {
                    $fmobileError='Please add mobile';
                    $valid=false;
                }
            } 
        }
        // else
        // {
        //     $fage=$_POST['fage'];
        //     $foccuputation=$_POST['foccuputation'];
        //     $fposition=$position['fposition'];
        //     $fstreet=$_POST['fstreet'];
        //     $ftownship=$_POST['ftownship'];
        //     $fcity=$_POST['fcity'];
        //     $fzipcode=$_POST['fzipcode'];
        //     $ftelephone=$_POST['ftelephone'];
        //     $fmobile=$_POST['fmobile'];
            
        // }
        
    }

//to connect database


?>

<div class="container maincontent">
    <fieldset class="adminform">
    <legend>Admission Progress</legend>
      <table width="100%">
        <tr>
          <td width="20%"><b>1. Fill in Application</b></td>
          <td width="15%">2. Verify Data</td>
          <td width="32%">3. Print Application Form</td>
          <td width="12%">4. Login</td>
        </tr>
      </table>
      <div class="progress">
         <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
       </div>
    </fieldset>
    <form class="form-horizontal" action="application.php" method="post">
    <div class="container" >
    <div class="row">
      <h4> Applicant's Information </h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="title">Title<span class="help-inline">*</span></label>
           <div class="controls col-md-4">
                <select name="title" id="title" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="Mr" <?php echo (isset($_POST['title']) && $_POST['title'] === 'Mr') ? 'selected' : ''; ?>>Mr</option>
                  <option value="Ms" <?php echo (isset($_POST['title']) && $_POST['title'] === 'Ms') ? 'selected' : ''; ?>>Ms</option>
                  <option value="Mrs"<?php echo (isset($_POST['title']) && $_POST['title'] === 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                </select>
                <?php if (!empty($titleError)): ?>
                <span class="help-inline"><?php echo $titleError;?></span>
                <?php endif; ?>
                <!-- <script>
                    document.getElementById('title').value = "";
                </script> -->
                
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="eng_name">Name (Eng)<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="eng_name" type="text" id="eng_name" class="form-control form-control-inline col-md-4" placeholder="Name in English" value="<?php echo !empty($eng_name)?$eng_name:'';?>" >
               <?php if (!empty($eng_name_error)): ?>
                <span class="help-inline"><?php echo $eng_name_error;?></span>
                <?php endif; ?>            
            </div>
    </div>
    
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="mm_name">Name (MM)<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="mm_name" type="text" id="mm_name" class="form-control form-control-inline col-md-4" placeholder="Name in Myanmar" value="<?php echo !empty($mm_name)?$mm_name:'';?>">
               <?php if (!empty($mm_name_Error)): ?>
                <span class="help-inline"><?php echo $mm_name_Error;?></span>
                <?php endif; ?>            
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="gender">Gender<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="gender" id="male" value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Male')  echo ' checked="checked"';?>>Male</label>
            <label class="radio-inline"><input type="radio" name="gender" id="female" value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Female')  echo ' checked="checked"';?>>Female</label>         
            <br>
            <?php if (!empty($gender_error)): ?>
                <span class="help-inline"><?php echo $gender_error;?></span>
                <?php endif; ?>   
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="email">Email<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="email" type="text" id="email" class="form-control form-control-inline col-md-4" value="<?php echo !empty($email)?$email:'';?>" >
               <?php if (!empty($email_error)): ?>
                <span class="help-inline"><?php echo $email_error;?></span>
                <?php endif; ?>          
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="syllabus">Syllabus<span class="help-inline">*</span></label>
           <div class="controls col-md-4">
                <select name="syllabus" id="syllabus" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="civil" <?php echo (isset($_POST['syllabus']) && $_POST['syllabus'] === 'civil') ? 'selected' : ''; ?>>Civil Engineering</option>
                  <option value="it" <?php echo (isset($_POST['syllabus']) && $_POST['syllabus'] === 'it') ? 'selected' : ''; ?>>IT Engineering</option>
                  <option value="electrical" <?php echo (isset($_POST['syllabus']) && $_POST['syllabus'] === 'electrical') ? 'selected' : ''; ?>>Electrical Engineering</option>
                </select>
                <?php if (!empty($syllabus_error)): ?>
                <span class="help-inline"><?php echo $syllabus_error;?></span>
                <?php endif; ?> 
            </div>
    </div>
    </div>
    <br><hr>

  <div class="container" >
    <div class="row">
      <h4>Education </h4>
    </div>
    
    
    <div class="form-group ">
        <label class="control-label col-md-2" for="studyin">Study in<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="studyin" id="myanmar" value="myanmar" <?php if (isset($_POST['studyin']) && $_POST['studyin'] == 'myanmar')  echo ' checked="checked"';?>>Myanmar</label>
            <label class="radio-inline"><input type="radio" name="studyin" id="abroad " value="abroad" <?php if (isset($_POST['studyin']) && $_POST['studyin'] == 'abroad')  echo ' checked="checked"';?>>Abroad</label>
                            
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="school">School<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="school" type="text" id="school" class="form-control form-control-inline col-md-4" value="<?php echo !empty($school)?$school:'';?>" >
               <?php if (!empty($school_error)): ?>
                <span class="help-inline"><?php echo $school_error;?></span>
                <?php endif; ?>            
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="level">Level of Completion<span class="help-inline">*</span></label>
           <div class="controls col-md-4">
                <select name="level" id="level" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="gce_o" <?php echo (isset($_POST['level']) && $_POST['level'] === 'gce_o') ? 'selected' : ''; ?>>GCE O Level</option>
                  <option value="gce_a" <?php echo (isset($_POST['level']) && $_POST['level'] === 'gce_a') ? 'selected' : ''; ?>>GCE A Level</option>
                  <option value="grade11" <?php echo (isset($_POST['level']) && $_POST['level'] === 'grade11') ? 'selected' : ''; ?>>Grade 11</option>
                  <option value="igcse" <?php echo (isset($_POST['level']) && $_POST['level'] === 'igcse') ? 'selected' : ''; ?>>IGCSE</option>
                </select>
                <?php if (!empty($level_error)): ?>
                <span class="help-inline"><?php echo $level_error;?></span>
                <?php endif; ?>
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="major">Major of Completion<span class="help-inline">*</span></label>
           <div class="controls col-md-4">
                <select name="major" id="major" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="science" <?php echo (isset($_POST['major']) && $_POST['major'] === 'science') ? 'selected' : ''; ?>>Science (Biology)</option>
                  <option value="arts" <?php echo (isset($_POST['major']) && $_POST['major'] === 'arts') ? 'selected' : ''; ?>>Arts</option>
                  <option value="scienceArt" <?php echo (isset($_POST['major']) && $_POST['major'] === 'scienceArt') ? 'selected' : ''; ?>>Science and Arts</option>
                  <option value="other" <?php echo (isset($_POST['major']) && $_POST['major'] === 'other') ? 'selected' : ''; ?>>other</option>
                </select>
                <?php if (!empty($major_error)): ?>
                <span class="help-inline"><?php echo $major_error;?></span>
                <?php endif; ?>
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="marks">Marks<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="marks" type="text" id="marks" class="form-control form-control-inline col-md-4" value="<?php echo !empty($marks)?$marks:'';?>" >
               <?php if (!empty($marks_error)): ?>
                <span class="help-inline"><?php echo $marks_error;?></span>
                <?php endif; ?>          
            </div>
    </div>
  </div>
  <br><hr>

  <div class="container" >
    <div class="row">
      <h4>Personal Details </h4>
    </div>
    
    
    <div class="form-group ">
        <label class="control-label col-md-2" for="birthdate">Birthdate<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
            <input type="date" id="birthdate" name="birthdate" value="<?php echo isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate'], ENT_QUOTES) : ''; ?>">
            <?php if (!empty($birthdate_error)): ?>
                <span class="help-inline"><?php echo $birthdate_error;?></span>
                <?php endif; ?>              
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="nationality">Nationality</label>
            <div class="controls col-md-4">
               <input name="nationality" type="text" id="nationality" class="form-control form-control-inline col-md-4" value="<?php echo !empty($nationality)?$nationality:'';?>" >
                         
            </div>
            <label class="control-label col-md-2" for="citizen">Citizenship<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="citizen" type="text" id="citizen" class="form-control form-control-inline col-md-4" value="<?php echo !empty($citizen)?$citizen:'';?>" >
          
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="religion">Religion</label>
           <div class="controls col-md-4">
                <select name="religion" id="religion" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="buddhism" <?php echo (isset($_POST['religion']) && $_POST['religion'] === 'buddhism') ? 'selected' : ''; ?>>Buddhism</option>
                  <option value="chirstian" <?php echo (isset($_POST['religion']) && $_POST['religion'] === 'chirstian') ? 'selected' : ''; ?>>Christian</option>
                  <option value="islam" <?php echo (isset($_POST['religion']) && $_POST['religion'] === 'islam') ? 'selected' : ''; ?>>Islam</option>
                  <option value="hindu" <?php echo (isset($_POST['religion']) && $_POST['religion'] === 'hindu') ? 'selected' : ''; ?>>Hindu</option>
                  <option value="other" <?php echo (isset($_POST['religion']) && $_POST['religion'] === 'other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="bloodtype">Blood Group</label>
           <div class="controls col-md-4">
                <select name="bloodtype" id="bloodtype" class="form-control form-control-inline col-md-4" >
                <option value="" >---Select---</option>
                  <option value="A" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] === 'A') ? 'selected' : ''; ?>>A</option>
                  <option value="B" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] === 'B') ? 'selected' : ''; ?>>B</option>
                  <option value="AB" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] === 'AB') ? 'selected' : ''; ?>>AB</option>
                  <option value="O" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] === 'O') ? 'selected' : ''; ?>>O</option>
                </select>
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="citizenid">Citizen ID<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="citizenid" type="text" id="citizenid" class="form-control form-control-inline col-md-4" value="<?php echo !empty($citizenid)?$citizenid:'';?>" >
                            
            </div>
            <label class="control-label col-md-2" for="passport">If not Myanmar Citizen,enter passport number</label>
            <div class="controls col-md-4">
               <input name="passport" type="text" id="passport" class="form-control form-control-inline col-md-4" value="<?php echo !empty($passport)?$passport:'';?>" >
                            
            </div>
    </div>
  </div>
  <br><hr>
  <div class="container" >
    <div class="row">
      <h4>Mailing Address </h4>
    </div>
    
    
    
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="address">Address No:</label>
            <div class="controls col-md-4">
               <input name="address" type="text" id="address" class="form-control form-control-inline col-md-4" value="<?php echo !empty($address)?$address:'';?>" >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="street">Street</label>
        <div class="controls col-md-4">
               <input name="street" type="text" id="street" class="form-control form-control-inline col-md-4" value="<?php echo !empty($street)?$street:'';?>" >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="township">Township</label>
        <div class="controls col-md-4">
               <input name="township" type="text" id="township" class="form-control form-control-inline col-md-4" value="<?php echo !empty($township)?$township:'';?>" >
                       
            </div> 
            <label class="control-label col-md-2" for="city">City<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="city" type="text" id="city" class="form-control form-control-inline col-md-4" value="<?php echo !empty($city)?$city:'';?>" >
               <?php if (!empty($city_error)): ?>
                <span class="help-inline"><?php echo $city_error;?></span>
                <?php endif; ?>           
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="zipcode">Zip Code</label>
            <div class="controls col-md-4">
               <input name="zipcode" type="text" id="zipcode" class="form-control form-control-inline col-md-4" value="<?php echo !empty($zipcode)?$zipcode:'';?>" >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="telephone">Telephone</label>
        <div class="controls col-md-4">
               <input name="telephone" type="text" id="telephone" class="form-control form-control-inline col-md-4" value="<?php echo !empty($telephone)?$telephone:'';?>" >
                            
            </div> 
            <label class="control-label col-md-2" for="mobile">Mobile<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="mobile" type="text" id="mobile" class="form-control form-control-inline col-md-4" value="<?php echo !empty($mobile)?$mobile:'';?>" >
               <?php if (!empty($mobile_error)): ?>
                <span class="help-inline"><?php echo $mobile_error;?></span>
                <?php endif; ?>            
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="facebook">Facebook<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="facebook" type="text" id="facebook" class="form-control form-control-inline col-md-4" value="<?php echo !empty($facebook)?$facebook:'';?>" >
               <?php if (!empty($facebook_error)): ?>
                <span class="help-inline"><?php echo $facebook_error;?></span>
                <?php endif; ?>     
            </div>
            
    </div>
  </div>
  <br><hr>
  <div class="container" >
    <div class="row">
      <h4>Father's Information </h4>
    </div>
    
    
    
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="fname">Name<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="fname" type="text" id="fname" class="form-control form-control-inline col-md-4" value="<?php echo !empty($fname)?$fname:'';?>" >
               <?php if (!empty($fname_error)): ?>
                <span class="help-inline"><?php echo $fname_error;?></span>
                <?php endif; ?>         
            </div>
            
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="fnationality">Nationality</label>
            <div class="controls col-md-4">
               <input name="fnationality" type="text" id="fnationality" class="form-control form-control-inline col-md-4" value="<?php echo !empty($fnationality)?$fnationality:'';?>" >
                        
            </div>
            <label class="control-label col-md-2" for="fcitizen">Citizenship<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="fcitizen" type="text" id="fcitizen" class="form-control form-control-inline col-md-4" value="<?php echo !empty($fcitizen)?$fcitizen:'';?>" >
               <?php if (!empty($fcitizen_error)): ?>
                <span class="help-inline"><?php echo $fcitizen_error;?></span>
                <?php endif; ?>           
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="fstatus">Status<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="fstatus" id="fliving" value="fliving" <?php if (isset($_POST['fstatus']) && $_POST['fstatus'] == 'fliving')  echo ' checked="checked"';?>>Living</label>
            <label class="radio-inline"><input type="radio" name="fstatus" id="fdecese" value="fdecese"<?php if (isset($_POST['fstatus']) && $_POST['fstatus'] == 'fdecese')  echo ' checked="checked"';?>>Decese</label>
                            
            </div>
    </div>

    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="fage">Age</label>
        <div class="controls col-md-4">
               <input name="fage" type="text" id="fage" class="form-control form-control-inline col-md-4" value="<?php echo !empty($fage)?$fage:'';?>" >
               <div id="fageErrordiv">
                    <?php if (!empty($fageError)): ?>
                    <span class="help-inline"><?php echo $fageError;?></span>
                    <?php endif; ?>
                </div>           
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="foccupation">Occupation</label>
        <div class="controls col-md-4">
               <input name="foccupation" type="text" id="foccupation" class="form-control form-control-inline col-md-4" value="<?php echo !empty($foccupation)?$foccupation:'';?>" >
                            
            </div>  
            <label class="control-label col-md-2" for="fposition">Position</label>
        <div class="controls col-md-4">
               <input name="fposition" type="text" id="fposition" class="form-control form-control-inline col-md-4" value="<?php echo !empty($fposition)?$fposition:'';?>" >
                            
            </div> 
    </div>
    <br><br>
    <div class="form-check">
        <label class="control-label col-md-2" for="faddress">Father's address</label>
        <div class="controls col-md-4">
               <input name="faddress" type="checkbox" id="faddress" class="form-check-input form-control-inline col-md-4" value="Yes" <?php if(isset($_POST['faddress'])) echo "checked='checked'"; ?> >
               <label class="form-check-label" for="faddress">Same as applicant's address</label>           
        </div>  
    </div>
    <br><br>
    <div class="form-group">
        <label class="control-label col-md-2" for="fstreet">Street</label>
        <div class="controls col-md-4">
               <input name="fstreet" type="text" id="fstreet" class="form-control form-control-inline col-md-4" value="<?php echo !empty($fstreet)?$fstreet:'';?>" >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="ftownship">Township</label>
        <div class="controls col-md-4">
               <input name="ftownship" type="text" id="ftownship" class="form-control form-control-inline col-md-4" value="<?php echo !empty($ftownship)?$ftownship:'';?>" >
                            
            </div> 
            <label class="control-label col-md-2" for="fcity">City</label>
        <div class="controls col-md-4">
               <input name="fcity" type="text" id="fcity" class="form-control form-control-inline col-md-4" value="<?php echo !empty($fcity)?$fcity:'';?>" >
                            
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="fzipcode">Zip Code</label>
            <div class="controls col-md-4">
               <input name="fzipcode" type="text" id="fzipcode" class="form-control form-control-inline col-md-4" value="<?php echo !empty($fzipcode)?$fzipcode:'';?>" >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="ftelephone">Telephone</label>
        <div class="controls col-md-4">
               <input name="ftelephone" type="text" id="ftelephone" class="form-control form-control-inline col-md-4" value="<?php echo !empty($ftelephone)?$ftelephone:'';?>" >
                            
            </div> 
            <label class="control-label col-md-2" for="fmobile">Mobile<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="fmobile" type="text" id="fmobile" class="form-control form-control-inline col-md-4" value="<?php echo !empty($fmobile)?$fmobile:'';?>" >
               <div id="fmobileErrordiv">
               <?php if (!empty($fmobileError)): ?>
                <span class="help-inline"><?php echo $fmobileError;?></span>
                <?php endif; ?> 
                </div>          
        </div>  
    </div>    <br>
    
  
  </div>
  <br><hr>
  <div class="container" >
    <div class="row">
      <h4>Mother's Information </h4>
    </div>
    
    
    
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="mname">Name<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="mname" type="text" id="mname" class="form-control form-control-inline col-md-4" value="<?php echo !empty($mname)?$mname:'';?>"  >
               <?php if (!empty($mname_error)): ?>
                <span class="help-inline"><?php echo $mname_error;?></span>
                <?php endif; ?>            
            </div>
            
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="mnationality">Nationality</label>
            <div class="controls col-md-4">
               <input name="mnationality" type="text" id="mnationality" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($mnationality)?$mnationality:'';?>" >
                         
            </div>
            <label class="control-label col-md-2" for="mcitizen">Citizenship<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="mcitizen" type="text" id="mcitizen" class="form-control form-control-inline col-md-4"  >
               <?php if (!empty($mcitizen_error)): ?>
                <span class="help-inline"><?php echo $mcitizen_error;?></span>
                <?php endif; ?>           
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="mstatus">Status<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="mstatus" id="mliving" value="mliving" <?php if (isset($_POST['mstatus']) && $_POST['mstatus'] == 'mliving')  echo ' checked="checked"';?>>Living</label>
            <label class="radio-inline"><input type="radio" name="mstatus" id="mdecese" value="mdecese" <?php if (isset($_POST['mstatus']) && $_POST['mstatus'] == 'mdecese')  echo ' checked="checked"';?>>Decese</label>
                            
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="mage">Age</label>
        <div class="controls col-md-4">
               <input name="mage" type="text" id="mage" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($mage)?$mage:'';?>" >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="moccupation">Occuputation</label>
        <div class="controls col-md-4">
               <input name="moccupation" type="text" id="moccupation" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($moccupation)?$moccupation:'';?>" >
                            
            </div>  
            <label class="control-label col-md-2" for="mposition">Position</label>
        <div class="controls col-md-4">
               <input name="mposition" type="text" id="mposition" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($mposition)?$mposition:'';?>" >
                            
            </div> 
    </div>
    <br><br>
    <div class="form-check">
        <label class="control-label col-md-2" for="maddress">Mother's address</label>
        <div class="controls col-md-4">
               <input name="maddress" type="checkbox" id="maddress" class="form-check-input form-control-inline col-md-4" value="Yes" <?php if(isset($_POST['maddress'])) echo "checked='checked'"; ?> >
               <label class="form-check-label" for="maddress">Same as applicant's address</label>           
        </div>  
    </div>
    <br><br>
    <div class="form-group">
        <label class="control-label col-md-2" for="mstreet">Street</label>
        <div class="controls col-md-4">
               <input name="mstreet" type="text" id="mstreet" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($mstreet)?$mstreet:'';?>" >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="mtownship">Township</label>
        <div class="controls col-md-4">
               <input name="mtownship" type="text" id="mtownship" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($mtownship)?$mtownship:'';?>" >
                            
            </div> 
            <label class="control-label col-md-2" for="mcity">City</label>
        <div class="controls col-md-4">
               <input name="mcity" type="text" id="mcity" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($mcity)?$mcity:'';?>" >
                            
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="mzipcode">Zip Code</label>
            <div class="controls col-md-4">
               <input name="mzipcode" type="text" id="mzipcode" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($mzipcode)?$mzipcode:'';?>" >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="mtelephone">Telephone</label>
        <div class="controls col-md-4">
               <input name="mtelephone" type="text" id="mtelephone" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($mtelephone)?$mtelephone:'';?>" >
                            
            </div> 
            <label class="control-label col-md-2" for="mmobile">Mobile<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="mmobile" type="text" id="mmobile" class="form-control form-control-inline col-md-4"  value="<?php echo !empty($mmobile)?$mmobile:'';?>" >
                            
        </div>  
    </div>    <br>
    
    <div class="container" >
    <div class="row">
      <h4>Guardian's Information </h4>
    </div>    
    
    
    <div class="form-group ">
        <label class="control-label col-md-2" for="gstatus">Status<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="gstatus" value="father" id="father" <?php if (isset($_POST['gstatus']) && $_POST['gstatus'] == 'father')  echo ' checked="checked"';?>>Father</label>
            <label class="radio-inline"><input type="radio" name="gstatus" value="mother" id="mother" <?php if (isset($_POST['gstatus']) && $_POST['gstatus'] == 'mother')  echo ' checked="checked"';?>>Mother</label>
            <label class="radio-inline"><input type="radio" name="gstatus" value="other" id="other" <?php if (isset($_POST['gstatus']) && $_POST['gstatus'] == 'other')  echo ' checked="checked"';?>>Other</label>
                    
            </div>
    </div>
    <?php if (isset($_POST['gstatus']) && $_POST['gstatus'] == 'other'){?> 
    <div id="guardianInfo">
    <div class="form-group ">
            <label class="control-label col-md-2" for="gname">Name<span class="help-inline">*</span></label>
                <div class="controls col-md-4">
                   <input name="gname" type="text" id="gname" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gname)?$gname:'';?>">
                   <?php if (!empty($gname_error)): ?>
                    <span class="help-inline"><?php echo $gname_error;?></span>
                    <?php endif; ?>   
                </div>
                
        </div>
        <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="gnationality">Nationality</label>
            <div class="controls col-md-4">
               <input name="gnationality" type="text" id="gnationality" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gnationality)?$gnationality:'';?>" >
                            
            </div>
            <label class="control-label col-md-2" for="gcitizen">Citizenship<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
               <input name="gcitizen" type="text" id="gcitizen" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gcitizen)?$gcitizen:'';?>" >
               <?php if (!empty($gcitizen_error)): ?>
                    <span class="help-inline"><?php echo $gcitizen_error;?></span>
                    <?php endif; ?>           
            </div>
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="guastatus">Status<span class="help-inline">*</span></label>
            <div class="controls col-md-4">
            <label class="radio-inline"><input type="radio" name="guastatus" id="gliving" value="gliving" <?php if (isset($_POST['guastatus']) && $_POST['guastatus'] == 'gliving')  echo ' checked="checked"';?>>Living</label>
            <label class="radio-inline"><input type="radio" name="guastatus" id="gdecese" value="gdecese" <?php if (isset($_POST['guastatus']) && $_POST['guastatus'] == 'gdecese')  echo ' checked="checked"';?>>Decese</label>
                            
            </div>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="gage">Age</label>
        <div class="controls col-md-4">
               <input name="gage" type="text" id="gage" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gage)?$gage:'';?>" >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="goccupation">Occuputation</label>
        <div class="controls col-md-4">
               <input name="goccupation" type="text" id="goccupation" class="form-control form-control-inline col-md-4" value="<?php echo !empty($goccupation)?$goccupation:'';?>" >
                            
            </div>  
            <label class="control-label col-md-2" for="gposition">Position</label>
        <div class="controls col-md-4">
               <input name="gposition" type="text" id="gposition" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gposition)?$gposition:'';?>" >
                            
            </div> 
    </div>
    <br><br>
    <div class="form-check">
        <label class="control-label col-md-2" for="gaddress">Guardian address</label>
        <div class="controls col-md-4">
               <input name="gaddress" type="checkbox" id="gaddress" class="form-check-input form-control-inline col-md-4" value="Yes" <?php if(isset($_POST['gaddress'])) echo "checked='checked'"; ?> >
               <label class="form-check-label" for="gaddress">Same as applicant address</label>           
        </div>  
    </div>
    <br><br>
    <div class="form-group">
        <label class="control-label col-md-2" for="gstreet">Street</label>
        <div class="controls col-md-4">
               <input name="gstreet" type="text" id="gstreet" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gstreet)?$gstreet:'';?>" >
                            
            </div>  
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="gtownship">Township</label>
        <div class="controls col-md-4">
               <input name="gtownship" type="text" id="gtownship" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gtownship)?$gtownship:'';?>" >
                            
            </div> 
            <label class="control-label col-md-2" for="gcity">City<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="gcity" type="text" id="gcity" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gcity)?$gcity:'';?>" >
                            
        </div>  
    </div>
    <br>
    <div class="form-group ">
        <label class="control-label col-md-2" for="gzipcode">Zip Code</label>
            <div class="controls col-md-4">
               <input name="gzipcode" type="text" id="gzipcode" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gzipcode)?$gzipcode:'';?>" >
                            
            </div>
            
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-2" for="gtelephone">Telephone</label>
        <div class="controls col-md-4">
               <input name="gtelephone" type="text" id="gtelephone" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gtelephone)?$gtelephone:'';?>" >
                            
            </div> 
            <label class="control-label col-md-2" for="gmobile">Mobile<span class="help-inline">*</span></label>
        <div class="controls col-md-4">
               <input name="gmobile" type="text" id="gmobile" class="form-control form-control-inline col-md-4" value="<?php echo !empty($gmobile)?$gmobile:'';?>">
                            
        </div>  
    </div>
    </div>
      
    <?php }else{ ?>

        <div id="guardianInfo"></div> 

        <?php }?> 
  </div>
  <br><hr>
    <div class="col-md-12 button">
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    <button type="reset" class="btn btn-secondary" name="reset" value="reset">Reset</button>
    </div>
</form>
</div>
<br>

    <?php
        include 'footer.php';
    ?>


<script> 
$(document).ready(function(){
//father's decese
$('input[name="fstatus"]').on('change',function()
     {
         if(this.value!="fdecese"){
            $("#fage").attr("disabled", false);
            $("#foccupation").attr("disabled",false);
         $("#fposition").attr("disabled",false);
         $("#faddress").attr("disabled",false);
         $("#fstreet").attr("disabled",false);
         $("#ftownship").attr("disabled",false);
         $("#fcity").attr("disabled",false);
         $("#fzipcode").attr("disabled",false);
         $("#ftelephone").attr("disabled",false);
         $("#fmobile").attr("disabled",false);

         $("#fstreet").attr("readonly",false);
         $("#ftownship").attr("readonly",false);
         $("#fcity").attr("readonly",false);
         $("#fzipcode").attr("readonly",false);

            $("#fageErrordiv").show();
            $("#fmobileErrordiv").show();

         }
         else{
            $("#fage").attr("disabled",true);
         $("#foccupation").attr("disabled",true);
         $("#fposition").attr("disabled",true);
         $("#faddress").attr("disabled",true);
         $("#fstreet").attr("disabled",true);
         $("#ftownship").attr("disabled",true);
         $("#fcity").attr("disabled",true);
         $("#fzipcode").attr("disabled",true);
         $("#ftelephone").attr("disabled",true);
         $("#fmobile").attr("disabled",true);

         $('#fage').val("");
         $('#foccupation').val("");
         $('#fposition').val("");
         $('#faddress').prop("checked", false);
         $('#fstreet').val("");
         $('#ftownship').val("");
         $('#fcity').val("");
         $('#fzipcode').val("");
         $('#ftelephone').val("");
         $('#fmobile').val("");

            $("#fageErrordiv").hide();
            $("#fmobileErrordiv").hide();
         }
         
     });

     //to keep function of selected status for father
      <?php if (isset($_POST['fstatus']) && $_POST['fstatus'] == 'fdecese'){?> 

        $("#fage").attr("disabled",true);
         $("#foccupation").attr("disabled",true);
         $("#fposition").attr("disabled",true);
         $("#faddress").attr("disabled",true);
         $("#fstreet").attr("disabled",true);
         $("#ftownship").attr("disabled",true);
         $("#fcity").attr("disabled",true);
         $("#fzipcode").attr("disabled",true);
         $("#ftelephone").attr("disabled",true);
         $("#fmobile").attr("disabled",true);

        $('#fage').val("");
         $('#foccupation').val("");
         $('#fposition').val("");
         $('#faddress').prop("checked", false);
         $('#fstreet').val("");
         $('#ftownship').val("");
         $('#fcity').val("");
         $('#fzipcode').val("");
         $('#ftelephone').val("");
         $('#fmobile').val("");

        $("#fageErrordiv").hide();
        $("#fmobileErrordiv").hide();
         
      <?php }else{ ?>
        $("#fage").attr("disabled", false);
            $("#foccupation").attr("disabled",false);
         $("#fposition").attr("disabled",false);
         $("#fstreet").attr("disabled",false);
         $("#faddress").attr("disabled",false);
         $("#ftownship").attr("disabled",false);
         $("#fcity").attr("disabled",false);
         $("#fzipcode").attr("disabled",false);
         $("#ftelephone").attr("disabled",false);
         $("#fmobile").attr("disabled",false);

         $("#fstreet").attr("readonly",false);
         $("#ftownship").attr("readonly",false);
         $("#fcity").attr("readonly",false);
         $("#fzipcode").attr("readonly",false);

            $("#fageErrordiv").show();
            $("#fmobileErrordiv").show();
        
     <?php } ?>


//mother's decese
$('input[name="mstatus"]').on('change',function()
     {
         if(this.value!="mdecese"){
            $("#mage").attr("disabled", false);
            $("#moccupation").attr("disabled",false);
         $("#mposition").attr("disabled",false);
         $("#maddress").attr("disabled",false);
         $("#mstreet").attr("disabled",false);
         $("#mtownship").attr("disabled",false);
         $("#mcity").attr("disabled",false);
         $("#mzipcode").attr("disabled",false);
         $("#mtelephone").attr("disabled",false);
         $("#mmobile").attr("disabled",false);

         $("#mstreet").attr("readonly",false);
         $("#mtownship").attr("readonly",false);
         $("#mcity").attr("readonly",false);
         $("#mzipcode").attr("readonly",false);

            $("#mageErrordiv").show();
            $("#mmobileErrordiv").show();

         
         }
         else{
            $("#mage").attr("disabled",true);
         $("#moccupation").attr("disabled",true);
         $("#mposition").attr("disabled",true);
         $("#maddress").attr("disabled",true);
         $("#mstreet").attr("disabled",true);
         $("#mtownship").attr("disabled",true);
         $("#mcity").attr("disabled",true);
         $("#mzipcode").attr("disabled",true);
         $("#mtelephone").attr("disabled",true);
         $("#mmobile").attr("disabled",true);

         $('#mage').val("");
         $('#moccupation').val("");
         $('#mposition').val("");
         $('#maddress').prop("checked", false);
         $('#mstreet').val("");
         $('#mtownship').val("");
         $('#mcity').val("");
         $('#mzipcode').val("");
         $('#mtelephone').val("");
         $('#mmobile').val("");

            $("#mageErrordiv").hide();
            $("#mmobileErrordiv").hide();
         }
         
     });

     //to keep function of selected status for mother
      <?php if (isset($_POST['mstatus']) && $_POST['mstatus'] == 'mdecese'){?> 
        $("#mage").attr("disabled",true);
         $("#moccupation").attr("disabled",true);
         $("#mposition").attr("disabled",true);
         $("#maddress").attr("disabled",true);
         $("#mstreet").attr("disabled",true);
         $("#mtownship").attr("disabled",true);
         $("#mcity").attr("disabled",true);
         $("#mzipcode").attr("disabled",true);
         $("#mtelephone").attr("disabled",true);
         $("#mmobile").attr("disabled",true);

         $('#mage').val("");
         $('#moccupation').val("");
         $('#mposition').val("");
         $('#maddress').prop("checked", false);
         $('#mstreet').val("");
         $('#mtownship').val("");
         $('#mcity').val("");
         $('#mzipcode').val("");
         $('#mtelephone').val("");
         $('#mmobile').val("");

            $("#mageErrordiv").hide();
            $("#mmobileErrordiv").hide();
        
         
      <?php }else{ ?>
        $("#mage").attr("disabled", false);
            $("#moccupation").attr("disabled",false);
         $("#mposition").attr("disabled",false);
         $("#maddress").attr("disabled",false);
         $("#mstreet").attr("disabled",false);
         $("#mtownship").attr("disabled",false);
         $("#mcity").attr("disabled",false);
         $("#mzipcode").attr("disabled",false);
         $("#mtelephone").attr("disabled",false);
         $("#mmobile").attr("disabled",false);

         
         $("#mstreet").attr("readonly",false);
         $("#mtownship").attr("readonly",false);
         $("#mcity").attr("readonly",false);
         $("#mzipcode").attr("readonly",false);

            $("#mageErrordiv").show();
            $("#mmobileErrordiv").show();
        
     <?php } ?>

//guardian's decese
     $('input[name="guastatus"]').on('change',function()
     {
         if(this.value!="gdecese"){
            $("#gage").attr("disabled", false);
            $("#goccupation").attr("disabled",false);
         $("#gposition").attr("disabled",false);
         $("#gaddress").attr("disabled",false);
         $("#gstreet").attr("disabled",false);
         $("#gtownship").attr("disabled",false);
         $("#gcity").attr("disabled",false);
         $("#gzipcode").attr("disabled",false);
         $("#gtelephone").attr("disabled",false);
         $("#gmobile").attr("disabled",false);
         
         $("#gstreet").attr("readonly",false);
         $("#gtownship").attr("readonly",false);
         $("#gcity").attr("readonly",false);
         $("#gzipcode").attr("readonly",false);

            // $("#fageErrordiv").show();
            // $("#fmobileErrordiv").show();

         }
         else{
            $("#gage").attr("disabled",true);
         $("#goccupation").attr("disabled",true);
         $("#gposition").attr("disabled",true);
         $("#gaddress").attr("disabled",true);
         $("#gstreet").attr("disabled",true);
         $("#gtownship").attr("disabled",true);
         $("#gcity").attr("disabled",true);
         $("#gzipcode").attr("disabled",true);
         $("#gtelephone").attr("disabled",true);
         $("#gmobile").attr("disabled",true);

         $('#gage').val("");
         $('#goccupation').val("");
         $('#gposition').val("");
         $('#gaddress').prop("checked", false);
         $('#gstreet').val("");
         $('#gtownship').val("");
         $('#gcity').val("");
         $('#gzipcode').val("");
         $('#gtelephone').val("");
         $('#gmobile').val("");

            // $("#fageErrordiv").hide();
            // $("#fmobileErrordiv").hide();
         }
         
     });

     //to keep function of selected status for guardian
      <?php if (isset($_POST['guastatus']) && $_POST['guastatus'] == 'gdecese'){?> 
        $("#gage").attr("disabled",true);
         $("#goccupation").attr("disabled",true);
         $("#gposition").attr("disabled",true);
         $("#gaddress").attr("disabled",true);
         $("#gstreet").attr("disabled",true);
         $("#gtownship").attr("disabled",true);
         $("#gcity").attr("disabled",true);
         $("#gzipcode").attr("disabled",true);
         $("#gtelephone").attr("disabled",true);
         $("#gmobile").attr("disabled",true);

         $('#gage').val("");
         $('#goccupation').val("");
         $('#gposition').val("");
         $('#gaddress').val("");
         $('#gstreet').val("");
         $('#gtownship').val("");
         $('#gcity').val("");
         $('#gzipcode').val("");
         $('#gtelephone').val("");
         $('#gmobile').val("");

        // $("#fageErrordiv").hide();
        // $("#fmobileErrordiv").hide();
         
      <?php }else{ ?>
        $("#gage").prop("disabled", false);
            $("#goccupation").attr("disabled",false);
         $("#gposition").attr("disabled",false);
         $("#gaddress").attr("disabled",false);
         $("#gstreet").attr("disabled",false);
         $("#gtownship").attr("disabled",false);
         $("#gcity").attr("disabled",false);
         $("#gzipcode").attr("disabled",false);
         $("#gtelephone").attr("disabled",false);
         $("#gmobile").attr("disabled",false);

         $("#gstreet").attr("readonly",false);
         $("#gtownship").attr("readonly",false);
         $("#gcity").attr("readonly",false);
         $("#gzipcode").attr("readonly",false);


            // $("#fageErrordiv").show();
            // $("#fmobileErrordiv").show();
        
     <?php } ?>

     //same as applicant for father
     $("#faddress").change(function(){
         var st=this.checked;
         if(st){
            //  var fst= ;
            //  $("#fstreet").val("street");
             $("#fstreet").attr('readonly', true);
             $('#fstreet').val($("#street").val());

             $("#ftownship").attr('readonly', true);
             $('#ftownship').val($("#township").val());

             $("#fcity").attr('readonly', true);
             $('#fcity').val($("#city").val());

             $("#fzipcode").attr('readonly', true);
             $('#fzipcode').val($("#zipcode").val());
         }
         else{
            $("#fstreet").attr('readonly', false);
            $('#fstreet').val("");

            $("#ftownship").attr('readonly', false);
            $('#ftownship').val("");

            $("#fcity").attr('readonly', false);
            $('#fcity').val("");

            $("#fzipcode").attr('readonly', false);
            $('#fzipcode').val("");
         }
     })
     //to retain readonly attribute for father address
     <?php if(isset($_POST['faddress']))  {?> 
        $("#fstreet").attr('readonly', true);
        $("#ftownship").attr('readonly', true);
        $("#fcity").attr('readonly', true);
        $("#fzipcode").attr('readonly', true);
        <?php }else{ ?>
            $("#fstreet").attr('readonly', false);
        $("#ftownship").attr('readonly', false);
        $("#fcity").attr('readonly', false);
        $("#fzipcode").attr('readonly', false);
        <?php }?>

     //same as applicant for mother
     $("#maddress").change(function(){
         var st=this.checked;
         if(st){
            
             $("#mstreet").attr('readonly', true);
             $('#mstreet').val($("#street").val());

             $("#mtownship").attr('readonly', true);
             $('#mtownship').val($("#township").val());

             $("#mcity").attr('readonly', true);
             $('#mcity').val($("#city").val());

             $("#mzipcode").attr('readonly', true);
             $('#mzipcode').val($("#zipcode").val());
         }
         else{
            $("#mstreet").attr('readonly', false);
            $('#mstreet').val("");

            $("#mtownship").attr('readonly', false);
            $('#mtownship').val("");

            $("#mcity").attr('readonly', false);
            $('#mcity').val("");

            $("#mzipcode").attr('readonly', false);
            $('#mzipcode').val("");
         }
     })
     //to retain readonly attribute for mother address
     <?php if(isset($_POST['maddress']))  {?> 
        $("#mstreet").attr('readonly', true);
        $("#mtownship").attr('readonly', true);
        $("#mcity").attr('readonly', true);
        $("#mzipcode").attr('readonly', true);
        <?php }else{ ?>
            $("#mstreet").attr('readonly', false);
        $("#mtownship").attr('readonly', false);
        $("#mcity").attr('readonly', false);
        $("#mzipcode").attr('readonly', false);
        <?php }?>


     //same as applicant for guardian
     $("#gaddress").change(function(){
         var st=this.checked;
         if(st){
            
             $("#gstreet").attr('readonly', true);
             $('#gstreet').val($("#street").val());

             $("#gtownship").attr('readonly', true);
             $('#gtownship').val($("#township").val());

             $("#gcity").attr('readonly', true);
             $('#gcity').val($("#city").val());

             $("#gzipcode").attr('readonly', true);
             $('#gzipcode').val($("#zipcode").val());
         }
         else{
            $("#gstreet").attr('readonly', false);
            $('#gstreet').val("");

            $("#gtownship").attr('readonly', false);
            $('#gtownship').val("");

            $("#gcity").attr('readonly', false);
            $('#gcity').val("");

            $("#gzipcode").attr('readonly', false);
            $('#gzipcode').val("");
         }
     })
     //to retain readonly attribute for guardian address
     <?php if(isset($_POST['gaddress']))  {?> 
        $("#gstreet").attr('readonly', true);
        $("#gtownship").attr('readonly', true);
        $("#gcity").attr('readonly', true);
        $("#gzipcode").attr('readonly', true);
        <?php }else{ ?>
            $("#gstreet").attr('readonly', false);
        $("#gtownship").attr('readonly', false);
        $("#gcity").attr('readonly', false);
        $("#gzipcode").attr('readonly', false);
        <?php }?>

    });
</script>

<script> //guardian for other
$(document).ready(function(){

$('#other').on('change', function () {

    var gstatus = $(this).val();
    //$("#guardianInfo").show();
    console.log(gstatus);
   
    
    $.ajax({
        type: "POST",
        url: "show_guardian.php",
        // dataType: 'json',
        data: {'gstatus': gstatus },
        success: function (html) {
            
            console.log(html);
            $('#guardianInfo').html(html);
           
        }
    });
});


$('#father').on('change', function () {

var gstatus = $(this).val();
console.log(gstatus);


$.ajax({
    type: "POST",
    url: "show_guardian.php",
    // dataType: 'json',
    data: {'gstatus': gstatus },
    success: function (json) {
        
        console.log(json);
        $('#guardianInfo').html(json);
        
       
    }
});
});

$('#mother').on('change', function () {

var gstatus = $(this).val();
console.log(gstatus);


$.ajax({
    type: "POST",
    url: "show_guardian.php",
    // dataType: 'json',
    data: {'gstatus': gstatus },
    success: function (json) {
        
        console.log(json);
        $('#guardianInfo').html(json);
        
       
    }
});
});

});

</script>
   


</body>
</html>