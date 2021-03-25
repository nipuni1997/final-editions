<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link rel="stylesheet" href="css/k.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
        
        <nav class="sidebar">
            <div class="text">Side menu </div>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#" class="feat-btn">Features<span class="fas fa-caret-down first"></span></a>
                    <ul class="feat-show">
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Features</a></li>
                    </ul>
                </li> 
                <li><a href="#" class="serv-btn">Services<span class="fas fa-caret-down second"></span></a>
                    <ul class="serv-show">
                        <li><a href="#">Pages</a></li>
                        <li><a href="#">Pages</a></li>
                    </ul>
                </li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Portfolio</a></li>

            </ul>
        </nav>   

        <script>
        
         $('.feat-btn').click(function()
         {
             $('nav ul .feat-show').toggleClass('show');
             $('nav ul .first').toggleClass('rotate');
         });
         $('.serv-btn').click(function()
         {
             $('nav ul .serv-show').toggleClass('show1');
             $('nav ul .second').toggleClass('rotate');
         });
         $('nav ul li').click(function()
         {
             $(this).addClass("active").siblings().removeClass("active");
         })
         </script>

    </body>   
</html>

