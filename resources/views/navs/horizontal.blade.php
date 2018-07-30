<ul class="nav flex-column nav-pills">
  <li class="nav-item">
    <a class="nav-link {{$active == "home" ? "active" : ""}}"  href="{{ route('home') }}">Главная</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{$active == "category" ? "active" : ""}}" href="{{ route('categories.index') }}">Категория</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{$active == "products" ? "active" : ""}}" href="{{ route('products.index') }}">Продукты</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{$active == "objects" ? "active" : ""}}" href="{{ route('objects.index') }}">Объекты</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{$active == "videos" ? "active" : ""}}" href="{{ route('videos.index') }}">Видео</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{$active == "language" ? "active" : ""}}" href="{{ route('language.file') }}">Язык</a>
  </li>
</ul>