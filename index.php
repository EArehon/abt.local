<?php
  require 'assets/php/db.php';


  //$books = R::getAll( 'SELECT * FROM ABT_CTS_CITIZENSHIP' );

  //echo $books;

  //$books = R::getAll( 'SELECT * FROM ABT_CTS_CITIZENSHIP' );
    
 
    //foreach($books as $book) {
        //echo 'Name: '. $book->PK_ID;
        //echo '<pre>'; print_r($book); echo '</pre>';
      //  echo $book['CTS_NAME'].'<br>';
    //}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABT</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="/assets/js/maska-nomera.js" type="text/javascript"></script>
  <link href="assets/select2.css" rel="stylesheet" />
  <script src="assets/js/select2.full.min.js"></script>
  <script src="assets/js//i18n/ru.js"></script>
  <script src="assets/js/sex_by_russian_name.js"></script>

</head>
<body>
  <div class="wrapper">
    <section>
      <div class="container">
          <form method="POST" action="word.php" enctype="multipart/form-data">
  
          <div class="form_section">
            <h3 class="form_section_title">Основные данные</h3>
            
            <div class="form_section_data">

              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="surnameRus">Фамилия:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="surnameRus" id="surnameRus" placeholder="Фамилия" onBlur="sexing()"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="nameRus">Имя:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="nameRus" id="nameRus" placeholder="Имя" onBlur="sexing()"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell"><label for="patronymicRus">Отчество:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="patronymicRus" id="patronymicRus" placeholder="Отчество" onBlur="sexing()"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="gender">Пол:</label></div>
                  <div class="form_section_data_row_cell form_section_data_row_cell_flex">
                    <label for="age1" class="form_data_radio_label">муж:</label><br>
                    <input type="radio" id="female" name="gender" class="form_data_radio" value="1" onclick="manual_sex_choice()">
                    <label for="age2" class="form_data_radio_label">жен:</label><br> 
                    <input type="radio" id="male" name="gender" class="form_data_radio" value="0" onclick="manual_sex_choice()">
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="birthDate">Дата рождения:</label></div>
                  <div class="form_section_data_row_cell"><input type="date" class="form_data" name="birthDate" placeholder="ДР" min="1908-06-08" max="2025-02-18"></div>
                </div>
              </div>

              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="surnameBel">Прозвішча:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data en" name="surnameBel" placeholder="Прозвішча" id="en"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="nameBel">Імя:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data en" name="nameBel" placeholder="Імя"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell"><label for="patronymicBel">Імя па бацьку:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data en" name="patronymicBel" placeholder="Імя па бацьку"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="сitizenship">Гражданство:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="сitizenship" id="сitizenship">
                      <option value="" disabled selected>Гражданство</option>
                    </select>
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="phone">Телефон:</label></div>
                  <div class="form_section_data_row_cell"><input type="tel" class="form_data phone_mask" name="phone" placeholder="+375 (29) 123-45-67"></div>
                </div>

              </div>
            </div>
          </div>
          
          <div class="form_section">
            <h3 class="form_section_title">Паспортные данные</h3>
            
            <div class="form_section_data">

              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="docType">Вид:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="docType" id="docType">
                      <option value="" disabled selected>Вид документа</option>
                      <option value="1">Паспорт РБ</option>
                      <option value="2">Вид на жительство</option>
                      <option value="3">Паспорт иностранца</option>
                    </select>
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="docSeries">Серия:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="docSeries" placeholder="Серия"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell"><label for="docNumber">Номер:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="docNumber" placeholder="Номер"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="docUniqueNumber">Личный номер:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="docUniqueNumber" placeholder="Личный номер"></div>
                </div>
              </div>


              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="docDateIssuance">Дата выдачи:</label></div>
                  <div class="form_section_data_row_cell"><input type="date" class="form_data" name="docDateIssuance" placeholder="Дата выдачи" min="1908-06-08" max="2025-09-01"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="docIssuingAuthority">Кем выдан:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="docIssuingAuthority" placeholder="Кем выдан"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="docDateEnd">Срок действия:</label></div>
                  <div class="form_section_data_row_cell"><input type="date" class="form_data" name="docDateEnd" placeholder="Срок действия" min="1908-06-08" max="2045-02-18"></div>
                </div>

              </div>
            </div>
          </div>
          
          <div class="form_section">
            <h3 class="form_section_title">Адрес регистрации</h3>
            
            <div class="form_section_data">

              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="addressCountry">Страна:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="addressCountry" id="addressCountry">
                      <option value="" disabled selected>Страна</option>
                    </select> 
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="addressRegion">Область:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="addressRegion" id="addressRegion">
                      <option value="" disabled selected>Область</option>
                    </select>
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell"><label for="addressDistrict">Район:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="addressDisrict" id="addressDisrict">
                      <option value="" disabled selected>Район</option>
                    </select>
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="addressCity">Населенный пункт:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="addressCity" id="addressCity">
                      <option value="" disabled selected>Город</option>
                    </select>  
                  </div>
                </div>
              </div>


              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="addressStreet">Улица:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="addressStreet" placeholder="Улица"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="addressHouse">Дом, корпус:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="addressHouse" placeholder="Дом, корпус"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="addressApartment">Квартира:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="addressApartment" placeholder="Квартира"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="addressZipcode">Индекс:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="addressZipcode" placeholder="Индекс"></div>
                </div>

              </div>
            </div>
          </div>

          <div class="form_section">
            <h3 class="form_section_title">Учебное заведение</h3>
            
            <div class="form_section_data">

              <div class="form_selection_data_group_full">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduName">Название УО:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="eduName" placeholder="Название УО выдавшее документ об образовании"></div>
                </div>
              </div>

              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduYear">Год окончания:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="eduYear" placeholder="Год окончания"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduType">Тип:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="eduType" id="eduType">
                      <option value="" disabled selected>Тип УО</option>
                    </select>
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell"><label for="eduNumber">Номер:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="eduNumber" placeholder="Номер"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduCity">Населенный пункт:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="eduCity" id="eduCity">
                      <option value="" disabled selected>Населенный пункт:</option>
                    </select>
                  </div>
                </div>
              </div>


              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduReward">Награда:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="eduReward" id="eduReward">
                      <option value="" disabled selected>Награда за учебу:</option>
                      <option value="0">Нет</option>
                      <option value="1">Медаль</option>
                      <option value="2">Диплом с отличием</option>
                    </select>  
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduLang">Ин. язык:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="eduLang" id="eduLang">
                      <option value="" disabled selected>Язык обучения:</option>
                      <option value="1">Английский язык</option>
                      <option value="2">Немецкий язык</option>
                      <option value="3">Французкий язык</option>
                      <option value="4">Испанский язык</option>
                    </select>  
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduPedClass">Пед класс:</label></div>
                  <div class="form_section_data_row_cell"><input type="checkbox" class="form_data_checkbox" name="eduPedClass"></div>
                </div>

                
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduBRSM">БРСМ:</label></div>
                  <div class="form_section_data_row_cell"><input type="checkbox" class="form_data_checkbox" name="eduBRSM"></div>
                </div>

              </div>

              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduCT1">ЦТ 1:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="eduCT1" placeholder="ЦТ 1"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduCT2">ЦТ 2:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="eduCT2" placeholder="ЦТ 2"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduCT3">ЦТ 3:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="eduCT3" placeholder="ЦТ 3"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduAverage">Ср. балл:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="eduAverage" placeholder="Ср. балл док-та об образовании"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="eduPurpose">Целевое:</label></div>
                  <div class="form_section_data_row_cell"><input type="checkbox" class="form_data_checkbox" name="eduPurpose"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell"><label for="eduPurposeDistrict">Район:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="eduPurposeDistrict" id="eduPurposeDistrict">
                      <option value="" disabled selected>Район</option>
                    </select>
                  </div>
                </div>



              </div>
            </div>
          </div>

          <div class="form_section">
            <h3 class="form_section_title">Родители / законные представители</h3>
            
            <div class="form_section_data">
              <div class="form_section_data_group">
                <div class=""><H4 class="form_section_data_group_title">Мать</H4></div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momFio">Фамилия:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momFio" placeholder="Фамилия"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momName">Имя:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momName" placeholder="Имя"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momPatronymic">Отчество:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momPatronymic" placeholder="Отчество"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momDocType">Вид:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="momDocType" id="momDocType">
                      <option value="" disabled selected>Вид документа</option>
                      <option value="1">Паспорт РБ</option>
                      <option value="2">Вид на жительство</option>
                      <option value="3">Паспорт иностранца</option>
                    </select>
                  </div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momDocSeries">Серия:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momDocSeries" placeholder="Серия"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momDocNumber">Номер:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momDocNumber" placeholder="Номер"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momDocUniqueNumber">Личный номер:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momDocUniqueNumber" placeholder="Личный номер"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momDocDateIssuance">Дата выдачи:</label></div>
                  <div class="form_section_data_row_cell"><input type="date" class="form_data" name="momDocDateIssuance" placeholder="Дата выдачи"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momDocIssuingAuthority">Кем выдан:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momDocIssuingAuthority" placeholder="Кем выдан"></div>
                </div>

                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momAddressZipCode">Индекс:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAddressZipCode" placeholder="Индекс"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momAddressRegion">Область:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAddressRegion" placeholder="Область"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momAddressDisctric">Район:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAddressDisctric" placeholder="Район"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momAddressCity">Город:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAddressCity" placeholder="Город"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="momAdressStreet">Ул., д., кв.:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAdressStreet" placeholder="Ул., д., кв."></div>
                </div>
              </div>
            

            <div class="form_section_data_group">
              <div class=""><H4 class="form_section_data_group_title">Отец</H4></div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="dadFio">Фамилия:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="dadFio" placeholder="Фамилия"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="dadName">Имя:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="dadName" placeholder="Имя"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="dadPatronymic">Отчество:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="dadPatronymic" placeholder="Отчество"></div>
              </div>

              <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="dadDocType">Вид:</label></div>
                  <div class="form_section_data_row_cell">
                    <select class="form_data form_data_select" name="dadDocType" id="dadDocType">
                      <option value="" disabled selected>Вид документа</option>
                      <option value="1">Паспорт РБ</option>
                      <option value="2">Вид на жительство</option>
                      <option value="3">Паспорт иностранца</option>
                    </select>
                  </div>
                </div>

              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momDocSeries">Серия:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momDocSeries" placeholder="Серия"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momDocNumber">Номер:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momDocNumber" placeholder="Номер"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momDocUniqueNumber">Личный номер:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momDocUniqueNumber" placeholder="Личный номер"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momDocDateIssuance">Дата выдачи:</label></div>
                <div class="form_section_data_row_cell"><input type="date" class="form_data" name="momDocDateIssuance" placeholder="Дата выдачи"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momDocIssuingAuthority">Кем выдан:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momDocIssuingAuthority" placeholder="Кем выдан"></div>
              </div>

              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momAddressZipCode">Индекс:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAddressZipCode" placeholder="Индекс"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momAddressRegion">Область:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAddressRegion" placeholder="Область"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momAddressDisctric">Район:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAddressDisctric" placeholder="Район"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momAddressCity">Город:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAddressCity" placeholder="Город"></div>
              </div>
              <div class="form_section_data_row">
                <div class="form_section_data_row_cell required"><label for="momAdressStreet">Ул., д., кв.:</label></div>
                <div class="form_section_data_row_cell"><input type="text" class="form_data" name="momAdressStreet" placeholder="Ул., д., кв."></div>
              </div>
            </div>
          </div>
          </div>

          <div class="form_section">
            <h3 class="form_section_title">Направление обучения</h3>
            
            <div class="form_section_data">
              <div class="form_section_data_group">
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="stdFormLearning">Форма обучения:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="stdFormLearning" placeholder="Форма обучения"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="stdFaculty">Факультет:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="stdFaculty" placeholder="Факультет"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="stdSpeciality">Специальность:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="stdSpeciality" placeholder="Специальность"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="stdQualification">Квалификация:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="stdQualification" placeholder="Квалификация"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="stdDuration">Срок обученя:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="stdDuration" placeholder="Срок обученя"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="stdAccount">Личный кабинет:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="stdAccount" placeholder="Личный кабинет"></div>
                </div>
                <div class="form_section_data_row">
                  <div class="form_section_data_row_cell required"><label for="stdPaymentType">Категория обучения:</label></div>
                  <div class="form_section_data_row_cell"><input type="text" class="form_data" name="stdPaymentType" placeholder="Категория обучения"></div>
                </div>
              </div>
            </div>
          </div>
          
          
          <input type="submit" name="action" value="Анкета" value="quest" class="btn-new">
          <input type="submit" name="action" value="Договор" value="contract" class="btn-new">  
          <!--<input type="submit" name="action" value="Заявление" value="app">      -->
        </form>
      </div>
    </section>
  </div>

  <script>
    $('.phone_mask').mask('+375 (99) 999-99-99');
    
    $.fn.setCursorPosition = function(pos) {
      if ($(this).get(0).setSelectionRange) {
        $(this).get(0).setSelectionRange(pos, pos);
      } else if ($(this).get(0).createTextRange) {
        var range = $(this).get(0).createTextRange();
        range.collapse(true);
        range.moveEnd('character', pos);
        range.moveStart('character', pos);
        range.select();
      }
    };
    
    
    $('input[type="tel"]').click(function(){
        $(this).setCursorPosition(6);  // set position number
      });
    </script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/keyboard-layout.js"></script>
</body>
</html>