<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panorama360 - SMT</title>
     <!-- Pannellum library -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css"
     integrity="sha512-UoT/Ca6+2kRekuB1IDZgwtDt0ZUfsweWmyNhMqhG4hpnf7sFnhrLrO0zHJr2vFp7eZEvJ3FN58dhVx+YMJMt2A=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
   
     <!-- End Pannellum library -->

     <style>
        *{
            padding: 0;
            margin: 0;
        }
        #panorama-360-view {
                padding: 0;
                margin: 0;
               width: 100vw;
               height: 100vh;
               overflow: hidden !important;
           }
       </style>
</head>
<body>
    <div id="panorama-360-view"></div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"
    integrity="sha512-EmZuy6vd0ns9wP+3l1hETKq/vNGELFRuLfazPnKKBbDpgZL0sZ7qyao5KgVbGJKOWlAFPNn6G9naB/8WnKN43Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      pannellum.viewer('panorama-360-view', {
        "type": "equirectangular",
        "panorama": "{{ asset('images/360images/'.$project->gallery) }}",
        "autoLoad": true
    })
    </script>
</body>
</html>