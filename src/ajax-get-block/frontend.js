jQuery(document).ready(function(){
    jQuery('#loader').show();

    jQuery.ajax({
        method: 'GET',
        url:'https://pokeapi.co/api/v2/pokemon/',
        dataType: 'json'
    }).done(function(data){
        jQuery('#loader').hide();
        jQuery.map(data.results, function(post,i){

            jQuery.ajax({
                method: 'GET',
                url:`${post.url}`,
                dataType: 'json'
            }).done(function(data){
                console.log(data.sprites.front_default);
                jQuery('#result').append(
                    `
                    <p>Title: ${post.name}</p>
                    <p>URL: ${post.url}</p>
                    <img src='${data.sprites.front_default}' />
                    `
                );
            })
            
        })
    })
})



// //SUPER SIMPLE AJAX REQUEST
// jQuery(document).ready(function(){
//     jQuery('#loader').show();

//     jQuery.ajax({
//         method: 'GET',
//         url:'https://pokeapi.co/api/v2/pokemon/',
//         dataType: 'json'
//     }).done(function(data){
    
//         jQuery('#loader').hide();
//         jQuery.map(data.results, function(post,i){
//             if(i>=4) return;
//             jQuery('#result').append(
//                 `<p>Title: ${post.name}</p>
//                  <p>URL: ${post.url}</p>`
//             );
//         })
//     })
// })