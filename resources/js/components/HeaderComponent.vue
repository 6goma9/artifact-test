<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">test</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportContent"
        aria-controls="nabvarSupportContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <!--
          <li class="nav-item">
            <router-link class="nav-link" to="/distributions">MMR Distrobutions</router-link>
          </li>
          -->
          <li class="nav-item">
            <router-link class="nav-link" to="/blog">blogs</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
