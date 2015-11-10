jQuery(function($){
    $('#true_loadmore').click(function(){
        $(this).text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl, // обработчик
            data:data, // данные
            type:'POST', // тип запроса
            success:function(data){
                if( data ) {
                    if (typeof load_more_type != 'undefined') {
		      if (load_more_type=='faq') {	
                      var items =$('<div>'+data+'</div>');
                      var otzyvBlocks = items.find('.otzyvBlock');
                      var column1 = $('.wrapOtzyv .column1'), numC1 = column1.children().length;
                      var column2 = $('.wrapOtzyv .column2'), numC2 = column2.children().length;
                      var addColumn = numC2<numC1?column2:column1;
                      for(var i= 0; i<otzyvBlocks.length; i++) {
                          addColumn.append(otzyvBlocks[i]);
                          addColumn = addColumn==column1?column2:column1
                      }
                      $('#true_loadmore').text('Загрузить ещё');
                      }
                    } else
                        $('#true_loadmore').text('Загрузить ещё').before(data); // вставляем новые посты
                    current_page++; // увеличиваем номер страницы на единицу
                    if (current_page == max_pages) $("#true_loadmore").remove(); // если последняя страница, удаляем кнопку
                } else {
                    $('#true_loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
                }
            }
        });
    });

    $('header#header .toggle-mobile span').on('click', function(){
        var span = $(this);
        if (span.hasClass('visible')) {
            span.removeClass('visible');
            $('header#header #access').removeClass('visible');
        } else {
            $('header#header #access').addClass('visible');
            span.addClass('visible');
        }
    });
});