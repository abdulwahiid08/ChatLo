<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>404 Not found</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}"/>
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer ></script>
    </head>
    <body>
       <section class="h-full w-full border-box sm:pt-20 pt-16 sm:pb-16 pb-8 lg:px-24 md:px-16 sm:px-8 px-8 transition-all duration-500 linear" style="background-color: #141432;">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      .empty-2-3 .btn-back:hover{
        --tw-shadow: inset 0 0px 25px 0 rgba(20, 20, 50, 0.7);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
      }
      .empty-2-3 .caption-text{
        color: #707092;
      }
      .empty-2-3 .btn-back{
        background-color: #524EEE;
      }
      @media(min-width: 425px){
        .empty-2-3 .title-text{
          font-size: 40px;
        }
      }
    </style>
    <div class="empty-2-3" style="font-family: 'Poppins', sans-serif;">
      <div class="container mx-auto flex items-center justify-center flex-col">
        <img class="sm:w-auto w-5/6 sm:mb-16 mb-12 object-cover object-center" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Empty%20State/EmptyState2/Empty-2-3.png" alt="">
        <div class="text-center w-full">
          <h1 class="title-text text-3xl mb-5 font-semibold text-white">
            Opss! Something Missing
          </h1>
          <p class="caption-text mb-16 tracking-wide leading-7">
            The page you’re looking for isn’t found. We <br class="sm:block hidden"> suggest you Back to Homepage.
          </p>
          <div class="flex justify-center">
            <a href="{{ route('timeline') }}" class="btn-back inline-flex font-semibold text-white text-lg leading-7 py-4 px-6 rounded-xl focus:outline-none">
              Back to Homepage
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
