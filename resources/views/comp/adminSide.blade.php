<style>
    /*!
  * Start Bootstrap - Simple Sidebar (https://startbootstrap.com/)
  * Copyright 2013-2016 Start Bootstrap
  * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
  */
  
  body {
  overflow-x: hidden;
  }
  
  /* Toggle Styles */
  
  #wrapper {
  padding-left: 0;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
  }
  
  #wrapper.toggled {
  padding-left: 250px;
  }
  
  #sidebar-wrapper {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 0;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: #243441;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
  }
  
  #wrapper.toggled #sidebar-wrapper {
  width: 250px;
  }
  
  #page-content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
  }
  
  #wrapper.toggled #page-content-wrapper {
  position: absolute;
  margin-right: -250px;
  }
  
  /* Sidebar Styles */
  #sidebar-wrapper{
  box-shadow:  4px 4px 10px rgba(0, 0, 0, 0.231);
  
  }
  .sidebar-nav {
  /* box-shadow:  4px 4px 10px rgba(0, 0, 0, 0.208); */
  position: absolute;
  top: 0;
  width: 250px;
  margin: 0;
  padding: 0;
  list-style: none;
  }
  
  .sidebar-nav li {
  text-indent: 20px;
  line-height: 40px;
  }
  
  .sidebar-nav li a {
  display: block;
  text-decoration: none;
  color: #999999;
  }
  
  .sidebar-nav li a:hover {
  text-decoration: none;
  color: #fff;
  background: rgba(255,255,255,0.2);
  }
  
  .sidebar-nav li a:active,
  .sidebar-nav li a:focus {
  text-decoration: none;
  }
  
  .sidebar-nav > .sidebar-brand {
  height: 65px;
  font-size: 18px;
  line-height: 60px;
  }
  
  .sidebar-nav > .sidebar-brand a {
  color: #999999;
  }
  
  .sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
  }
  
  @media(min-width:768px) {
  #wrapper {
    padding-left: 250px;
  }
  
  #wrapper.toggled {
    padding-left: 0;
  }
  
  #sidebar-wrapper {
    width: 250px;
  }
  
  #wrapper.toggled #sidebar-wrapper {
    width: 0;
  }
  
  #page-content-wrapper {
    padding: 20px;
    position: relative;
  }
  
  #wrapper.toggled #page-content-wrapper {
    position: relative;
    margin-right: 0;
  }
  }
  </style>
  
  <div id="wrapper">
  
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
              <li class="sidebar-brand">
                  <a href="#">
                      Start Bootstrap
                  </a>
              </li>
              <div class="ms-5">
                  <img src="{{asset("images/—Pngtree—businessman user avatar wearing suit_8385663.png")}}" class="rounded-circle" width="100" height="100" alt="">
  
              </div>
              <div class="mt-2 ms-4">
             <p class="text-white"> 👋 {{Auth::user()->name}}</p>
          </div>
              <li>
                  <a href="{{route('acceptcoach')}}"><i class="bi bi-person-check"></i> Accept coachs</a>
              </li>
              <li>
                  <a href="{{route('profile.edit')}}"><i class="bi bi-person-fill-gear"></i> Edit coachs</a>
              </li>
              <li>
                  <a href="{{route('profile.edit')}}"><i class="bi bi-vector-pen"></i> Edit Article / Courses</a>
              </li>
              <li>
                  <a href="{{route('profile.edit')}}"><i class="bi bi-person-gear"></i> Edit users</a>
              </li>
             
             
           
      </div>
      <!-- /#sidebar-wrapper -->
  
      <!-- Page Content -->
    