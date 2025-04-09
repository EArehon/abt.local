<?php
  require_once 'vendor/autoload.php';
  
  $surnameRus = $_POST['surnameRus'];
  $nameRus = $_POST['nameRus'];
  $patronymicRus = $_POST['patronymicRus'];
  $gender = $_POST['gender'];
  $birthDate = $_POST['birthDate'];
  $surnameBel = $_POST['surnameBel'];
  $nameBel = $_POST['nameBel'];
  $patronymicBel = $_POST['patronymicBel'];
  $сitizenship = $_POST['сitizenship'];
  $stdSpeciality = $_POST['stdSpeciality'];
  $stdFaculty= $_POST['stdFaculty'];
  $stdFormLearning = $_POST['stdFormLearning'];
  $addressCountry = $_POST['addressCountry'];
  $addressRegion = $_POST['addressRegion'];
  $addressDistrict = $_POST['addressDistrict'];
  $addressCity = $_POST['addressCity'];
  $addressStreet = $_POST['addressStreet'];
  $addressHouse = $_POST['addressHouse'];
  $addressApartment = $_POST['addressApartment'];
  $addressZipcode = $_POST['addressZipcode'];
  $phone = $_POST['phone'];
  $eduYear= $_POST['eduYear'];
  $eduType= $_POST['eduType'];
  $eduCity= $_POST['eduCity'];
  $eduReward= $_POST['eduReward'];
  $phone = $_POST['phone'];
  
  $eduPurpose= $_POST['eduPurpose'];
  $eduPurposeDistrict= $_POST['eduPurposeDistrict'];
  $eduPedClass= $_POST['eduPedClass'];
  $eduCT1= $_POST['eduCT1'];
  $eduCT2= $_POST['eduCT2'];
  $eduCT3= $_POST['eduCT3'];
  $eduLang= $_POST['eduLang'];
  $eduAverage= $_POST['eduAverage'];
  $eduBRSM= $_POST['eduBRSM'];
  $docSeries= $_POST['docSeries'];
  $docNumber= $_POST['docNumber'];
  $docUniqueNumber= $_POST['docUniqueNumber'];
  $docDateIssuance= $_POST['docDateIssuance'];
  $docDateEnd= $_POST['docDateEnd'];
  $docIssuingAuthority= $_POST['docIssuingAuthority'];
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  if ($_POST['action'] == 'Анкета') {
    $doc = new \PhpOffice\PhpWord\TemplateProcessor('./questionnaire.docx');

    $uploadDir =  __DIR__;
    $outputFile = 'анкета '.$surnameRus.'.docx';
    
    $doc->setValue('surnameRus', $surnameRus);
    $doc->setValue('nameRus', $nameRus);
    $doc->setValue('patronymicRus', $patronymicRus);
    $doc->setValue('gender', $gender);
    $doc->setValue('birthDate', $birthDate);
    $doc->setValue('surnameBel', $surnameBel);
    $doc->setValue('nameBel', $nameBel);
    $doc->setValue('patronymicBel', $patronymicBel);
    $doc->setValue('сitizenship', $сitizenship);
	$doc->setValue('stdSpeciality', $stdSpeciality);
    $doc->setValue('stdFaculty', $stdFaculty);
    $doc->setValue('stdFormLearning', $stdFormLearning);
    $doc->setValue('addressCountry', $addressCountry);
    $doc->setValue('addressRegion', $addressRegion);
    $doc->setValue('addressDistrict', $addressDistrict);
    $doc->setValue('addressCity', $addressCity);
    $doc->setValue('addressStreet', $addressStreet);
    $doc->setValue('addressHouse', $addressHouse);
    $doc->setValue('addressApartment', $addressApartment);
    $doc->setValue('addressZipcode', $addressZipcode);
    $doc->setValue('phone', $phone);
	$doc->setValue('eduYear', $eduYear);
	$doc->setValue('eduType', $eduType);
	$doc->setValue('eduCity', $eduCity);
	$doc->setValue('eduReward', $eduReward);
	$doc->setValue('phone', $phone);
	$doc->setValue('docIssuingAuthority', $docIssuingAuthority);
    $doc->setValue('docDateEnd', $docDateEnd);
    $doc->setValue('docDateIssuance', $docDateIssuance);
    $doc->setValue('docUniqueNumber', $docUniqueNumber);
    $doc->setValue('docNumber', $docNumber);
    $doc->setValue('docSeries', $docSeries);
    $doc->setValue('eduBRSM', $eduBRSM);
    $doc->setValue('eduAverage', $eduAverage);
    $doc->setValue('eduLang', $eduLang);
    $doc->setValue('eduCT3', $eduCT3);
    $doc->setValue('eduCT2', $eduCT2);
    $doc->setValue('eduCT1', $eduCT1);
    $doc->setValue('eduPedClass', $eduPedClass);
    $doc->setValue('eduPurposeDistrict', $eduPurposeDistrict);
    $doc->setValue('eduPurpose', $eduPurpose);
  
    $doc->saveAs($outputFile);
    
    $downloadFile = $outputFile;
    header("Content-Type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Content-Length: ".filesize($downloadFile));
    header("Content-Disposition: attachment; filename=".$downloadFile);
    
   
    readfile($downloadFile);
    
    unlink($outputFile);
  } else if ($_POST['action'] == 'Договор'){
    $doc = new \PhpOffice\PhpWord\TemplateProcessor('./contract.docx');

    $uploadDir =  __DIR__;
    $outputFile = 'contract_full.docx';
    
    $doc->setValue('surnameRus', $surnameRus);
    $doc->setValue('nameRus', $nameRus);
    $doc->setValue('patronymicRus', $patronymicRus);
    $doc->setValue('gender', $gender);
    $doc->setValue('birthDate', $birthDate);
    $doc->setValue('surnameBel', $surnameBel);
    $doc->setValue('nameBel', $nameBel);
    $doc->setValue('patronymicBel', $patronymicBel);
    $doc->setValue('сitizenship', $сitizenship);
    $doc->setValue('stdSpeciality', $stdSpeciality);
	$doc->setValue('stdFaculty', $stdFaculty);
    $doc->setValue('stdFormLearning', $stdFormLearning);
    $doc->setValue('addressCountry', $addressCountry);
    $doc->setValue('addressRegion', $addressRegion);
    $doc->setValue('addressDistrict', $addressDistrict);
    $doc->setValue('addressCity', $addressCity);
    $doc->setValue('addressStreet', $addressStreet);
    $doc->setValue('addressHouse', $addressHouse);
    $doc->setValue('addressApartment', $addressApartment);
    $doc->setValue('addressZipcode', $addressZipcode);
    $doc->setValue('phone', $phone);
	$doc->setValue('docIssuingAuthority', $docIssuingAuthority);
    $doc->setValue('docDateEnd', $docDateEnd);
    $doc->setValue('docDateIssuance', $docDateIssuance);
    $doc->setValue('docUniqueNumber', $docUniqueNumber);
    $doc->setValue('docNumber', $docNumber);
    $doc->setValue('docSeries', $docSeries);
	
	
  
    $doc->saveAs($outputFile);
    
    $downloadFile = $outputFile;
    header("Content-Type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Content-Length: ".filesize($downloadFile));
    header("Content-Disposition: attachment; filename=".$downloadFile);
    
   
    readfile($downloadFile);
    
    unlink($outputFile);  
  }



