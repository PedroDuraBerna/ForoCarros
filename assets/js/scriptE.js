
// $(document).ready(function(){
//     $("#theme").on("change",function(e){
//         console.log(e.target.value);
//         $("body").css({"background-color":e.target.value});
//         localStorage.setItem("theme",JSON.stringify(e.target.value));
//     });
    
//     if (localStorage.getItem("theme")) {
//         var theme = JSON.parse(localStorage.getItem("theme"));
//         console.log(theme);
//         $("#theme").val(theme);
//         $("body").css({"background-color":theme});
//         $("header").css({"background-color":theme});
//         //Un if para cada tema
//         if (theme == "#222") {
//             $("body").css({"background-color":"grey"});
//             $("nav").css({"background-color":"#333"});
//             $("body").css({"background-color":"#888"});
//             $(".container").find("h2").css({"background-color":"#222"});
//             $("#start_bar").css({"background-color":"#333"});
//             $(".container").css({"border-color":"#333"});
//             $(".row_post").css({"border-color":"#333"});
//         }
//     }
// });
