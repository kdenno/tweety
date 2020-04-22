$(function(){
   $('.search').keyup(function(){
       var search = $(this).val();
       $.post('http://localhost:8080/tweety/public/searchAjx/ajax/search.php', {search:search}, function(data){
           $('.search-result').html(data);

       });
   });

});