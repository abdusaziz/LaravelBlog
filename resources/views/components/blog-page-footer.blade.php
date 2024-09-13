       <!-- Footer-->
       <x-cookie-notice />
       <footer class="border-top">
            <footer class="py-1 my-1">
              <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="{{ route('categorypage') }}" class="nav-link px-2 text-muted">Category</a></li>
                <li class="nav-item"><a href="{{ route('tagpage') }}" class="nav-link px-2 text-muted">Tag</a></li>
                <li class="nav-item"><a href="{{ route('aboutpage') }}" class="nav-link px-2 text-muted">About</a></li>
                <li class="nav-item"><a href="{{ route('legalpage') }}" class="nav-link px-2 text-muted">legal</a></li>
              </ul>
              <p class="text-center text-muted">Copyright © 2023-2024 CoolTech</p>
            </footer>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>