'use strict';

var map = {
    ru: [ "й", "ц", "у", "к", "е", "н", "г", "ш", "щ", "з", "х", "ъ", "ф", "ы", "в", "а", "п", "р", "о", "л", "д", "ж", "э", "я", "ч", "с", "м", "и", "т", "ь", "б", "ю" ],
    en: [ "й", "ц", "у", "к", "е", "н", "г", "ш", "ў", "з", "х", "'", "ф", "ы", "в", "а", "п", "р", "о", "л", "д", "ж", "э", "я", "ч", "с", "м", "і", "т", "ь", "б", "ю" ]
};

//var ru = document.getElementById( 'ru' );
//var en = document.getElementById( 'en' );
var en = document.querySelectorAll('.en');


en.forEach((el) => {
    el.__lang = [ 'en', 'ru' ];
    el.addEventListener( 'keydown', setInputText );
});

//ru.__lang = [ 'ru', 'en' ];
//en.__lang = [ 'en', 'ru' ];

//ru.addEventListener( 'keydown', setInputText );
//en.addEventListener( 'keydown', setInputText );

function setInputText ( e ) {
    console.log('ratata');
    var i, k = e.key,
            start = this.selectionStart,
            end = this.selectionEnd;

    if ( ( i = map[this.__lang[1]].indexOf( k ) ) !== -1 ) {
        e.preventDefault();
        this.setRangeText( map[this.__lang[0]][i], start, end );
        this.setSelectionRange( start + 1, start + 1 );
    }
    else if ( ( i = map[this.__lang[1]].indexOf( k.toLowerCase() ) ) !== -1 ) {
        e.preventDefault();
        this.setRangeText( map[this.__lang[0]][i].toUpperCase(), start, end );
        this.setSelectionRange( start + 1, start + 1 );
    }
}