var app = {

    
    init: function() {

        //console.log('demarré');
        var writebox = $('#writebox');
        var writeform = $('.writeform');
        var sendbox = $('#sendbox');
        
    
        writeform.submit(app.handleSubmitSendbox);   
        sendbox.click(app.addMessage);
        app.loadMessage();
        setInterval(app.checkoutScroll, 3000);
        //app.setTimer()

          


    },

    loadMessage : function() {
        $.ajax(
            {
              url: 'http://localhost/tchat/public/loadmessage', // URL sur laquelle faire l'appel Ajax
              method: 'GET', // La méthode HTTP souhaité pour l'appel Ajax (GET ou POST)
              dataType: 'json'

              // Le type de données attendu en réponse (text, html, xml, json)
            }
          ).done(function(responses) { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec succès" et je récupère le code de réponse en paramètre
            //console.log(response); // debug
            
            console.log('load');

            var messages = $('<div>').addClass('messages');

            
            $('.messages').remove();

            messages.prependTo($('.wrappermessage'));
            //$('.wrappermessage').scrollTop(10000);

            
            responses['message'].forEach(messageResponse => {

              var contentMessages = $('<div>');

              contentMessages.appendTo('.messages').addClass('contentMessages');

              responses['users'].forEach(userResponse => {

                //console.log(userResponse.pseudo);
                //console.log(messageResponse.users_id);

                if (userResponse.id == messageResponse.users_id) {
                  $('<p>').html(userResponse.pseudo).appendTo(contentMessages).addClass('pseudo');
                }

              });


                if (messageResponse.users_id == responses['session']['userId']){
                  //$('<p>').html(responses['users'][response.users_id]['pseudo']).appendTo(messages).addClass('message left');
                  
                  $('<p>').html(messageResponse.message).appendTo(contentMessages).addClass('message');
                  $(contentMessages).addClass('left');
                  //console.log([responses['users']]);
                }else {
                  $('<p>').html(messageResponse.message).appendTo(contentMessages).addClass('message');
                  $(contentMessages).addClass('right');

                }
                
            });

            
            app.refreshh();
            }).fail(function() { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec erreur"
            //alert('Réponse ajax incorrecte load');
            });

          

    },

    checkoutScroll : function() {

      if ($(".wrappermessage")[0]['scrollTop'] + $(".wrappermessage")[0]['clientHeight'] == $(".wrappermessage")[0]['scrollHeight']) {
        //console.log('refresh');
       app.loadMessage();
       //app.refreshh();

      } else {
        //console.log('else');
        //app.stopTimer(app.setTimer);


      }
    },

    handleSubmitSendbox : function(evt) {

        evt.preventDefault();
    },

    addMessage: function(evt) {

        var inputValue = $('#writebox').val();
        var input = $('#writebox');
        $.ajax(
            {
              url: 'http://localhost/tchat/public/addmessage', // URL sur laquelle faire l'appel Ajax
              method: 'POST', // La méthode HTTP souhaité pour l'appel Ajax (GET ou POST)
              dataType: 'json',
              data: {
                message : inputValue
              }
              // Le type de données attendu en réponse (text, html, xml, json)
            }
          ).done(function(responses) { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec succès" et je récupère le code de réponse en paramètre
            app.loadMessage();
            
            
              console.log('add');

              app.refreshh();

            $('#writebox').val('');
          //$('<li>').html(inputValue).appendTo(messages).addClass('message');

        }).fail(function() { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec erreur"
        //alert('Réponse ajax incorrecte');
        });
   
    },
    refresh: function(){
      $(".wrappermessage").scrollTop($(".wrappermessage")[0]['scrollHeight']);

    },
     
    refreshh: function(){
      
      $(".wrappermessage").scrollTop($(".wrappermessage")[0]['scrollHeight']);

    }
}

$(app.init);