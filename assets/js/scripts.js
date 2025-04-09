const сitizenship = document.getElementById("сitizenship"),
      addressCountry = document.getElementById("addressCountry");

$.fn.select2.defaults.set('language', 'ru');
$.fn.select2.defaults.set('width', '100%');
$.fn.select2.defaults.set('language', 'ru');












//выполнитсяв случае успешного запроса
function funcSuccessCityzenship (data) {
  let temp = JSON.parse(data);

  let tempArr = [];
  for (let i = 0; i < temp.length; i++) {

    const country = {
      id: temp[i]["PK_ID"],
      text: temp[i]["CTS_NAME"]
    };
    
    tempArr[i] = country;
  }

  $("#сitizenship").select2({
    data: tempArr
  }); 
}  


//выполнитсяв случае успешного запроса
function funcSuccessCnt (data) {
  let temp = JSON.parse(data);

  let tempArr = [];
  for (let i = 0; i < temp.length; i++) {

    const person = {
      id: temp[i]["PK_ID"],
      text: temp[i]["CNT_NAME"]
    };
    
    tempArr[i] = person;
  }

  $("#addressCountry").select2({
    data: tempArr
  }); 
}  



//запрос на получения списка гражданств
  $(document).ready (function () {
    $.ajax ({
      url: "test.php",
      type: "POST",
      dataType: "html",
      data: {text: 'ctz'},
      success: funcSuccessCityzenship
    });
});


//запрос на получения списка стран
$(document).ready (function () {
  $.ajax ({
    url: "test.php",
    type: "POST",
    dataType: "html",
    data: {text: 'cnt'},
    success: funcSuccessCnt
  });
});









//автоматический выбор пола
var is_manual_sex_choice = false;

  var manual_sex_choice = function() {
    is_manual_sex_choice = true;
  }

  var sexing = function () {
    if (!is_manual_sex_choice) {
      var surname = document.getElementById('surnameRus').value,
          first_name = document.getElementById('nameRus').value,
          patronymic = document.getElementById('patronymicRus').value,
          sex_by_russian_name = new SexByRussianName(surname, first_name, patronymic),
          gender = sex_by_russian_name.get_gender();

      switch(gender){
        case 1:
          document.getElementById('female').checked = true;
          break;
        case 0:
          document.getElementById('male').checked = true;
          break;
        default:
          document.getElementById('male').checked = false;
          document.getElementById('female').checked = false;
      }
    }
  }



//активація выпадающих списков
  $("#docType").select2();  //вид документа
  $("#addressRegion").select2();  //адрес область
  $("#addressDisrict").select2(); //адрес район
  $("#addressCity").select2(); //адрес район
  $("#eduType").select2(); //тип УО
  $("#eduCity").select2(); //НП УО
  $("#eduReward").select2(); //награда за учебу
  $("#eduLang").select2(); //язык обучения
  $("#eduPurposeDistrict").select2(); //район целевого
  $("#momDocType").select2(); //вид документа мамы
  $("#dadDocType").select2(); //вид документа папы

  
  



//выполнитсяв случае успешного запроса после выбора страны
function funcSuccessArea (data) {
  let temp = JSON.parse(data);




  let tempArr = [];
  
  for (let i = 0; i < temp.length; i++) {

    const person = {
      id: temp[i]["PK_ID"],
      text: temp[i]["ARE_NAME"]
    };

    
    tempArr[i] = person;
  }

  $("#addressRegion").select2({
    data: tempArr
  }); 
}  


//получение списка районов после выбора страны (возможно, когда-нибудь, кто-нибудь из добрых побуждение добавит в БД еще пару полей и сделает всё по красоте, но ни сегодня, и ни я!)
  $(addressCountry).on('select2:select', function (e) {
    $.ajax ({
      url: "test.php",
      type: "POST",
      dataType: "html",
      data: {text: 'area'},
      success: funcSuccessArea
    });
  });


  //addressDisrict
  $(addressRegion).on('select2:select', function (e) {
    $("#addressDisrict").empty();

    $.ajax ({
      url: "test.php",
      type: "POST",
      dataType: "html",
      data: {text: 'disrict', id: e.params.data.id},
      success: funcSuccessDisrict
    });
  });

  function funcSuccessDisrict (data) {
    let temp = JSON.parse(data);

    let tempArr = [];
    for (let i = 0; i < temp.length; i++) {
  
      const person = {
        id: temp[i]["PK_ID"],
        text: temp[i]["RGN_NAME"]
      };

      tempArr[i] = person;
    }

    var data = [
      {
          id: 0,
          text: 'Выберете район',
          selected: true,
          disabled: true
      }
    ];
  
    $("#addressDisrict").select2({
      data: data
    }); 
   

    $("#addressDisrict").select2({
      data: tempArr
    }); 
  }  


  //addressCity
  $(addressDisrict).on('select2:select', function (e) {
    $("#addressCity").empty();

    $.ajax ({
      url: "test.php",
      type: "POST",
      dataType: "html",
      data: {text: 'city', id: e.params.data.id},
      success: funcSuccessCity
    });
  });


  function funcSuccessCity (data) {
    let temp = JSON.parse(data);

    let tempArr = [];
    for (let i = 0; i < temp.length; i++) {
  
      const person = {
        id: temp[i]["PK_ID"],
        text: temp[i]["LOC_NAME"]
      };

      tempArr[i] = person;
    }

    $("#addressCity").select2({
      data: tempArr
    });
  }  



  //запрос на получения списка типов школ
$(document).ready (function () {
  $.ajax ({
    url: "test.php",
    type: "POST",
    dataType: "html",
    data: {text: 'schoolType'},
    success: funcSuccessSchoolType
  });
});

//выполнитсяв случае успешного запроса
function funcSuccessSchoolType (data) {
  let temp = JSON.parse(data);

  let tempArr = [];
  for (let i = 0; i < temp.length; i++) {

    const person = {
      id: temp[i]["PK_ID"],
      text: temp[i]["SCT_NAME"]
    };
    
    tempArr[i] = person;
  }

  $("#eduType").select2({
    data: tempArr
  }); 
}  


  //запрос на получения списка типов школ
  $(document).ready (function () {
    $.ajax ({
      url: "test.php",
      type: "POST",
      dataType: "html",
      data: {text: 'schoolType'},
      success: funcSuccessSchoolType
    });
  });
  
  //выполнитсяв случае успешного запроса
  function funcSuccessSchoolType (data) {
    let temp = JSON.parse(data);
  
    let tempArr = [];
    for (let i = 0; i < temp.length; i++) {
  
      const person = {
        id: temp[i]["PK_ID"],
        text: temp[i]["SCT_NAME"]
      };
      
      tempArr[i] = person;
    }
  
    $("#eduType").select2({
      data: tempArr
    }); 
  }  


    //запрос на получения населенных пунктов школ
    $(document).ready (function () {
      $.ajax ({
        url: "test.php",
        type: "POST",
        dataType: "html",
        data: {text: 'schoolCity'},
        success: funcSuccessSchoolCity
      });
    });
    
    //выполнитсяв случае успешного запроса
    function funcSuccessSchoolCity (data) {
      let temp = JSON.parse(data);
    
      let tempArr = [];
      for (let i = 0; i < temp.length; i++) {
    
        const person = {
          id: temp[i]["PK_ID"],
          text: temp[i]["LOC_NAME"]
        };
        
        tempArr[i] = person;
      }
    
      $("#eduCity").select2({
        data: tempArr
      }); 
    }  



        //запрос на получения районов целевого
        $(document).ready (function () {
          $.ajax ({
            url: "test.php",
            type: "POST",
            dataType: "html",
            data: {text: 'disrictOnly'},
            success: funcSuccessEduDist
          });
        });
        
        //выполнитсяв случае успешного запроса
        function funcSuccessEduDist (data) {
          let temp = JSON.parse(data);
        
          let tempArr = [];
          for (let i = 0; i < temp.length; i++) {
        
            const person = {
              id: temp[i]["PK_ID"],
              text: temp[i]["RGN_NAME"]
            };
            
            tempArr[i] = person;
          }
        
          $("#eduPurposeDistrict").select2({
            data: tempArr
          }); 
        }  
    








    eduPurposeDistrict